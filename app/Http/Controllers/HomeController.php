<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredProducts = Product::with(['brand', 'category'])
            ->active()
            ->featured()
            ->latest()
            ->take(8)
            ->get();

        $latestProducts = Product::with(['brand', 'category'])
            ->active()
            ->latest()
            ->take(8)
            ->get();

        $brands = Brand::active()
            ->withCount('activeProducts')
            ->orderBy('name')
            ->get();

        $categories = Category::active()
            ->parentCategories()
            ->withCount('activeProducts')
            ->orderBy('sort_order')
            ->get();

        return view('home', compact(
            'featuredProducts',
            'latestProducts',
            'brands',
            'categories'
        ));
    }

    public function about(): View
    {
        return view('about');
    }

    public function contact(): View
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ], [
            'name.required' => 'الاسم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صالح',
            'subject.required' => 'الموضوع مطلوب',
            'message.required' => 'الرسالة مطلوبة',
        ]);

        return back()->with('success', 'تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.');
    }
}
