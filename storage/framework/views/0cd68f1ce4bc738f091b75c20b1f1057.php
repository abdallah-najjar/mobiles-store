<?php $__env->startSection('title', 'التصنيفات - موبايلات المواصي'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <section class="bg-gradient-to-l from-gray-800 to-gray-900 text-white py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold">التصنيفات</h1>
            <nav class="text-sm mt-2">
                <a href="<?php echo e(route('home')); ?>" class="text-gray-400 hover:text-white">الرئيسية</a>
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

            <?php if($categories->count() > 0): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('categories.show', $category)); ?>"
                            class="relative rounded-xl overflow-hidden group h-64 block">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-purple-700"></div>
                            <?php if($category->image): ?>
                                <img src="<?php echo e($category->image); ?>" alt="<?php echo e($category->name); ?>"
                                    class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-60">
                            <?php endif; ?>
                            <div class="relative z-10 h-full flex flex-col justify-between p-6 text-white">
                                <div>
                                    <h3 class="text-2xl font-bold mb-2"><?php echo e($category->name); ?></h3>
                                    <?php if($category->description): ?>
                                        <p class="text-sm opacity-90 line-clamp-2"><?php echo e($category->description); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm opacity-90"><?php echo e($category->active_products_count); ?> منتج</span>
                                    <span
                                        class="bg-white/20 px-3 py-1 rounded-full text-sm group-hover:bg-white group-hover:text-blue-600 transition">
                                        عرض الكل <i class="fas fa-arrow-left mr-1"></i>
                                    </span>
                                </div>
                            </div>
                        </a>

                        <!-- Subcategories -->
                        <?php if($category->children->count() > 0): ?>
                            <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('categories.show', $child)); ?>"
                                    class="bg-white rounded-xl shadow-sm p-6 hover:shadow-lg transition group">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <span class="text-xs text-blue-600 font-medium"><?php echo e($category->name); ?></span>
                                            <h4
                                                class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition">
                                                <?php echo e($child->name); ?>

                                            </h4>
                                            <p class="text-sm text-gray-500"><?php echo e($child->active_products_count); ?> منتج</p>
                                        </div>
                                        <i
                                            class="fas fa-chevron-left text-gray-400 group-hover:text-blue-600 transition"></i>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <i class="fas fa-folder-open text-5xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">لا توجد تصنيفات</h3>
                    <p class="text-gray-600">تحقق قريباً من مجموعة التصنيفات لدينا.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\mobiles-store\resources\views/categories/index.blade.php ENDPATH**/ ?>