@extends('layouts.admin')

@section('title', 'لوحة التحكم')
@section('page-title', 'لوحة التحكم')

@section('content')
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4 lg:gap-6 mb-6 sm:mb-8">
        <div class="bg-white rounded-xl shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center justify-between">
                <div class="min-w-0">
                    <p class="text-gray-500 text-xs sm:text-sm truncate">إجمالي المنتجات</p>
                    <p class="text-xl sm:text-2xl font-bold text-gray-800">{{ $stats['total_products'] }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-mobile-alt text-blue-600 text-lg sm:text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center justify-between">
                <div class="min-w-0">
                    <p class="text-gray-500 text-xs sm:text-sm truncate">المنتجات النشطة</p>
                    <p class="text-xl sm:text-2xl font-bold text-green-600">{{ $stats['active_products'] }}</p>
                </div>
                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-check-circle text-green-600 text-lg sm:text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center justify-between">
                <div class="min-w-0">
                    <p class="text-gray-500 text-xs sm:text-sm truncate">المميزة</p>
                    <p class="text-xl sm:text-2xl font-bold text-yellow-600">{{ $stats['featured_products'] }}</p>
                </div>
                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-star text-yellow-600 text-lg sm:text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center justify-between">
                <div class="min-w-0">
                    <p class="text-gray-500 text-xs sm:text-sm truncate">نفذت الكمية</p>
                    <p class="text-xl sm:text-2xl font-bold text-red-600">{{ $stats['out_of_stock'] }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-red-600 text-lg sm:text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center justify-between">
                <div class="min-w-0">
                    <p class="text-gray-500 text-xs sm:text-sm truncate">العلامات التجارية</p>
                    <p class="text-xl sm:text-2xl font-bold text-purple-600">{{ $stats['total_brands'] }}</p>
                </div>
                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-building text-purple-600 text-lg sm:text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center justify-between">
                <div class="min-w-0">
                    <p class="text-gray-500 text-xs sm:text-sm truncate">التصنيفات</p>
                    <p class="text-xl sm:text-2xl font-bold text-indigo-600">{{ $stats['total_categories'] }}</p>
                </div>
                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-folder text-indigo-600 text-lg sm:text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-4 sm:p-6 border-b flex justify-between items-center">
                <h2 class="text-base sm:text-lg font-semibold text-gray-800">أحدث المنتجات</h2>
                <a href="{{ route('admin.products.index') }}" class="text-blue-600 text-xs sm:text-sm hover:underline">عرض
                    الكل</a>
            </div>
            <div class="p-4 sm:p-6">
                @if ($recentProducts->count() > 0)
                    <div class="space-y-3 sm:space-y-4">
                        @foreach ($recentProducts as $product)
                            <div class="flex items-center justify-between gap-2">
                                <div class="flex items-center min-w-0 flex-1">
                                    @if ($product->main_image)
                                        <img src="{{ $product->main_image }}" alt="{{ $product->name }}"
                                            class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg object-cover ml-3 sm:ml-4 flex-shrink-0">
                                    @else
                                        <div
                                            class="w-10 h-10 sm:w-12 sm:h-12 bg-gray-100 rounded-lg flex items-center justify-center ml-3 sm:ml-4 flex-shrink-0">
                                            <i class="fas fa-mobile-alt text-gray-400"></i>
                                        </div>
                                    @endif
                                    <div class="min-w-0">
                                        <h4 class="font-medium text-gray-800 text-sm sm:text-base truncate">
                                            {{ Str::limit($product->name, 25) }}</h4>
                                        <p class="text-xs sm:text-sm text-gray-500">{{ $product->brand->name }}</p>
                                    </div>
                                </div>
                                <span
                                    class="font-semibold text-blue-600 text-sm sm:text-base whitespace-nowrap">${{ number_format($product->price, 2) }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-6 sm:py-8 text-sm">لا توجد منتجات بعد</p>
                @endif
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-4 sm:p-6 border-b flex justify-between items-center">
                <h2 class="text-base sm:text-lg font-semibold text-gray-800">الأكثر مشاهدة</h2>
                <a href="{{ route('admin.products.index') }}" class="text-blue-600 text-xs sm:text-sm hover:underline">عرض
                    الكل</a>
            </div>
            <div class="p-4 sm:p-6">
                @if ($popularProducts->count() > 0)
                    <div class="space-y-3 sm:space-y-4">
                        @foreach ($popularProducts as $product)
                            <div class="flex items-center justify-between gap-2">
                                <div class="flex items-center min-w-0 flex-1">
                                    @if ($product->main_image)
                                        <img src="{{ $product->main_image }}" alt="{{ $product->name }}"
                                            class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg object-cover ml-3 sm:ml-4 flex-shrink-0">
                                    @else
                                        <div
                                            class="w-10 h-10 sm:w-12 sm:h-12 bg-gray-100 rounded-lg flex items-center justify-center ml-3 sm:ml-4 flex-shrink-0">
                                            <i class="fas fa-mobile-alt text-gray-400"></i>
                                        </div>
                                    @endif
                                    <div class="min-w-0">
                                        <h4 class="font-medium text-gray-800 text-sm sm:text-base truncate">
                                            {{ Str::limit($product->name, 25) }}</h4>
                                        <p class="text-xs sm:text-sm text-gray-500">{{ $product->brand->name }}</p>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-xs sm:text-sm whitespace-nowrap">
                                    <i class="fas fa-eye ml-1"></i> {{ number_format($product->view_count) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-6 sm:py-8 text-sm">لا توجد منتجات بعد</p>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-6 sm:mt-8 bg-white rounded-xl shadow-sm p-4 sm:p-6">
        <h2 class="text-base sm:text-lg font-semibold text-gray-800 mb-4">إجراءات سريعة</h2>
        <div class="flex flex-wrap gap-2 sm:gap-4">
            <a href="{{ route('admin.products.create') }}"
                class="bg-blue-600 text-white px-3 sm:px-4 py-2 rounded-lg hover:bg-blue-700 transition text-sm sm:text-base">
                <i class="fas fa-plus ml-1 sm:ml-2"></i> إضافة منتج
            </a>
            <a href="{{ route('admin.brands.create') }}"
                class="bg-purple-600 text-white px-3 sm:px-4 py-2 rounded-lg hover:bg-purple-700 transition text-sm sm:text-base">
                <i class="fas fa-plus ml-1 sm:ml-2"></i> إضافة علامة تجارية
            </a>
            <a href="{{ route('admin.categories.create') }}"
                class="bg-indigo-600 text-white px-3 sm:px-4 py-2 rounded-lg hover:bg-indigo-700 transition text-sm sm:text-base">
                <i class="fas fa-plus ml-1 sm:ml-2"></i> إضافة تصنيف
            </a>
        </div>
    </div>
@endsection
