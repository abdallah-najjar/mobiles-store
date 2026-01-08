

<?php $__env->startSection('title', 'العلامات التجارية'); ?>
<?php $__env->startSection('page-title', 'إدارة العلامات التجارية'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <p class="text-gray-600 text-sm sm:text-base">إدارة العلامات التجارية للمنتجات</p>
        <a href="<?php echo e(route('admin.brands.create')); ?>"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition text-sm sm:text-base w-full sm:w-auto text-center">
            <i class="fas fa-plus ml-2"></i> إضافة علامة تجارية
        </a>
    </div>

    <!-- Desktop Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden hidden sm:block">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-right text-xs font-semibold text-gray-600 uppercase">
                            العلامة التجارية</th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-right text-xs font-semibold text-gray-600 uppercase">
                            المنتجات</th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-right text-xs font-semibold text-gray-600 uppercase">
                            الحالة</th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs font-semibold text-gray-600 uppercase">
                            الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 lg:px-6 py-4">
                                <div class="flex items-center">
                                    <?php if($brand->logo): ?>
                                        <img src="<?php echo e($brand->logo); ?>" alt="<?php echo e($brand->name); ?>"
                                            class="w-10 h-10 lg:w-12 lg:h-12 rounded-lg object-contain bg-gray-100 ml-3 lg:ml-4 flex-shrink-0">
                                    <?php else: ?>
                                        <div
                                            class="w-10 h-10 lg:w-12 lg:h-12 bg-gray-100 rounded-lg flex items-center justify-center ml-3 lg:ml-4 flex-shrink-0">
                                            <i class="fas fa-building text-gray-400"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div class="min-w-0">
                                        <h4 class="font-medium text-gray-800 text-sm truncate"><?php echo e($brand->name); ?></h4>
                                        <p class="text-xs text-gray-500 truncate"><?php echo e($brand->slug); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 lg:px-6 py-4 text-gray-700 text-sm"><?php echo e($brand->products_count); ?> منتج</td>
                            <td class="px-4 lg:px-6 py-4">
                                <?php if($brand->is_active): ?>
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 bg-green-100 text-green-700 text-xs rounded-full">
                                        نشط
                                    </span>
                                <?php else: ?>
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 bg-gray-100 text-gray-700 text-xs rounded-full">
                                        غير نشط
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 lg:px-6 py-4 text-left">
                                <div class="flex items-center justify-start gap-2">
                                    <a href="<?php echo e(route('admin.brands.edit', $brand)); ?>"
                                        class="text-gray-500 hover:text-green-600 p-1" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('admin.brands.destroy', $brand)); ?>" method="POST" class="inline"
                                        onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-gray-500 hover:text-red-600 p-1" title="حذف">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-building text-4xl mb-4 block"></i>
                                لا توجد علامات تجارية
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($brands->hasPages()): ?>
            <div class="px-4 lg:px-6 py-4 border-t">
                <?php echo e($brands->links()); ?>

            </div>
        <?php endif; ?>
    </div>

    <!-- Mobile Cards -->
    <div class="sm:hidden space-y-3">
        <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-xl shadow-sm p-4">
                <div class="flex items-center gap-3">
                    <?php if($brand->logo): ?>
                        <img src="<?php echo e($brand->logo); ?>" alt="<?php echo e($brand->name); ?>"
                            class="w-14 h-14 rounded-lg object-contain bg-gray-100 flex-shrink-0">
                    <?php else: ?>
                        <div class="w-14 h-14 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-building text-gray-400 text-xl"></i>
                        </div>
                    <?php endif; ?>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-medium text-gray-800 truncate"><?php echo e($brand->name); ?></h4>
                        <p class="text-xs text-gray-500 truncate"><?php echo e($brand->slug); ?></p>
                        <div class="flex items-center gap-2 mt-2">
                            <?php if($brand->is_active): ?>
                                <span
                                    class="inline-flex items-center px-2 py-0.5 bg-green-100 text-green-700 text-xs rounded-full">
                                    نشط
                                </span>
                            <?php else: ?>
                                <span
                                    class="inline-flex items-center px-2 py-0.5 bg-gray-100 text-gray-700 text-xs rounded-full">
                                    غير نشط
                                </span>
                            <?php endif; ?>
                            <span class="text-xs text-gray-500"><?php echo e($brand->products_count); ?> منتج</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-3 mt-3 pt-3 border-t">
                    <a href="<?php echo e(route('admin.brands.edit', $brand)); ?>" class="text-gray-500 hover:text-green-600 p-2"
                        title="تعديل">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="<?php echo e(route('admin.brands.destroy', $brand)); ?>" method="POST" class="inline"
                        onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="text-gray-500 hover:text-red-600 p-2" title="حذف">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="bg-white rounded-xl shadow-sm p-8 text-center text-gray-500">
                <i class="fas fa-building text-4xl mb-4 block"></i>
                لا توجد علامات تجارية
            </div>
        <?php endif; ?>

        <?php if($brands->hasPages()): ?>
            <div class="mt-4">
                <?php echo e($brands->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\mobiles-store\resources\views/admin/brands/index.blade.php ENDPATH**/ ?>