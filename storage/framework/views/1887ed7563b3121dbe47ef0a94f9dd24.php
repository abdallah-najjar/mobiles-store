<?php $__env->startSection('title', $brand->name . ' - موبايلات المواصي'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <section class="bg-gradient-to-l from-gray-800 to-gray-900 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4">
                <?php if($brand->logo): ?>
                    <img src="<?php echo e($brand->logo); ?>" alt="<?php echo e($brand->name); ?>" class="h-16 bg-white rounded-lg p-2">
                <?php endif; ?>
                <div>
                    <h1 class="text-3xl font-bold"><?php echo e($brand->name); ?></h1>
                    <nav class="text-sm mt-2">
                        <a href="<?php echo e(route('home')); ?>" class="text-gray-400 hover:text-white">الرئيسية</a>
                        <span class="mx-2 text-gray-500">/</span>
                        <a href="<?php echo e(route('brands.index')); ?>" class="text-gray-400 hover:text-white">العلامات التجارية</a>
                        <span class="mx-2 text-gray-500">/</span>
                        <span><?php echo e($brand->name); ?></span>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <?php if($brand->description): ?>
        <section class="bg-white py-6 border-b">
            <div class="container mx-auto px-4">
                <p class="text-gray-600"><?php echo e($brand->description); ?></p>
            </div>
        </section>
    <?php endif; ?>

    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">
                    منتجات <?php echo e($brand->name); ?> (<?php echo e($products->total()); ?>)
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
                    <p class="text-gray-600 mb-4">لا تتوفر منتجات <?php echo e($brand->name); ?> حالياً.</p>
                    <a href="<?php echo e(route('products.index')); ?>"
                        class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        تصفح جميع المنتجات
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\mobiles-store\resources\views/brands/show.blade.php ENDPATH**/ ?>