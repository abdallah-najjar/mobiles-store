<?php $__env->startSection('title', $category->name . ' - موبايلات المواصي'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <section class="bg-gradient-to-l from-gray-800 to-gray-900 text-white py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold"><?php echo e($category->name); ?></h1>
            <nav class="text-sm mt-2">
                <a href="<?php echo e(route('home')); ?>" class="text-gray-400 hover:text-white">الرئيسية</a>
                <span class="mx-2 text-gray-500">/</span>
                <a href="<?php echo e(route('categories.index')); ?>" class="text-gray-400 hover:text-white">التصنيفات</a>
                <span class="mx-2 text-gray-500">/</span>
                <?php if($category->parent): ?>
                    <a href="<?php echo e(route('categories.show', $category->parent)); ?>" class="text-gray-400 hover:text-white">
                        <?php echo e($category->parent->name); ?>

                    </a>
                    <span class="mx-2 text-gray-500">/</span>
                <?php endif; ?>
                <span><?php echo e($category->name); ?></span>
            </nav>
        </div>
    </section>

    <?php if($category->description): ?>
        <section class="bg-white py-6 border-b">
            <div class="container mx-auto px-4">
                <p class="text-gray-600"><?php echo e($category->description); ?></p>
            </div>
        </section>
    <?php endif; ?>

    <!-- Subcategories -->
    <?php if($subcategories->count() > 0): ?>
        <section class="py-6 bg-gray-50">
            <div class="container mx-auto px-4">
                <h3 class="font-semibold text-gray-800 mb-4">التصنيفات الفرعية</h3>
                <div class="flex flex-wrap gap-3">
                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('categories.show', $subcategory)); ?>"
                            class="bg-white px-4 py-2 rounded-lg shadow-sm hover:shadow-md transition text-gray-700 hover:text-blue-600">
                            <?php echo e($subcategory->name); ?>

                            <span class="text-gray-400 text-sm">(<?php echo e($subcategory->products()->active()->count()); ?>)</span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">
                    <?php echo e($category->name); ?> (<?php echo e($products->total()); ?> منتج)
                </h2>
            </div>

            <?php if($products->count() > 0): ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('components.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-8">
                    <?php echo e($products->links()); ?>

                </div>
            <?php else: ?>
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <i class="fas fa-mobile-alt text-5xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">لا توجد منتجات</h3>
                    <p class="text-gray-600 mb-4">لا توجد منتجات في هذا التصنيف حتى الآن.</p>
                    <a href="<?php echo e(route('products.index')); ?>"
                        class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        تصفح جميع المنتجات
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\mobiles-store\resources\views/categories/show.blade.php ENDPATH**/ ?>