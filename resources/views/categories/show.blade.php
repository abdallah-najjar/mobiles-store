@extends('layouts.app')

@section('title', $category->name . ' - موبايلات المواصي')

@section('content')
    <section class="bg-gradient-to-l from-gray-800 to-gray-900 text-white py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold">{{ $category->name }}</h1>
            <nav class="text-sm mt-2">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white">الرئيسية</a>
                <span class="mx-2 text-gray-500">/</span>
                <a href="{{ route('categories.index') }}" class="text-gray-400 hover:text-white">التصنيفات</a>
                <span class="mx-2 text-gray-500">/</span>
                @if ($category->parent)
                    <a href="{{ route('categories.show', $category->parent) }}" class="text-gray-400 hover:text-white">
                        {{ $category->parent->name }}
                    </a>
                    <span class="mx-2 text-gray-500">/</span>
                @endif
                <span>{{ $category->name }}</span>
            </nav>
        </div>
    </section>

    @if ($category->description)
        <section class="bg-white py-6 border-b">
            <div class="container mx-auto px-4">
                <p class="text-gray-600">{{ $category->description }}</p>
            </div>
        </section>
    @endif

    @if ($subcategories->count() > 0)
        <section class="py-6 bg-gray-50">
            <div class="container mx-auto px-4">
                <h3 class="font-semibold text-gray-800 mb-4">التصنيفات الفرعية</h3>
                <div class="flex flex-wrap gap-3">
                    @foreach ($subcategories as $subcategory)
                        <a href="{{ route('categories.show', $subcategory) }}"
                            class="bg-white px-4 py-2 rounded-lg shadow-sm hover:shadow-md transition text-gray-700 hover:text-blue-600">
                            {{ $subcategory->name }}
                            <span class="text-gray-400 text-sm">({{ $subcategory->products()->active()->count() }})</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">
                    {{ $category->name }} ({{ $products->total() }} منتج)
                </h2>
            </div>

            @if ($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        @include('components.product-card', ['product' => $product])
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @else
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <i class="fas fa-mobile-alt text-5xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">لا توجد منتجات</h3>
                    <p class="text-gray-600 mb-4">لا توجد منتجات في هذا التصنيف حتى الآن.</p>
                    <a href="{{ route('products.index') }}"
                        class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        تصفح جميع المنتجات
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
