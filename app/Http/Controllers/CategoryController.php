<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::active()
            ->parentCategories()
            ->withCount('activeProducts')
            ->with(['children' => function ($query) {
                $query->active()->withCount('activeProducts');
            }])
            ->orderBy('sort_order')
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function show(Category $category): View
    {
        if (!$category->is_active) {
            abort(404);
        }

        $products = Product::with(['brand', 'category'])
            ->active()
            ->where('category_id', $category->id)
            ->latest()
            ->paginate(12);

        $subcategories = $category->children()->active()->get();

        return view('categories.show', compact('category', 'products', 'subcategories'));
    }
}
