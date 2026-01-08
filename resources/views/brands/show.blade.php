@extends('layouts.app')

@section('title', $brand->name . ' - موبايلات المواصي')

@section('content')
    <section class="bg-gradient-to-l from-gray-800 to-gray-900 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4">
                @if ($brand->logo)
                    <img src="{{ $brand->logo }}" alt="{{ $brand->name }}" class="h-16 bg-white rounded-lg p-2">
                @endif
                <div>
                    <h1 class="text-3xl font-bold">{{ $brand->name }}</h1>
                    <nav class="text-sm mt-2">
                        <a href="{{ route('home') }}" class="text-gray-400 hover:text-white">الرئيسية</a>
                        <span class="mx-2 text-gray-500">/</span>
                        <a href="{{ route('brands.index') }}" class="text-gray-400 hover:text-white">العلامات التجارية</a>
                        <span class="mx-2 text-gray-500">/</span>
                        <span>{{ $brand->name }}</span>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    @if ($brand->description)
        <section class="bg-white py-6 border-b">
            <div class="container mx-auto px-4">
                <p class="text-gray-600">{{ $brand->description }}</p>
            </div>
        </section>
    @endif

    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">
                    منتجات {{ $brand->name }} ({{ $products->total() }})
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
                    <p class="text-gray-600 mb-4">لا تتوفر منتجات {{ $brand->name }} حالياً.</p>
                    <a href="{{ route('products.index') }}"
                        class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        تصفح جميع المنتجات
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
