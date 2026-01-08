@extends('layouts.admin')

@section('title', 'إضافة منتج جديد')
@section('page-title', 'إضافة منتج جديد')

@section('content')
    <div class="max-w-4xl">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">المعلومات الأساسية</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">اسم المنتج *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="مثال: iPhone 15 Pro Max 256GB">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">العلامة التجارية *</label>
                        <select name="brand_id" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">اختر العلامة التجارية</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">التصنيف *</label>
                        <select name="category_id" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">اختر التصنيف</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">الوصف المختصر</label>
                        <input type="text" name="short_description" value="{{ old('short_description') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="وصف مختصر للمنتج">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">الوصف الكامل</label>
                        <textarea name="description" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="وصف تفصيلي للمنتج">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">السعر والمخزون</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">السعر (دولار) *</label>
                        <input type="number" name="price" value="{{ old('price') }}" required step="0.01"
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="0.00">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">السعر القديم (دولار)</label>
                        <input type="number" name="old_price" value="{{ old('old_price') }}" step="0.01" min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="0.00">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الكمية المتوفرة *</label>
                        <input type="number" name="stock_quantity" value="{{ old('stock_quantity', 0) }}" required
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">رمز المنتج (SKU) *</label>
                        <input type="text" name="sku" value="{{ old('sku') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="مثال: IPH15PM-256-BLK">
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">صورة المنتج</h2>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">الصورة الرئيسية</label>
                    <div class="mt-2">
                        <div id="main-image-preview" class="hidden mb-3">
                            <img src="" alt="معاينة الصورة" class="w-32 h-32 object-cover bg-gray-100 rounded-lg">
                        </div>
                        <label
                            class="flex items-center justify-center w-full h-40 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-lg appearance-none cursor-pointer hover:border-blue-500 focus:outline-none">
                            <span class="flex flex-col items-center space-y-2">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                                <span class="text-sm text-gray-500">اسحب الصورة هنا أو انقر للاختيار</span>
                                <span class="text-xs text-gray-400">PNG, JPG, WEBP (حد أقصى 2MB)</span>
                            </span>
                            <input type="file" name="main_image_file" class="hidden" accept="image/*"
                                onchange="previewImage(this, 'main-image-preview')">
                        </label>
                    </div>
                    <div class="mt-3">
                        <p class="text-sm text-gray-500 mb-2">أو أدخل رابط الصورة:</p>
                        <input type="url" name="main_image" value="{{ old('main_image') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="https://example.com/image.jpg">
                    </div>
                </div>
            </div>

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

            <div class="flex gap-4">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    <i class="fas fa-save ml-2"></i> حفظ المنتج
                </button>
                <a href="{{ route('admin.products.index') }}"
                    class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                    إلغاء
                </a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        let specIndex = 1;

        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            const img = preview.querySelector('img');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

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
@endpush
