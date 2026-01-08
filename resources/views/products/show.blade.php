@extends('layouts.app')

@section('title', $product->name . ' - موبايلات المواصي')

@section('content')
    <section class="bg-gray-100 py-3 sm:py-4">
        <div class="container mx-auto px-4">
            <nav class="text-xs sm:text-sm overflow-x-auto whitespace-nowrap">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-blue-600">الرئيسية</a>
                <span class="mx-1 sm:mx-2 text-gray-400">/</span>
                <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-blue-600">المنتجات</a>
                <span class="mx-1 sm:mx-2 text-gray-400">/</span>
                <a href="{{ route('brands.show', $product->brand) }}"
                    class="text-gray-500 hover:text-blue-600">{{ $product->brand->name }}</a>
                <span class="mx-1 sm:mx-2 text-gray-400">/</span>
                <span class="text-gray-800">{{ Str::limit($product->name, 25) }}</span>
            </nav>
        </div>
    </section>

    <section class="py-4 sm:py-8">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="flex flex-col lg:flex-row">
                    <div class="lg:w-1/2 p-4 sm:p-6">
                        <div class="relative">
                            @if ($product->main_image)
                                <img src="{{ $product->main_image }}" alt="{{ $product->name }}"
                                    class="w-full h-64 sm:h-80 lg:h-96 object-contain rounded-lg bg-gray-50"
                                    id="main-product-image">
                            @else
                                <div
                                    class="w-full h-64 sm:h-80 lg:h-96 bg-gray-100 flex items-center justify-center rounded-lg">
                                    <i class="fas fa-mobile-alt text-6xl sm:text-8xl text-gray-300"></i>
                                </div>
                            @endif

                            @if ($product->discount_percentage)
                                <span
                                    class="absolute top-2 sm:top-4 right-2 sm:right-4 bg-red-500 text-white text-xs sm:text-sm font-bold px-2 sm:px-3 py-1 rounded-full">
                                    خصم {{ $product->discount_percentage }}%
                                </span>
                            @endif
                        </div>

                        @if ($product->images->count() > 0)
                            <div class="flex gap-2 sm:gap-3 mt-3 sm:mt-4 overflow-x-auto pb-2">
                                <button
                                    class="flex-shrink-0 w-16 h-16 sm:w-20 sm:h-20 border-2 border-blue-500 rounded-lg overflow-hidden"
                                    onclick="document.getElementById('main-product-image').src='{{ $product->main_image }}'">
                                    <img src="{{ $product->main_image }}" alt="" class="w-full h-full object-cover">
                                </button>
                                @foreach ($product->images as $image)
                                    <button
                                        class="flex-shrink-0 w-16 h-16 sm:w-20 sm:h-20 border-2 border-gray-200 rounded-lg overflow-hidden hover:border-blue-500 transition"
                                        onclick="document.getElementById('main-product-image').src='{{ $image->image_path }}'">
                                        <img src="{{ $image->image_path }}" alt="{{ $image->alt_text }}"
                                            class="w-full h-full object-cover">
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="lg:w-1/2 p-4 sm:p-6 lg:border-r border-t lg:border-t-0">
                        <div class="flex items-center gap-2 mb-2">
                            <a href="{{ route('brands.show', $product->brand) }}"
                                class="text-xs sm:text-sm text-blue-600 font-medium uppercase hover:underline">
                                {{ $product->brand->name }}
                            </a>
                            @if ($product->is_featured)
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-0.5 sm:py-1 rounded">
                                    <i class="fas fa-star"></i> مميز
                                </span>
                            @endif
                        </div>

                        <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mb-3 sm:mb-4">
                            {{ $product->name }}</h1>

                        @if ($product->short_description)
                            <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">{{ $product->short_description }}
                            </p>
                        @endif

                        <div class="flex flex-wrap items-center gap-2 sm:gap-4 mb-4 sm:mb-6">
                            <span
                                class="text-2xl sm:text-3xl font-bold text-blue-600">${{ number_format($product->price, 2) }}</span>
                            @if ($product->old_price)
                                <span
                                    class="text-lg sm:text-xl text-gray-400 line-through">${{ number_format($product->old_price, 2) }}</span>
                                <span
                                    class="bg-red-100 text-red-600 text-xs sm:text-sm font-semibold px-2 py-0.5 sm:py-1 rounded">
                                    وفر ${{ number_format($product->old_price - $product->price, 2) }}
                                </span>
                            @endif
                        </div>

                        <div class="mb-4 sm:mb-6">
                            @if ($product->isInStock())
                                <span class="inline-flex items-center text-green-600 text-sm sm:text-base">
                                    <i class="fas fa-check-circle ml-2"></i>
                                    متوفر ({{ $product->stock_quantity }} قطعة)
                                </span>
                            @else
                                <span class="inline-flex items-center text-red-600 text-sm sm:text-base">
                                    <i class="fas fa-times-circle ml-2"></i>
                                    غير متوفر
                                </span>
                            @endif
                        </div>

                        <div class="bg-gray-50 rounded-lg p-3 sm:p-4 mb-4 sm:mb-6">
                            <h3 class="font-semibold text-gray-800 mb-2 sm:mb-3 text-sm sm:text-base">المواصفات السريعة</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-3 text-xs sm:text-sm">
                                @php
                                    $quickSpecs = $product->specifications->take(6);
                                @endphp
                                @foreach ($quickSpecs as $spec)
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">{{ $spec->spec_name }}:</span>
                                        <span
                                            class="font-medium text-gray-800">{{ Str::limit($spec->spec_value, 20) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 sm:gap-4 text-xs sm:text-sm text-gray-600 mb-4 sm:mb-6">
                            <span><strong>رمز المنتج:</strong> {{ $product->sku }}</span>
                            <span><strong>التصنيف:</strong>
                                <a href="{{ route('categories.show', $product->category) }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $product->category->name }}
                                </a>
                            </span>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
                            <a href="https://wa.me/970591234567?text=مرحباً، أنا مهتم بـ {{ $product->name }}"
                                target="_blank"
                                class="flex-1 bg-green-500 text-white py-2.5 sm:py-3 px-4 sm:px-6 rounded-lg font-semibold text-center hover:bg-green-600 transition text-sm sm:text-base">
                                <i class="fab fa-whatsapp ml-2"></i> اطلب عبر واتساب
                            </a>
                            <a href="tel:+970591234567"
                                class="flex-1 bg-blue-600 text-white py-2.5 sm:py-3 px-4 sm:px-6 rounded-lg font-semibold text-center hover:bg-blue-700 transition text-sm sm:text-base">
                                <i class="fas fa-phone-alt ml-2"></i> اتصل بنا
                            </a>
                        </div>

                        <p class="text-xs sm:text-sm text-gray-500 mt-3 sm:mt-4">
                            <i class="fas fa-eye ml-1"></i> {{ number_format($product->view_count) }} مشاهدة
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 sm:py-8">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="flex border-b overflow-x-auto">
                    <button
                        class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-blue-600 border-b-2 border-blue-600 tab-btn active whitespace-nowrap text-sm sm:text-base"
                        data-tab="specifications">
                        المواصفات
                    </button>
                    <button
                        class="px-4 sm:px-6 py-3 sm:py-4 font-semibold text-gray-500 hover:text-gray-700 tab-btn whitespace-nowrap text-sm sm:text-base"
                        data-tab="description">
                        الوصف
                    </button>
                </div>

                <div class="p-4 sm:p-6">
                    <div id="specifications-tab" class="tab-content">
                        @if (count($groupedSpecs) > 0)
                            <div class="space-y-4 sm:space-y-6">
                                @foreach ($groupedSpecs as $group => $specs)
                                    <div>
                                        <h3
                                            class="text-base sm:text-lg font-semibold text-gray-800 mb-2 sm:mb-3 pb-2 border-b">
                                            {{ $group }}</h3>
                                        <div class="overflow-x-auto">
                                            <table class="w-full text-sm">
                                                <tbody>
                                                    @foreach ($specs as $spec)
                                                        <tr class="border-b border-gray-100">
                                                            <td class="py-2 sm:py-3 text-gray-500 w-1/3">
                                                                {{ $spec->spec_name }}</td>
                                                            <td class="py-2 sm:py-3 text-gray-800">{{ $spec->spec_value }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 text-sm sm:text-base">لا تتوفر مواصفات لهذا المنتج.</p>
                        @endif
                    </div>

                    <div id="description-tab" class="tab-content hidden">
                        @if ($product->description)
                            <div class="prose max-w-none text-sm sm:text-base">
                                {!! nl2br(e($product->description)) !!}
                            </div>
                        @else
                            <p class="text-gray-500 text-sm sm:text-base">لا يتوفر وصف تفصيلي لهذا المنتج.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($relatedProducts->count() > 0)
        <section class="py-4 sm:py-8">
            <div class="container mx-auto px-4">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4 sm:mb-6">منتجات ذات صلة</h2>
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6">
                    @foreach ($relatedProducts as $relatedProduct)
                        @include('components.product-card', ['product' => $relatedProduct])
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

@push('scripts')
    <script>
        // Tab switching functionality
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600', 'active');
                    b.classList.add('text-gray-500');
                });

                // Add active class to clicked button
                this.classList.remove('text-gray-500');
                this.classList.add('text-blue-600', 'border-b-2', 'border-blue-600', 'active');

                // Hide all tab contents
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.add('hidden');
                });

                // Show selected tab content
                const tabName = this.getAttribute('data-tab');
                document.getElementById(tabName + '-tab').classList.remove('hidden');
            });
        });
    </script>
@endpush
