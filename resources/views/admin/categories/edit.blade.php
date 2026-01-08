@extends('layouts.admin')

@section('title', 'تعديل التصنيف')
@section('page-title', 'تعديل: ' . $category->name)

@section('content')
    <div class="max-w-2xl">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">اسم التصنيف *</label>
                        <input type="text" name="name" value="{{ old('name', $category->name) }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الوصف</label>
                        <textarea name="description" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">{{ old('description', $category->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">صورة التصنيف</label>
                        <div id="image-preview" class="mb-3 {{ $category->image ? '' : 'hidden' }}">
                            <img src="{{ $category->image }}" alt="{{ $category->name }}"
                                class="w-24 h-24 object-cover bg-gray-100 rounded-lg">
                        </div>
                        <label
                            class="flex items-center justify-center w-full h-32 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-lg appearance-none cursor-pointer hover:border-blue-500 focus:outline-none">
                            <span class="flex flex-col items-center space-y-2">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400"></i>
                                <span class="text-sm text-gray-500">اسحب الصورة هنا أو انقر للاختيار</span>
                                <span class="text-xs text-gray-400">PNG, JPG, WEBP (حد أقصى 2MB)</span>
                            </span>
                            <input type="file" name="image_file" class="hidden" accept="image/*"
                                onchange="previewImage(this, 'image-preview')">
                        </label>
                        <div class="mt-3">
                            <p class="text-sm text-gray-500 mb-2">أو أدخل رابط الصورة:</p>
                            <input type="url" name="image" value="{{ old('image', $category->image) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                placeholder="https://example.com/image.jpg">
                        </div>
                    </div>

                    <div>
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" value="1"
                                {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                            <span class="mr-2 text-gray-700">نشط</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex gap-4">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    <i class="fas fa-save ml-2"></i> تحديث
                </button>
                <a href="{{ route('admin.categories.index') }}"
                    class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                    إلغاء
                </a>
            </div>
        </form>
    </div>

    <script>
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
    </script>
@endsection
