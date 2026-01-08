

<?php $__env->startSection('title', 'المنتجات'); ?>
<?php $__env->startSection('page-title', 'إدارة المنتجات'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <p class="text-gray-600 text-sm sm:text-base">إدارة مخزون المنتجات</p>
        </div>
        <a href="<?php echo e(route('admin.products.create')); ?>"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition text-sm sm:text-base w-full sm:w-auto text-center">
            <i class="fas fa-plus ml-2"></i> إضافة منتج جديد
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
        <form action="<?php echo e(route('admin.products.index')); ?>" method="GET"
            class="space-y-3 sm:space-y-0 sm:flex sm:flex-wrap sm:gap-3 lg:gap-4">
            <div class="flex-1 min-w-0 sm:min-w-[180px] lg:min-w-[200px]">
                <input type="text" name="search" placeholder="البحث في المنتجات..." value="<?php echo e(request('search')); ?>"
                    class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-sm">
            </div>
            <select name="brand"
                class="w-full sm:w-auto px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-sm">
                <option value="">كل العلامات</option>
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($brand->id); ?>" <?php echo e(request('brand') == $brand->id ? 'selected' : ''); ?>>
                        <?php echo e($brand->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <select name="category"
                class="w-full sm:w-auto px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-sm">
                <option value="">كل التصنيفات</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php echo e(request('category') == $category->id ? 'selected' : ''); ?>>
                        <?php echo e($category->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div class="flex gap-2 w-full sm:w-auto">
                <button type="submit"
                    class="flex-1 sm:flex-none bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-900 transition text-sm">
                    <i class="fas fa-search ml-1 sm:ml-2"></i> بحث
                </button>
                <?php if(request()->hasAny(['search', 'brand', 'category'])): ?>
                    <a href="<?php echo e(route('admin.products.index')); ?>"
                        class="text-gray-600 px-3 py-2 hover:text-gray-800 text-sm flex items-center">
                        <i class="fas fa-times ml-1"></i> <span class="hidden sm:inline">مسح</span>
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Products Table (Desktop) -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden hidden lg:block">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-right text-xs font-semibold text-gray-600 uppercase">
                            المنتج</th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-right text-xs font-semibold text-gray-600 uppercase">
                            العلامة</th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-right text-xs font-semibold text-gray-600 uppercase">
                            التصنيف</th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-right text-xs font-semibold text-gray-600 uppercase">السعر
                        </th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-right text-xs font-semibold text-gray-600 uppercase">
                            المخزون</th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-right text-xs font-semibold text-gray-600 uppercase">
                            الحالة</th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs font-semibold text-gray-600 uppercase">
                            الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 lg:px-6 py-4">
                                <div class="flex items-center">
                                    <?php if($product->main_image): ?>
                                        <img src="<?php echo e($product->main_image); ?>" alt="<?php echo e($product->name); ?>"
                                            class="w-10 h-10 lg:w-12 lg:h-12 rounded-lg object-cover ml-3 lg:ml-4 flex-shrink-0">
                                    <?php else: ?>
                                        <div
                                            class="w-10 h-10 lg:w-12 lg:h-12 bg-gray-100 rounded-lg flex items-center justify-center ml-3 lg:ml-4 flex-shrink-0">
                                            <i class="fas fa-mobile-alt text-gray-400"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div class="min-w-0">
                                        <h4 class="font-medium text-gray-800 text-sm truncate">
                                            <?php echo e(Str::limit($product->name, 35)); ?></h4>
                                        <p class="text-xs text-gray-500">SKU: <?php echo e($product->sku); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 lg:px-6 py-4 text-gray-700 text-sm"><?php echo e($product->brand->name); ?></td>
                            <td class="px-4 lg:px-6 py-4 text-gray-700 text-sm"><?php echo e($product->category->name); ?></td>
                            <td class="px-4 lg:px-6 py-4">
                                <span
                                    class="font-semibold text-blue-600 text-sm">$<?php echo e(number_format($product->price, 2)); ?></span>
                                <?php if($product->old_price): ?>
                                    <span
                                        class="text-gray-400 text-xs line-through block">$<?php echo e(number_format($product->old_price, 2)); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 lg:px-6 py-4 text-sm">
                                <?php if($product->stock_quantity > 10): ?>
                                    <span class="text-green-600"><?php echo e($product->stock_quantity); ?></span>
                                <?php elseif($product->stock_quantity > 0): ?>
                                    <span class="text-yellow-600"><?php echo e($product->stock_quantity); ?></span>
                                <?php else: ?>
                                    <span class="text-red-600 text-xs">نفذت</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 lg:px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    <?php if($product->is_active): ?>
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 bg-green-100 text-green-700 text-xs rounded-full">
                                            <i class="fas fa-check-circle ml-1"></i> نشط
                                        </span>
                                    <?php else: ?>
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 bg-gray-100 text-gray-700 text-xs rounded-full">
                                            <i class="fas fa-times-circle ml-1"></i> غير نشط
                                        </span>
                                    <?php endif; ?>
                                    <?php if($product->is_featured): ?>
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 bg-yellow-100 text-yellow-700 text-xs rounded-full">
                                            <i class="fas fa-star ml-1"></i> مميز
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-4 lg:px-6 py-4 text-left">
                                <div class="flex items-center justify-start gap-2">
                                    <a href="<?php echo e(route('products.show', $product)); ?>" target="_blank"
                                        class="text-gray-500 hover:text-blue-600 p-1" title="عرض">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?php echo e(route('admin.products.edit', $product)); ?>"
                                        class="text-gray-500 hover:text-green-600 p-1" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" method="POST"
                                        class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">
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
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-box-open text-4xl mb-4 block"></i>
                                لا توجد منتجات
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($products->hasPages()): ?>
            <div class="px-4 lg:px-6 py-4 border-t">
                <?php echo e($products->links()); ?>

            </div>
        <?php endif; ?>
    </div>

    <!-- Products Cards (Mobile & Tablet) -->
    <div class="lg:hidden space-y-3">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-xl shadow-sm p-4">
                <div class="flex items-start gap-3">
                    <?php if($product->main_image): ?>
                        <img src="<?php echo e($product->main_image); ?>" alt="<?php echo e($product->name); ?>"
                            class="w-16 h-16 sm:w-20 sm:h-20 rounded-lg object-cover flex-shrink-0">
                    <?php else: ?>
                        <div
                            class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-mobile-alt text-gray-400 text-xl"></i>
                        </div>
                    <?php endif; ?>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-medium text-gray-800 text-sm sm:text-base truncate"><?php echo e($product->name); ?></h4>
                        <p class="text-xs text-gray-500 mt-0.5"><?php echo e($product->brand->name); ?> •
                            <?php echo e($product->category->name); ?></p>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="font-bold text-blue-600">$<?php echo e(number_format($product->price, 2)); ?></span>
                            <?php if($product->old_price): ?>
                                <span
                                    class="text-gray-400 text-xs line-through">$<?php echo e(number_format($product->old_price, 2)); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="flex items-center gap-2 mt-2">
                            <?php if($product->is_active): ?>
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
                            <?php if($product->is_featured): ?>
                                <span
                                    class="inline-flex items-center px-2 py-0.5 bg-yellow-100 text-yellow-700 text-xs rounded-full">
                                    <i class="fas fa-star ml-1"></i> مميز
                                </span>
                            <?php endif; ?>
                            <?php if($product->stock_quantity > 0): ?>
                                <span
                                    class="text-xs <?php echo e($product->stock_quantity > 10 ? 'text-green-600' : 'text-yellow-600'); ?>">
                                    المخزون: <?php echo e($product->stock_quantity); ?>

                                </span>
                            <?php else: ?>
                                <span class="text-xs text-red-600">نفذت الكمية</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-3 mt-3 pt-3 border-t">
                    <a href="<?php echo e(route('products.show', $product)); ?>" target="_blank"
                        class="text-gray-500 hover:text-blue-600 p-2" title="عرض">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?php echo e(route('admin.products.edit', $product)); ?>" class="text-gray-500 hover:text-green-600 p-2"
                        title="تعديل">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" method="POST" class="inline"
                        onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">
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
                <i class="fas fa-box-open text-4xl mb-4 block"></i>
                لا توجد منتجات
            </div>
        <?php endif; ?>

        <?php if($products->hasPages()): ?>
            <div class="mt-4">
                <?php echo e($products->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\mobiles-store\resources\views/admin/products/index.blade.php ENDPATH**/ ?>