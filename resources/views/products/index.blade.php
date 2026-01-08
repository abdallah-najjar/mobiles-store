@extends('layouts.app')

@section('title', 'جميع المنتجات - موبايلات المواصي')

@section('content')
    <section class="bg-gradient-to-l from-gray-800 to-gray-900 text-white py-6 sm:py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl sm:text-3xl font-bold">جميع المنتجات</h1>
            <nav class="text-xs sm:text-sm mt-2">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white">الرئيسية</a>
                <span class="mx-1 sm:mx-2 text-gray-500">/</span>
                <span>المنتجات</span>
            </nav>
        </div>
    </section>

    <section class="py-4 sm:py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-4 lg:gap-8">
                <button id="filter-toggle"
                    class="lg:hidden flex items-center justify-center gap-2 bg-white rounded-lg shadow-sm p-3 text-gray-700">
                    <i class="fas fa-filter"></i>
                    <span>عرض الفلاتر</span>
                </button>

                <aside id="filters-sidebar" class="lg:w-64 flex-shrink-0 hidden lg:block">
                    <form action="{{ route('products.index') }}" method="GET" id="filter-form">
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 mb-3 sm:mb-4">
                            <h3 class="font-semibold text-gray-800 mb-2 sm:mb-3 text-sm sm:text-base">العلامات التجارية</h3>
                            <div class="space-y-2 max-h-40 sm:max-h-48 overflow-y-auto">
                                @foreach ($brands as $brand)
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="brand" value="{{ $brand->slug }}"
                                            {{ request('brand') == $brand->slug ? 'checked' : '' }}
                                            class="text-blue-600 focus:ring-blue-500"
                                            onchange="document.getElementById('filter-form').submit()">
                                        <span class="mr-2 text-xs sm:text-sm text-gray-700">{{ $brand->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @if (request('brand'))
                                <a href="{{ route('products.index', request()->except('brand')) }}"
                                    class="text-xs sm:text-sm text-blue-600 hover:underline mt-2 block">مسح فلتر العلامة</a>
                            @endif
                        </div>

                        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 mb-3 sm:mb-4">
                            <h3 class="font-semibold text-gray-800 mb-2 sm:mb-3 text-sm sm:text-base">التصنيفات</h3>
                            <div class="space-y-2">
                                @foreach ($categories as $category)
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="category" value="{{ $category->slug }}"
                                            {{ request('category') == $category->slug ? 'checked' : '' }}
                                            class="text-blue-600 focus:ring-blue-500"
                                            onchange="document.getElementById('filter-form').submit()">
                                        <span class="mr-2 text-xs sm:text-sm text-gray-700">{{ $category->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @if (request('category'))
                                <a href="{{ route('products.index', request()->except('category')) }}"
                                    class="text-xs sm:text-sm text-blue-600 hover:underline mt-2 block">مسح فلتر التصنيف</a>
                            @endif
                        </div>

                        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 mb-3 sm:mb-4">
                            <h3 class="font-semibold text-gray-800 mb-2 sm:mb-3 text-sm sm:text-base">نطاق السعر</h3>
                            <div class="flex gap-2 mb-3">
                                <input type="number" name="min_price" placeholder="الحد الأدنى"
                                    value="{{ request('min_price') }}"
                                    class="w-full px-2 sm:px-3 py-2 border border-gray-300 rounded text-xs sm:text-sm">
                                <input type="number" name="max_price" placeholder="الحد الأقصى"
                                    value="{{ request('max_price') }}"
                                    class="w-full px-2 sm:px-3 py-2 border border-gray-300 rounded text-xs sm:text-sm">
                            </div>
                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 rounded text-xs sm:text-sm hover:bg-blue-700 transition">
                                تطبيق الفلتر
                            </button>
                        </div>
                    </form>

                    @if (request()->hasAny(['brand', 'category', 'min_price', 'max_price', 'search']))
                        <a href="{{ route('products.index') }}"
                            class="block text-center bg-gray-200 text-gray-700 py-2 rounded hover:bg-gray-300 transition text-sm">
                            إعادة تعيين جميع الفلاتر
                        </a>
                    @endif
                </aside>

                <div class="flex-1">
                    <div
                        class="bg-white rounded-lg shadow-sm p-3 sm:p-4 mb-4 sm:mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-4">
                        <p class="text-gray-600 text-sm">
                            عرض <span class="font-medium">{{ $products->count() }}</span> من
                            <span class="font-medium">{{ $products->total() }}</span> منتج
                        </p>
                        <div class="flex items-center gap-2 sm:gap-3 w-full sm:w-auto">
                            <label class="text-xs sm:text-sm text-gray-600 whitespace-nowrap">ترتيب:</label>
                            <select name="sort"
                                onchange="window.location.href = '{{ route('products.index') }}?' + new URLSearchParams({...Object.fromEntries(new URLSearchParams(window.location.search)), sort: this.value}).toString()"
                                class="flex-1 sm:flex-none border border-gray-300 rounded px-2 sm:px-3 py-2 text-xs sm:text-sm focus:outline-none focus:border-blue-500">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>الأحدث</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>السعر:
                                    الأقل</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>السعر:
                                    الأعلى</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>الاسم</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>الأكثر شعبية
                                </option>
                            </select>
                        </div>
                    </div>

                    @if (request('search'))
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 sm:p-4 mb-4 sm:mb-6">
                            <p class="text-blue-800 text-sm">
                                نتائج البحث عن: <strong>"{{ request('search') }}"</strong>
                                <a href="{{ route('products.index') }}" class="mr-2 text-blue-600 hover:underline">مسح</a>
                            </p>
                        </div>
                    @endif

                    @if ($products->count() > 0)
                        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                            @foreach ($products as $product)
                                @include('components.product-card', ['product' => $product])
                            @endforeach
                        </div>

                        <div class="mt-6 sm:mt-8">
                            {{ $products->links() }}
                        </div>
                    @else
                        <div class="bg-white rounded-lg shadow-sm p-8 sm:p-12 text-center">
                            <i class="fas fa-search text-4xl sm:text-5xl text-gray-300 mb-4"></i>
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">لا توجد منتجات</h3>
                            <p class="text-gray-600 mb-4 text-sm sm:text-base">حاول تعديل الفلاتر أو كلمات البحث</p>
                            <a href="{{ route('products.index') }}"
                                class="inline-block bg-blue-600 text-white px-4 sm:px-6 py-2 rounded hover:bg-blue-700 transition text-sm sm:text-base">
                                عرض جميع المنتجات
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Mobile filter toggle
        const filterToggle = document.getElementById('filter-toggle');
        const filtersSidebar = document.getElementById('filters-sidebar');

        if (filterToggle && filtersSidebar) {
            filterToggle.addEventListener('click', function() {
                filtersSidebar.classList.toggle('hidden');
                const isVisible = !filtersSidebar.classList.contains('hidden');
                filterToggle.innerHTML = isVisible ?
                    '<i class="fas fa-times"></i><span>إخفاء الفلاتر</span>' :
                    '<i class="fas fa-filter"></i><span>عرض الفلاتر</span>';
            });
        }
    </script>
@endpush
