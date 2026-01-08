<article class="product-card bg-white rounded-xl shadow-sm overflow-hidden h-full flex flex-col">
    <a href="<?php echo e(route('products.show', $product)); ?>" class="block flex-1 flex flex-col">
        <div class="relative">
            <?php if($product->main_image): ?>
                <img src="<?php echo e($product->main_image); ?>" alt="<?php echo e($product->name); ?>"
                    class="w-full h-40 sm:h-48 lg:h-56 object-cover">
            <?php else: ?>
                <div class="w-full h-40 sm:h-48 lg:h-56 bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-mobile-alt text-4xl sm:text-5xl text-gray-300"></i>
                </div>
            <?php endif; ?>

            <?php if($product->discount_percentage): ?>
                <span
                    class="absolute top-2 sm:top-3 right-2 sm:right-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                    خصم <?php echo e($product->discount_percentage); ?>%
                </span>
            <?php endif; ?>

            <?php if($product->is_featured): ?>
                <span
                    class="absolute top-2 sm:top-3 left-2 sm:left-3 bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded">
                    <i class="fas fa-star"></i> <span class="hidden sm:inline">مميز</span>
                </span>
            <?php endif; ?>
        </div>

        <div class="p-3 sm:p-4 flex-1 flex flex-col">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs text-blue-600 font-medium uppercase truncate"><?php echo e($product->brand->name); ?></span>
                <?php if($product->isInStock()): ?>
                    <span class="text-xs text-green-600 whitespace-nowrap"><i class="fas fa-check-circle"></i> <span
                            class="hidden sm:inline">متوفر</span></span>
                <?php else: ?>
                    <span class="text-xs text-red-600 whitespace-nowrap"><i class="fas fa-times-circle"></i> <span
                            class="hidden sm:inline">غير متوفر</span></span>
                <?php endif; ?>
            </div>

            <h3 class="font-semibold text-gray-800 mb-2 line-clamp-2 text-sm sm:text-base flex-1"><?php echo e($product->name); ?>

            </h3>

            <?php if($product->short_description): ?>
                <p class="text-xs sm:text-sm text-gray-500 mb-3 line-clamp-2 hidden sm:block">
                    <?php echo e($product->short_description); ?></p>
            <?php endif; ?>

            <div class="flex items-center justify-between mt-auto">
                <div class="flex flex-col sm:flex-row sm:items-center gap-1">
                    <span
                        class="text-base sm:text-lg font-bold text-blue-600">$<?php echo e(number_format($product->price, 2)); ?></span>
                    <?php if($product->old_price): ?>
                        <span
                            class="text-xs sm:text-sm text-gray-400 line-through">$<?php echo e(number_format($product->old_price, 2)); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </a>
</article>
<?php /**PATH C:\laragon\www\mobiles-store\resources\views/components/product-card.blade.php ENDPATH**/ ?>