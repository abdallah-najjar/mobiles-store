<?php $__env->startSection('title', 'جميع المنتجات - موبايلات المواصي'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <section class="bg-gradient-to-l from-gray-800 to-gray-900 text-white py-6 sm:py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl sm:text-3xl font-bold">جميع المنتجات</h1>
            <nav class="text-xs sm:text-sm mt-2">
                <a href="<?php echo e(route('home')); ?>" class="text-gray-400 hover:text-white">الرئيسية</a>
                <span class="mx-1 sm:mx-2 text-gray-500">/</span>
                <span>المنتجات</span>
            </nav>
        </div>
    </section>

    <section class="py-4 sm:py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-4 lg:gap-8">
                <!-- Mobile Filter Toggle -->
                <button id="filter-toggle"
                    class="lg:hidden flex items-center justify-center gap-2 bg-white rounded-lg shadow-sm p-3 text-gray-700">
                    <i class="fas fa-filter"></i>
                    <span>عرض الفلاتر</span>
                </button>

                <!-- Sidebar Filters -->
                <aside id="filters-sidebar" class="lg:w-64 flex-shrink-0 hidden lg:block">
                    <form action="<?php echo e(route('products.index')); ?>" method="GET" id="filter-form">
                        <!-- Search (hidden if from header) -->
                        <?php if(request('search')): ?>
                            <input type="hidden" name="search" value="<?php echo e(request('search')); ?>">
                        <?php endif; ?>

                        <!-- Brands Filter -->
                        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 mb-3 sm:mb-4">
                            <h3 class="font-semibold text-gray-800 mb-2 sm:mb-3 text-sm sm:text-base">العلامات التجارية</h3>
                            <div class="space-y-2 max-h-40 sm:max-h-48 overflow-y-auto">
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="brand" value="<?php echo e($brand->slug); ?>"
                                            <?php echo e(request('brand') == $brand->slug ? 'checked' : ''); ?>

                                            class="text-blue-600 focus:ring-blue-500"
                                            onchange="document.getElementById('filter-form').submit()">
                                        <span class="mr-2 text-xs sm:text-sm text-gray-700"><?php echo e($brand->name); ?></span>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php if(request('brand')): ?>
                                <a href="<?php echo e(route('products.index', request()->except('brand'))); ?>"
                                    class="text-xs sm:text-sm text-blue-600 hover:underline mt-2 block">مسح فلتر العلامة</a>
                            <?php endif; ?>
                        </div>

                        <!-- Categories Filter -->
                        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 mb-3 sm:mb-4">
                            <h3 class="font-semibold text-gray-800 mb-2 sm:mb-3 text-sm sm:text-base">التصنيفات</h3>
                            <div class="space-y-2">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="category" value="<?php echo e($category->slug); ?>"
                                            <?php echo e(request('category') == $category->slug ? 'checked' : ''); ?>

                                            class="text-blue-600 focus:ring-blue-500"
                                            onchange="document.getElementById('filter-form').submit()">
                                        <span class="mr-2 text-xs sm:text-sm text-gray-700"><?php echo e($category->name); ?></span>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php if(request('category')): ?>
                                <a href="<?php echo e(route('products.index', request()->except('category'))); ?>"
                                    class="text-xs sm:text-sm text-blue-600 hover:underline mt-2 block">مسح فلتر التصنيف</a>
                            <?php endif; ?>
                        </div>

                        <!-- Price Range -->
                        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 mb-3 sm:mb-4">
                            <h3 class="font-semibold text-gray-800 mb-2 sm:mb-3 text-sm sm:text-base">نطاق السعر</h3>
                            <div class="flex gap-2 mb-3">
                                <input type="number" name="min_price" placeholder="الحد الأدنى"
                                    value="<?php echo e(request('min_price')); ?>"
                                    class="w-full px-2 sm:px-3 py-2 border border-gray-300 rounded text-xs sm:text-sm">
                                <input type="number" name="max_price" placeholder="الحد الأقصى"
                                    value="<?php echo e(request('max_price')); ?>"
                                    class="w-full px-2 sm:px-3 py-2 border border-gray-300 rounded text-xs sm:text-sm">
                            </div>
                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 rounded text-xs sm:text-sm hover:bg-blue-700 transition">
                                تطبيق الفلتر
                            </button>
                        </div>
                    </form>

                    <!-- Reset All Filters -->
                    <?php if(request()->hasAny(['brand', 'category', 'min_price', 'max_price', 'search'])): ?>
                        <a href="<?php echo e(route('products.index')); ?>"
                            class="block text-center bg-gray-200 text-gray-700 py-2 rounded hover:bg-gray-300 transition text-sm">
                            إعادة تعيين جميع الفلاتر
                        </a>
                    <?php endif; ?>
                </aside>

                <!-- Products Grid -->
                <div class="flex-1">
                    <!-- Sort and Results Info -->
                    <div
                        class="bg-white rounded-lg shadow-sm p-3 sm:p-4 mb-4 sm:mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-4">
                        <p class="text-gray-600 text-sm">
                            عرض <span class="font-medium"><?php echo e($products->count()); ?></span> من
                            <span class="font-medium"><?php echo e($products->total()); ?></span> منتج
                        </p>
                        <div class="flex items-center gap-2 sm:gap-3 w-full sm:w-auto">
                            <label class="text-xs sm:text-sm text-gray-600 whitespace-nowrap">ترتيب:</label>
                            <select name="sort"
                                onchange="window.location.href = '<?php echo e(route('products.index')); ?>?' + new URLSearchParams({...Object.fromEntries(new URLSearchParams(window.location.search)), sort: this.value}).toString()"
                                class="flex-1 sm:flex-none border border-gray-300 rounded px-2 sm:px-3 py-2 text-xs sm:text-sm focus:outline-none focus:border-blue-500">
                                <option value="latest" <?php echo e(request('sort') == 'latest' ? 'selected' : ''); ?>>الأحدث</option>
                                <option value="price_low" <?php echo e(request('sort') == 'price_low' ? 'selected' : ''); ?>>السعر:
                                    الأقل</option>
                                <option value="price_high" <?php echo e(request('sort') == 'price_high' ? 'selected' : ''); ?>>السعر:
                                    الأعلى</option>
                                <option value="name" <?php echo e(request('sort') == 'name' ? 'selected' : ''); ?>>الاسم</option>
                                <option value="popular" <?php echo e(request('sort') == 'popular' ? 'selected' : ''); ?>>الأكثر شعبية
                                </option>
                            </select>
                        </div>
                    </div>

                    <?php if(request('search')): ?>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 sm:p-4 mb-4 sm:mb-6">
                            <p class="text-blue-800 text-sm">
                                نتائج البحث عن: <strong>"<?php echo e(request('search')); ?>"</strong>
                                <a href="<?php echo e(route('products.index')); ?>" class="mr-2 text-blue-600 hover:underline">مسح</a>
                            </p>
                        </div>
                    <?php endif; ?>

                    <?php if($products->count() > 0): ?>
                        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('components.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6 sm:mt-8">
                            <?php echo e($products->links()); ?>

                        </div>
                    <?php else: ?>
                        <div class="bg-white rounded-lg shadow-sm p-8 sm:p-12 text-center">
                            <i class="fas fa-search text-4xl sm:text-5xl text-gray-300 mb-4"></i>
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">لا توجد منتجات</h3>
                            <p class="text-gray-600 mb-4 text-sm sm:text-base">حاول تعديل الفلاتر أو كلمات البحث</p>
                            <a href="<?php echo e(route('products.index')); ?>"
                                class="inline-block bg-blue-600 text-white px-4 sm:px-6 py-2 rounded hover:bg-blue-700 transition text-sm sm:text-base">
                                عرض جميع المنتجات
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\mobiles-store\resources\views/products/index.blade.php ENDPATH**/ ?>