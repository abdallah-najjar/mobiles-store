@extends('layouts.app')

@section('title', 'اتصل بنا - موبايلات المواصي')

@section('content')
    <section class="bg-gradient-to-l from-gray-800 to-gray-900 text-white py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold">اتصل بنا</h1>
            <nav class="text-sm mt-2">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white">الرئيسية</a>
                <span class="mx-2 text-gray-500">/</span>
                <span>اتصل بنا</span>
            </nav>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-6">تواصل معنا</h2>

                            <div class="space-y-6">
                                <div class="flex items-start">
                                    <div
                                        class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                                        <i class="fas fa-map-marker-alt text-blue-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-1">العنوان</h3>
                                        <p class="text-gray-600 text-sm">
                                            شارع عمر المختار<br>
                                            مدينة غزة، فلسطين
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div
                                        class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                                        <i class="fas fa-phone-alt text-green-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-1">الهاتف</h3>
                                        <p class="text-gray-600 text-sm" dir="ltr">+970 59 123 4567</p>
                                        <p class="text-gray-600 text-sm" dir="ltr">+970 59 765 4321</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div
                                        class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                                        <i class="fas fa-envelope text-yellow-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-1">البريد الإلكتروني</h3>
                                        <p class="text-gray-600 text-sm">info@beach-mobiles.ps</p>
                                        <p class="text-gray-600 text-sm">sales@beach-mobiles.ps</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div
                                        class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                                        <i class="fas fa-clock text-purple-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-1">ساعات العمل</h3>
                                        <p class="text-gray-600 text-sm">السبت - الخميس: 9 صباحاً - 9 مساءً</p>
                                        <p class="text-gray-600 text-sm">الجمعة: مغلق</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <h3 class="font-semibold text-gray-800 mb-4">تابعنا</h3>
                            <div class="flex space-x-4 space-x-reverse">
                                <a href="#"
                                    class="w-10 h-10 bg-blue-600 text-white rounded-lg flex items-center justify-center hover:bg-blue-700 transition">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 bg-pink-600 text-white rounded-lg flex items-center justify-center hover:bg-pink-700 transition">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 bg-green-500 text-white rounded-lg flex items-center justify-center hover:bg-green-600 transition">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 bg-red-600 text-white rounded-lg flex items-center justify-center hover:bg-red-700 transition">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-6">أرسل لنا رسالة</h2>

                            @if (session('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                                    <ul class="list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">الاسم الكامل *</label>
                                        <input type="text" name="name" value="{{ old('name') }}" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني
                                            *</label>
                                        <input type="email" name="email" value="{{ old('email') }}" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف</label>
                                        <input type="tel" name="phone" value="{{ old('phone') }}"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">الموضوع *</label>
                                        <select name="subject" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                                            <option value="">اختر موضوعاً</option>
                                            <option value="استفسار عن منتج"
                                                {{ old('subject') == 'استفسار عن منتج' ? 'selected' : '' }}>استفسار عن منتج
                                            </option>
                                            <option value="حالة الطلب"
                                                {{ old('subject') == 'حالة الطلب' ? 'selected' : '' }}>حالة الطلب</option>
                                            <option value="الدعم الفني"
                                                {{ old('subject') == 'الدعم الفني' ? 'selected' : '' }}>الدعم الفني</option>
                                            <option value="أخرى" {{ old('subject') == 'أخرى' ? 'selected' : '' }}>أخرى
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">الرسالة *</label>
                                    <textarea name="message" rows="5" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                        placeholder="كيف يمكننا مساعدتك؟">{{ old('message') }}</textarea>
                                </div>

                                <button type="submit"
                                    class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                                    <i class="fas fa-paper-plane ml-2"></i> إرسال الرسالة
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-8 bg-gradient-to-l from-green-500 to-green-600 rounded-xl p-8 text-white text-center">
                    <h3 class="text-2xl font-bold mb-3">تحتاج مساعدة سريعة؟</h3>
                    <p class="mb-6 opacity-90">تواصل معنا مباشرة عبر واتساب للدعم الفوري</p>
                    <a href="https://wa.me/970591234567" target="_blank"
                        class="inline-block bg-white text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        <i class="fab fa-whatsapp ml-2"></i> تواصل عبر واتساب
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
