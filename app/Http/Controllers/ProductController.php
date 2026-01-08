<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::with(['brand', 'category'])->active();

        if ($request->filled('brand')) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->where('slug', $request->brand);
            });
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('short_description', 'like', "%{$searchTerm}%")
                    ->orWhereHas('brand', function ($q) use ($searchTerm) {
                        $q->where('name', 'like', "%{$searchTerm}%");
                    });
            });
        }

        $sortBy = $request->get('sort', 'latest');
        switch ($sortBy) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'popular':
                $query->orderBy('view_count', 'desc');
                break;
            default:
                $query->latest();
        }

        $products = $query->paginate(12)->withQueryString();

        $brands = Brand::active()->orderBy('name')->get();
        $categories = Category::active()->parentCategories()->orderBy('sort_order')->get();

        $maxPrice = Product::active()->max('price');
        $minPrice = Product::active()->min('price');

        return view('products.index', compact(
            'products',
            'brands',
            'categories',
            'maxPrice',
            'minPrice'
        ));
    }

    public function show(Product $product): View
    {
        if (!$product->is_active) {
            abort(404);
        }

        $product->load(['brand', 'category', 'images', 'specifications']);
        $product->incrementViewCount();

        $relatedProducts = Product::with(['brand'])
            ->active()
            ->where('id', '!=', $product->id)
            ->where(function ($query) use ($product) {
                $query->where('category_id', $product->category_id)
                    ->orWhere('brand_id', $product->brand_id);
            })
            ->inRandomOrder()
            ->take(4)
            ->get();

        $groupedSpecs = $product->getGroupedSpecifications();

        return view('products.show', compact('product', 'relatedProducts', 'groupedSpecs'));
    }
}
