<article class="product-card bg-white rounded-xl shadow-sm overflow-hidden h-full flex flex-col">
    <a href="{{ route('products.show', $product) }}" class="block flex-1 flex flex-col">
        <div class="relative">
            @if ($product->main_image)
                <img src="{{ $product->main_image }}" alt="{{ $product->name }}"
                    class="w-full h-40 sm:h-48 lg:h-56 object-cover">
            @else
                <div class="w-full h-40 sm:h-48 lg:h-56 bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-mobile-alt text-4xl sm:text-5xl text-gray-300"></i>
                </div>
            @endif

            @if ($product->discount_percentage)
                <span
                    class="absolute top-2 sm:top-3 right-2 sm:right-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                    خصم {{ $product->discount_percentage }}%
                </span>
            @endif

            @if ($product->is_featured)
                <span
                    class="absolute top-2 sm:top-3 left-2 sm:left-3 bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded">
                    <i class="fas fa-star"></i> <span class="hidden sm:inline">مميز</span>
                </span>
            @endif
        </div>

        <div class="p-3 sm:p-4 flex-1 flex flex-col">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs text-blue-600 font-medium uppercase truncate">{{ $product->brand->name }}</span>
                @if ($product->isInStock())
                    <span class="text-xs text-green-600 whitespace-nowrap"><i class="fas fa-check-circle"></i> <span
                            class="hidden sm:inline">متوفر</span></span>
                @else
                    <span class="text-xs text-red-600 whitespace-nowrap"><i class="fas fa-times-circle"></i> <span
                            class="hidden sm:inline">غير متوفر</span></span>
                @endif
            </div>

            <h3 class="font-semibold text-gray-800 mb-2 line-clamp-2 text-sm sm:text-base flex-1">{{ $product->name }}
            </h3>

            @if ($product->short_description)
                <p class="text-xs sm:text-sm text-gray-500 mb-3 line-clamp-2 hidden sm:block">
                    {{ $product->short_description }}</p>
            @endif

            <div class="flex items-center justify-between mt-auto">
                <div class="flex flex-col sm:flex-row sm:items-center gap-1">
                    <span
                        class="text-base sm:text-lg font-bold text-blue-600">${{ number_format($product->price, 2) }}</span>
                    @if ($product->old_price)
                        <span
                            class="text-xs sm:text-sm text-gray-400 line-through">${{ number_format($product->old_price, 2) }}</span>
                    @endif
                </div>
            </div>
        </div>
    </a>
</article>
