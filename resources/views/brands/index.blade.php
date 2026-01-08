@extends('layouts.app')

@section('title', 'العلامات التجارية - موبايلات المواصي')

@section('content')
    <section class="bg-gradient-to-l from-gray-800 to-gray-900 text-white py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold">العلامات التجارية</h1>
            <nav class="text-sm mt-2">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white">الرئيسية</a>
                <span class="mx-2 text-gray-500">/</span>
                <span>العلامات التجارية</span>
            </nav>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">تسوق علامتك التجارية المفضلة</h2>
                <p class="text-gray-600">اختر من بين أفضل مصنعي الهواتف الذكية في العالم</p>
            </div>

            @if ($brands->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                    @foreach ($brands as $brand)
                        <a href="{{ route('brands.show', $brand) }}"
                            class="bg-white rounded-xl shadow-sm p-6 text-center hover:shadow-lg transition group">
                            @if ($brand->logo)
                                <img src="{{ $brand->logo }}" alt="{{ $brand->name }}"
                                    class="h-16 mx-auto mb-4 object-contain">
                            @else
                                <div class="h-16 flex items-center justify-center mb-4">
                                    <i
                                        class="fas fa-mobile-alt text-4xl text-gray-300 group-hover:text-blue-600 transition"></i>
                                </div>
                            @endif
                            <h3 class="font-semibold text-gray-800 group-hover:text-blue-600 transition text-lg">
                                {{ $brand->name }}
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $brand->active_products_count }} منتج</p>
                            @if ($brand->description)
                                <p class="text-xs text-gray-400 mt-2 line-clamp-2">{{ $brand->description }}</p>
                            @endif
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-store text-5xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">لا توجد علامات تجارية</h3>
                    <p class="text-gray-600">تحقق قريباً من مجموعة العلامات التجارية لدينا.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
