@extends('layouts.admin')

@section('title', 'الإعدادات')
@section('page-title', 'إعدادات الموقع')

@section('content')
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b">
            <h2 class="text-lg font-semibold text-gray-800">الإعدادات العامة</h2>
            <p class="text-gray-500 text-sm mt-1">إدارة إعدادات الموقع ومعلومات التواصل</p>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf

            <div class="mb-8 pb-8 border-b">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-images text-blue-600 ml-2"></i> صور الموقع
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="site_logo" class="block text-sm font-medium text-gray-700 mb-2">شعار الموقع</label>
                        @if (isset($settings['site_logo']) && $settings['site_logo'])
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="Logo"
                                    class="w-32 h-32 object-contain border rounded-lg p-2">
                            </div>
                        @endif
                        <input type="file" id="site_logo" name="site_logo" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 mt-1">PNG, JPG, SVG - حجم أقصى 2MB</p>
                        @error('site_logo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="site_favicon" class="block text-sm font-medium text-gray-700 mb-2">أيقونة المتصفح
                            (Favicon)</label>
                        @if (isset($settings['site_favicon']) && $settings['site_favicon'])
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $settings['site_favicon']) }}" alt="Favicon"
                                    class="w-16 h-16 object-contain border rounded-lg p-2">
                            </div>
                        @endif
                        <input type="file" id="site_favicon" name="site_favicon" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 mt-1">ICO, PNG - حجم أقصى 512KB</p>
                        @error('site_favicon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="site_footer_logo" class="block text-sm font-medium text-gray-700 mb-2">شعار
                            الفوتر</label>
                        @if (isset($settings['site_footer_logo']) && $settings['site_footer_logo'])
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $settings['site_footer_logo']) }}" alt="Footer Logo"
                                    class="w-32 h-32 object-contain border rounded-lg p-2 bg-gray-800">
                            </div>
                        @endif
                        <input type="file" id="site_footer_logo" name="site_footer_logo" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 mt-1">PNG, JPG, SVG - حجم أقصى 2MB</p>
                        @error('site_footer_logo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-8 pb-8 border-b">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-info-circle text-blue-600 ml-2"></i> معلومات الموقع
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="site_name" class="block text-sm font-medium text-gray-700 mb-2">اسم الموقع</label>
                        <input type="text" id="site_name" name="site_name"
                            value="{{ old('site_name', $settings['site_name'] ?? 'موبايلات المواصي') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('site_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="site_location" class="block text-sm font-medium text-gray-700 mb-2">الموقع</label>
                        <input type="text" id="site_location" name="site_location"
                            value="{{ old('site_location', $settings['site_location'] ?? 'غزة، فلسطين') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="site_description" class="block text-sm font-medium text-gray-700 mb-2">وصف
                            الموقع</label>
                        <textarea id="site_description" name="site_description" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
                        @error('site_description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="site_keywords" class="block text-sm font-medium text-gray-700 mb-2">الكلمات المفتاحية
                            (SEO)</label>
                        <input type="text" id="site_keywords" name="site_keywords"
                            value="{{ old('site_keywords', $settings['site_keywords'] ?? '') }}"
                            placeholder="موبايلات, هواتف ذكية, غزة"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 mt-1">افصل الكلمات بفاصلة</p>
                    </div>
                </div>
            </div>

            <div class="mb-8 pb-8 border-b">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-address-book text-blue-600 ml-2"></i> معلومات التواصل
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="site_email" class="block text-sm font-medium text-gray-700 mb-2">البريد
                            الإلكتروني</label>
                        <input type="email" id="site_email" name="site_email"
                            value="{{ old('site_email', $settings['site_email'] ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('site_email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="site_phone" class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف</label>
                        <input type="text" id="site_phone" name="site_phone"
                            value="{{ old('site_phone', $settings['site_phone'] ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('site_phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="site_whatsapp" class="block text-sm font-medium text-gray-700 mb-2">واتساب</label>
                        <input type="text" id="site_whatsapp" name="site_whatsapp"
                            value="{{ old('site_whatsapp', $settings['site_whatsapp'] ?? '') }}"
                            placeholder="972599123456"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('site_whatsapp')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="site_address" class="block text-sm font-medium text-gray-700 mb-2">العنوان</label>
                        <textarea id="site_address" name="site_address" rows="2"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('site_address', $settings['site_address'] ?? '') }}</textarea>
                        @error('site_address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-8 pb-8 border-b">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-share-alt text-blue-600 ml-2"></i> روابط التواصل الاجتماعي
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="site_facebook" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-facebook text-blue-600 ml-1"></i> فيسبوك
                        </label>
                        <input type="url" id="site_facebook" name="site_facebook"
                            value="{{ old('site_facebook', $settings['site_facebook'] ?? '') }}"
                            placeholder="https://facebook.com/..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="site_instagram" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-instagram text-pink-600 ml-1"></i> انستغرام
                        </label>
                        <input type="url" id="site_instagram" name="site_instagram"
                            value="{{ old('site_instagram', $settings['site_instagram'] ?? '') }}"
                            placeholder="https://instagram.com/..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="site_twitter" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-twitter text-sky-500 ml-1"></i> تويتر
                        </label>
                        <input type="url" id="site_twitter" name="site_twitter"
                            value="{{ old('site_twitter', $settings['site_twitter'] ?? '') }}"
                            placeholder="https://twitter.com/..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="site_youtube" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-youtube text-red-600 ml-1"></i> يوتيوب
                        </label>
                        <input type="url" id="site_youtube" name="site_youtube"
                            value="{{ old('site_youtube', $settings['site_youtube'] ?? '') }}"
                            placeholder="https://youtube.com/..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-search text-blue-600 ml-2"></i> إعدادات SEO
                </h3>
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="site_meta_title" class="block text-sm font-medium text-gray-700 mb-2">عنوان الصفحة
                            (Meta Title)</label>
                        <input type="text" id="site_meta_title" name="site_meta_title"
                            value="{{ old('site_meta_title', $settings['site_meta_title'] ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 mt-1">يظهر في نتائج محركات البحث</p>
                    </div>

                    <div>
                        <label for="site_meta_description" class="block text-sm font-medium text-gray-700 mb-2">وصف الصفحة
                            (Meta Description)</label>
                        <textarea id="site_meta_description" name="site_meta_description" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('site_meta_description', $settings['site_meta_description'] ?? '') }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">يظهر في نتائج محركات البحث (160 حرف مثالي)</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-save ml-2"></i>
                    حفظ الإعدادات
                </button>
            </div>
        </form>
    </div>

    @if (session('success'))
        <div class="fixed bottom-4 left-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg" x-data="{ show: true }"
            x-show="show" x-init="setTimeout(() => show = false, 3000)">
            <i class="fas fa-check-circle ml-2"></i>
            {{ session('success') }}
        </div>
    @endif
@endsection
