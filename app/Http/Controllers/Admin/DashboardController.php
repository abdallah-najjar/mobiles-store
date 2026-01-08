<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_products' => Product::count(),
            'active_products' => Product::active()->count(),
            'total_brands' => Brand::count(),
            'total_categories' => Category::count(),
            'featured_products' => Product::featured()->count(),
            'out_of_stock' => Product::where('stock_quantity', 0)->count(),
        ];

        $recentProducts = Product::with(['brand', 'category'])
            ->latest()
            ->take(5)
            ->get();

        $popularProducts = Product::with(['brand'])
            ->orderBy('view_count', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentProducts', 'popularProducts'));
    }
}
