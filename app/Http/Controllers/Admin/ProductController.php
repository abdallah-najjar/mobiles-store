<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSpecification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::with(['brand', 'category']);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $products = $query->latest()->paginate(15)->withQueryString();
        $brands = Brand::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'brands', 'categories'));
    }

    public function create(): View
    {
        $brands = Brand::active()->orderBy('name')->get();
        $categories = Category::active()->orderBy('name')->get();

        return view('admin.products.create', compact('brands', 'categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'sku' => 'required|string|unique:products,sku',
            'main_image' => 'nullable|string',
            'main_image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('main_image_file')) {
            $path = $request->file('main_image_file')->store('products', 'public');
            $validated['main_image'] = asset('storage/' . $path);
        }

        unset($validated['main_image_file']);

        $product = Product::create($validated);

        if ($request->has('specifications')) {
            foreach ($request->specifications as $index => $spec) {
                if (!empty($spec['name']) && !empty($spec['value'])) {
                    ProductSpecification::create([
                        'product_id' => $product->id,
                        'spec_group' => $spec['group'] ?? 'General',
                        'spec_name' => $spec['name'],
                        'spec_value' => $spec['value'],
                        'sort_order' => $index,
                    ]);
                }
            }
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product): View
    {
        $brands = Brand::active()->orderBy('name')->get();
        $categories = Category::active()->orderBy('name')->get();
        $product->load(['images', 'specifications']);

        return view('admin.products.edit', compact('product', 'brands', 'categories'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'sku' => 'required|string|unique:products,sku,' . $product->id,
            'main_image' => 'nullable|string',
            'main_image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('main_image_file')) {
            if ($product->main_image && str_contains($product->main_image, 'storage/products/')) {
                $oldPath = str_replace(asset('storage/'), '', $product->main_image);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('main_image_file')->store('products', 'public');
            $validated['main_image'] = asset('storage/' . $path);
        }

        unset($validated['main_image_file']);

        $product->update($validated);

        $product->specifications()->delete();
        if ($request->has('specifications')) {
            foreach ($request->specifications as $index => $spec) {
                if (!empty($spec['name']) && !empty($spec['value'])) {
                    ProductSpecification::create([
                        'product_id' => $product->id,
                        'spec_group' => $spec['group'] ?? 'General',
                        'spec_name' => $spec['name'],
                        'spec_value' => $spec['value'],
                        'sort_order' => $index,
                    ]);
                }
            }
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if ($product->main_image && str_contains($product->main_image, 'storage/products/')) {
            $oldPath = str_replace(asset('storage/'), '', $product->main_image);
            Storage::disk('public')->delete($oldPath);
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
