@extends('layouts.app')

@section('title', 'التصنيفات - موبايلات المواصي')

@section('content')
    <section class="bg-gradient-to-l from-gray-800 to-gray-900 text-white py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold">التصنيفات</h1>
            <nav class="text-sm mt-2">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white">الرئيسية</a>
                <span class="mx-2 text-gray-500">/</span>
                <span>التصنيفات</span>
            </nav>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">تصفح حسب التصنيف</h2>
                <p class="text-gray-600">ابحث عن الهواتف التي تناسب احتياجاتك وميزانيتك</p>
            </div>

            @if ($categories->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($categories as $category)
                        <a href="{{ route('categories.show', $category) }}"
                            class="relative rounded-xl overflow-hidden group h-64 block">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-purple-700"></div>
                            @if ($category->image)
                                <img src="{{ $category->image }}" alt="{{ $category->name }}"
                                    class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-60">
                            @endif
                            <div class="relative z-10 h-full flex flex-col justify-between p-6 text-white">
                                <div>
                                    <h3 class="text-2xl font-bold mb-2">{{ $category->name }}</h3>
                                    @if ($category->description)
                                        <p class="text-sm opacity-90 line-clamp-2">{{ $category->description }}</p>
                                    @endif
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm opacity-90">{{ $category->active_products_count }} منتج</span>
                                    <span
                                        class="bg-white/20 px-3 py-1 rounded-full text-sm group-hover:bg-white group-hover:text-blue-600 transition">
                                        عرض الكل <i class="fas fa-arrow-left mr-1"></i>
                                    </span>
                                </div>
                            </div>
                        </a>

                        @if ($category->children->count() > 0)
                            @foreach ($category->children as $child)
                                <a href="{{ route('categories.show', $child) }}"
                                    class="bg-white rounded-xl shadow-sm p-6 hover:shadow-lg transition group">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <span class="text-xs text-blue-600 font-medium">{{ $category->name }}</span>
                                            <h4
                                                class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition">
                                                {{ $child->name }}
                                            </h4>
                                            <p class="text-sm text-gray-500">{{ $child->active_products_count }} منتج</p>
                                        </div>
                                        <i
                                            class="fas fa-chevron-left text-gray-400 group-hover:text-blue-600 transition"></i>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-folder-open text-5xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">لا توجد تصنيفات</h3>
                    <p class="text-gray-600">تحقق قريباً من مجموعة التصنيفات لدينا.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
