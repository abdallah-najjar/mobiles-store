<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function index(): View
    {
        $brands = Brand::withCount('products')->latest()->paginate(15);

        return view('admin.brands.index', compact('brands'));
    }

    public function create(): View
    {
        return view('admin.brands.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|string',
            'logo_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo_file')) {
            $path = $request->file('logo_file')->store('brands', 'public');
            $validated['logo'] = asset('storage/' . $path);
        }

        unset($validated['logo_file']);

        Brand::create($validated);

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand): View
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|string',
            'logo_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo_file')) {
            if ($brand->logo && str_contains($brand->logo, 'storage/brands/')) {
                $oldPath = str_replace(asset('storage/'), '', $brand->logo);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('logo_file')->store('brands', 'public');
            $validated['logo'] = asset('storage/' . $path);
        }

        unset($validated['logo_file']);

        $brand->update($validated);

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        if ($brand->products()->count() > 0) {
            return redirect()
                ->route('admin.brands.index')
                ->with('error', 'Cannot delete brand with associated products.');
        }

        if ($brand->logo && str_contains($brand->logo, 'storage/brands/')) {
            $oldPath = str_replace(asset('storage/'), '', $brand->logo);
            Storage::disk('public')->delete($oldPath);
        }

        $brand->delete();

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand deleted successfully.');
    }
}
