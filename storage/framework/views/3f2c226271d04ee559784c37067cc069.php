

<?php $__env->startSection('title', 'إضافة منتج جديد'); ?>
<?php $__env->startSection('page-title', 'إضافة منتج جديد'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl">
        <form action="<?php echo e(route('admin.products.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <!-- Basic Information -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">المعلومات الأساسية</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">اسم المنتج *</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="مثال: iPhone 15 Pro Max 256GB">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">العلامة التجارية *</label>
                        <select name="brand_id" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">اختر العلامة التجارية</option>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($brand->id); ?>" <?php echo e(old('brand_id') == $brand->id ? 'selected' : ''); ?>>
                                    <?php echo e($brand->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">التصنيف *</label>
                        <select name="category_id" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">اختر التصنيف</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"
                                    <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                                    <?php echo e($category->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">الوصف المختصر</label>
                        <input type="text" name="short_description" value="<?php echo e(old('short_description')); ?>"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="وصف مختصر للمنتج">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">الوصف الكامل</label>
                        <textarea name="description" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="وصف تفصيلي للمنتج"><?php echo e(old('description')); ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Pricing & Inventory -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">السعر والمخزون</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">السعر (دولار) *</label>
                        <input type="number" name="price" value="<?php echo e(old('price')); ?>" required step="0.01"
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="0.00">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">السعر القديم (دولار)</label>
                        <input type="number" name="old_price" value="<?php echo e(old('old_price')); ?>" step="0.01" min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="0.00">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الكمية المتوفرة *</label>
                        <input type="number" name="stock_quantity" value="<?php echo e(old('stock_quantity', 0)); ?>" required
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">رمز المنتج (SKU) *</label>
                        <input type="text" name="sku" value="<?php echo e(old('sku')); ?>" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="مثال: IPH15PM-256-BLK">
                    </div>
                </div>
            </div>

            <!-- Image -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">صورة المنتج</h2>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">رابط الصورة الرئيسية</label>
                    <input type="url" name="main_image" value="<?php echo e(old('main_image')); ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                        placeholder="https://example.com/image.jpg">
                    <p class="text-sm text-gray-500 mt-1">أدخل رابط صورة المنتج</p>
                </div>
            </div>

            <!-- Specifications -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">مواصفات المنتج</h2>

                <div id="specifications-container">
                    <div class="spec-row grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                        <div>
                            <input type="text" name="specifications[0][group]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                placeholder="المجموعة (مثال: الشاشة)">
                        </div>
                        <div>
                            <input type="text" name="specifications[0][name]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                placeholder="اسم المواصفة (مثال: الحجم)">
                        </div>
                        <div>
                            <input type="text" name="specifications[0][value]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                placeholder="القيمة (مثال: 6.7 بوصة)">
                        </div>
                        <div>
                            <button type="button" onclick="removeSpecRow(this)"
                                class="text-red-500 hover:text-red-700 py-2">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="button" onclick="addSpecRow()" class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-plus ml-1"></i> إضافة مواصفة
                </button>
            </div>

            <!-- Status -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">الحالة</h2>

                <div class="flex flex-wrap gap-6">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" checked
                            class="w-5 h-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <span class="mr-2 text-gray-700">نشط (ظاهر في المتجر)</span>
                    </label>

                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1"
                            class="w-5 h-5 text-yellow-600 rounded border-gray-300 focus:ring-yellow-500">
                        <span class="mr-2 text-gray-700">منتج مميز</span>
                    </label>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex gap-4">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    <i class="fas fa-save ml-2"></i> حفظ المنتج
                </button>
                <a href="<?php echo e(route('admin.products.index')); ?>"
                    class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                    إلغاء
                </a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        let specIndex = 1;

        function addSpecRow() {
            const container = document.getElementById('specifications-container');
            const html = `
            <div class="spec-row grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div>
                    <input type="text" name="specifications[${specIndex}][group]"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           placeholder="المجموعة (مثال: الشاشة)">
                </div>
                <div>
                    <input type="text" name="specifications[${specIndex}][name]"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           placeholder="اسم المواصفة (مثال: الحجم)">
                </div>
                <div>
                    <input type="text" name="specifications[${specIndex}][value]"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           placeholder="القيمة (مثال: 6.7 بوصة)">
                </div>
                <div>
                    <button type="button" onclick="removeSpecRow(this)" class="text-red-500 hover:text-red-700 py-2">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', html);
            specIndex++;
        }

        function removeSpecRow(btn) {
            const rows = document.querySelectorAll('.spec-row');
            if (rows.length > 1) {
                btn.closest('.spec-row').remove();
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\mobiles-store\resources\views/admin/products/create.blade.php ENDPATH**/ ?>