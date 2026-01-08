

<?php $__env->startSection('title', 'إضافة علامة تجارية'); ?>
<?php $__env->startSection('page-title', 'إضافة علامة تجارية جديدة'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-2xl">
        <form action="<?php echo e(route('admin.brands.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">اسم العلامة التجارية *</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="مثال: Samsung">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الوصف</label>
                        <textarea name="description" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="وصف العلامة التجارية"><?php echo e(old('description')); ?></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">رابط الشعار</label>
                        <input type="url" name="logo" value="<?php echo e(old('logo')); ?>"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="https://example.com/logo.png">
                    </div>

                    <div>
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" checked
                                class="w-5 h-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                            <span class="mr-2 text-gray-700">نشط</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex gap-4">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    <i class="fas fa-save ml-2"></i> حفظ
                </button>
                <a href="<?php echo e(route('admin.brands.index')); ?>"
                    class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                    إلغاء
                </a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\mobiles-store\resources\views/admin/brands/create.blade.php ENDPATH**/ ?>