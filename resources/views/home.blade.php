@extends('layouts.app')

@section('title', 'موبايلات المواصي - وجهتك الموثوقة للهواتف الذكية في غزة')

@section('content')
    <section class="bg-gradient-to-l from-blue-600 to-blue-800 text-white py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-6 lg:gap-8">
                <div class="lg:w-1/2 text-center lg:text-right">
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-bold mb-3 sm:mb-4">
                        اكتشف هاتفك <span class="text-yellow-400">المثالي</span>
                    </h1>
                    <p class="text-sm sm:text-base lg:text-lg text-blue-100 mb-4 sm:mb-6">
                        اكتشف أحدث الهواتف المحمولة من أفضل العلامات التجارية بأفضل الأسعار في غزة.
                        جودة مضمونة مع خدمة عملاء ممتازة.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-3 sm:gap-4">
                        <a href="{{ route('products.index') }}"
                            class="bg-white text-blue-600 px-5 sm:px-6 py-2.5 sm:py-3 rounded-lg font-semibold hover:bg-gray-100 transition text-sm sm:text-base">
                            تصفح المنتجات
                        </a>
                        <a href="{{ route('products.index', ['featured' => 1]) }}"
                            class="border-2 border-white text-white px-5 sm:px-6 py-2.5 sm:py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition text-sm sm:text-base">
                            العروض المميزة
                        </a>
                    </div>
                </div>
                <div class="lg:w-1/2 flex justify-center">
                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=500" alt="أحدث الهواتف الذكية"
                        class="rounded-lg shadow-2xl max-w-xs sm:max-w-sm lg:max-w-md w-full">
                </div>
            </div>
        </div>
    </section>

    <section class="py-6 sm:py-8 lg:py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
                <div
                    class="flex flex-col sm:flex-row items-center sm:items-center p-3 sm:p-4 bg-gray-50 rounded-lg text-center sm:text-right">
                    <div
                        class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2 sm:mb-0 sm:ml-3 lg:ml-4 flex-shrink-0">
                        <i class="fas fa-shipping-fast text-blue-600 text-lg sm:text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800 text-xs sm:text-sm lg:text-base">توصيل مجاني</h4>
                        <p class="text-xs sm:text-sm text-gray-600 hidden sm:block">داخل مدينة غزة</p>
                    </div>
                </div>
                <div
                    class="flex flex-col sm:flex-row items-center sm:items-center p-3 sm:p-4 bg-gray-50 rounded-lg text-center sm:text-right">
                    <div
                        class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 rounded-full flex items-center justify-center mb-2 sm:mb-0 sm:ml-3 lg:ml-4 flex-shrink-0">
                        <i class="fas fa-shield-alt text-green-600 text-lg sm:text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800 text-xs sm:text-sm lg:text-base">ضمان</h4>
                        <p class="text-xs sm:text-sm text-gray-600 hidden sm:block">سنة كاملة</p>
                    </div>
                </div>
                <div
                    class="flex flex-col sm:flex-row items-center sm:items-center p-3 sm:p-4 bg-gray-50 rounded-lg text-center sm:text-right">
                    <div
                        class="w-10 h-10 sm:w-12 sm:h-12 bg-yellow-100 rounded-full flex items-center justify-center mb-2 sm:mb-0 sm:ml-3 lg:ml-4 flex-shrink-0">
                        <i class="fas fa-headset text-yellow-600 text-lg sm:text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800 text-xs sm:text-sm lg:text-base">دعم 24/7</h4>
                        <p class="text-xs sm:text-sm text-gray-600 hidden sm:block">تواصل معنا في أي وقت</p>
                    </div>
                </div>
                <div
                    class="flex flex-col sm:flex-row items-center sm:items-center p-3 sm:p-4 bg-gray-50 rounded-lg text-center sm:text-right">
                    <div
                        class="w-10 h-10 sm:w-12 sm:h-12 bg-red-100 rounded-full flex items-center justify-center mb-2 sm:mb-0 sm:ml-3 lg:ml-4 flex-shrink-0">
                        <i class="fas fa-undo text-red-600 text-lg sm:text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800 text-xs sm:text-sm lg:text-base">استرجاع سهل</h4>
                        <p class="text-xs sm:text-sm text-gray-600 hidden sm:block">خلال 7 أيام</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($featuredProducts->count() > 0)
        <section class="py-8 sm:py-12">
            <div class="container mx-auto px-4">
                <div
                    class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 sm:gap-0 mb-6 sm:mb-8">
                    <div>
                        <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800">المنتجات المميزة</h2>
                        <p class="text-gray-600 mt-1 text-sm sm:text-base">اختيارات مميزة من أفضل الهواتف لدينا</p>
                    </div>
                    <a href="{{ route('products.index', ['featured' => 1]) }}"
                        class="text-blue-600 hover:text-blue-800 font-medium text-sm sm:text-base">
                        عرض الكل <i class="fas fa-arrow-left mr-1"></i>
                    </a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
                    @foreach ($featuredProducts as $product)
                        @include('components.product-card', ['product' => $product])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($brands->count() > 0)
        <section class="py-8 sm:py-12 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-6 sm:mb-8">
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800">تسوق حسب العلامة التجارية</h2>
                    <p class="text-gray-600 mt-1 text-sm sm:text-base">اختر من بين أفضل مصنعي الهواتف الذكية في العالم</p>
                </div>

                <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 gap-2 sm:gap-3 lg:gap-4">
                    @foreach ($brands as $brand)
                        <a href="{{ route('brands.show', $brand) }}"
                            class="bg-gray-50 rounded-lg p-3 sm:p-4 lg:p-6 text-center hover:shadow-md transition group">
                            @if ($brand->logo)
                                <img src="{{ $brand->logo }}" alt="{{ $brand->name }}"
                                    class="h-8 sm:h-10 lg:h-12 mx-auto mb-2 sm:mb-3 object-contain">
                            @else
                                <div class="h-8 sm:h-10 lg:h-12 flex items-center justify-center mb-2 sm:mb-3">
                                    <i
                                        class="fas fa-mobile-alt text-xl sm:text-2xl lg:text-3xl text-gray-400 group-hover:text-blue-600"></i>
                                </div>
                            @endif
                            <h4
                                class="font-medium text-gray-800 group-hover:text-blue-600 text-xs sm:text-sm lg:text-base truncate">
                                {{ $brand->name }}</h4>
                            <p class="text-xs text-gray-500 hidden sm:block">{{ $brand->active_products_count }} منتج</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($categories->count() > 0)
        <section class="py-8 sm:py-12">
            <div class="container mx-auto px-4">
                <div class="text-center mb-6 sm:mb-8">
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800">تصفح التصنيفات</h2>
                    <p class="text-gray-600 mt-1 text-sm sm:text-base">ابحث عن الهواتف التي تناسب احتياجاتك وميزانيتك</p>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
                    @foreach ($categories as $category)
                        <a href="{{ route('categories.show', $category) }}"
                            class="relative rounded-xl overflow-hidden group h-32 sm:h-40 lg:h-48">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-purple-600 opacity-90"></div>
                            @if ($category->image)
                                <img src="{{ $category->image }}" alt="{{ $category->name }}"
                                    class="absolute inset-0 w-full h-full object-cover mix-blend-overlay">
                            @endif
                            <div class="relative z-10 h-full flex flex-col justify-end p-3 sm:p-4 lg:p-6 text-white">
                                <h3 class="text-sm sm:text-lg lg:text-xl font-bold mb-1">{{ $category->name }}</h3>
                                <p class="text-xs sm:text-sm opacity-90">{{ $category->active_products_count }} منتج</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($latestProducts->count() > 0)
        <section class="py-8 sm:py-12 bg-white">
            <div class="container mx-auto px-4">
                <div
                    class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 sm:gap-0 mb-6 sm:mb-8">
                    <div>
                        <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800">أحدث الوصولات</h2>
                        <p class="text-gray-600 mt-1 text-sm sm:text-base">أحدث الإضافات إلى مجموعتنا</p>
                    </div>
                    <a href="{{ route('products.index', ['sort' => 'latest']) }}"
                        class="text-blue-600 hover:text-blue-800 font-medium text-sm sm:text-base">
                        عرض الكل <i class="fas fa-arrow-left mr-1"></i>
                    </a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
                    @foreach ($latestProducts as $product)
                        @include('components.product-card', ['product' => $product])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="py-8 sm:py-12 bg-blue-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-2 sm:mb-3">ابق على اطلاع</h2>
            <p class="text-blue-100 mb-4 sm:mb-6 text-sm sm:text-base">اشترك للحصول على إشعارات حول الوصولات الجديدة والعروض
                الحصرية</p>
            <form class="flex flex-col sm:flex-row justify-center gap-3 max-w-md mx-auto px-4 sm:px-0">
                <input type="email" placeholder="أدخل بريدك الإلكتروني"
                    class="flex-1 px-4 py-2.5 sm:py-3 rounded-lg focus:outline-none text-sm sm:text-base">
                <button type="submit"
                    class="bg-gray-900 text-white px-5 sm:px-6 py-2.5 sm:py-3 rounded-lg font-semibold hover:bg-gray-800 transition text-sm sm:text-base">
                    اشترك الآن
                </button>
            </form>
        </div>
    </section>
@endsection
