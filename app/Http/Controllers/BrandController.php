<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function index(): View
    {
        $brands = Brand::active()
            ->withCount('activeProducts')
            ->orderBy('name')
            ->get();

        return view('brands.index', compact('brands'));
    }

    public function show(Brand $brand): View
    {
        if (!$brand->is_active) {
            abort(404);
        }

        $products = Product::with(['brand', 'category'])
            ->active()
            ->where('brand_id', $brand->id)
            ->latest()
            ->paginate(12);

        return view('brands.show', compact('brand', 'products'));
    }
}
