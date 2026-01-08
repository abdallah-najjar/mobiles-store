@extends('layouts.app')

@section('title', 'من نحن - موبايلات المواصي')

@section('content')
    <section class="bg-gradient-to-l from-blue-600 to-blue-800 text-white py-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">من نحن - موبايلات المواصي</h1>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto">
                وجهتك الموثوقة للهواتف الذكية عالية الجودة في غزة منذ 2024
            </p>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">قصتنا</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        تأسست موبايلات المواصي بمهمة بسيطة: توفير أحدث الهواتف الذكية وأكثرها موثوقية لأهل غزة بأسعار
                        منافسة.
                        كمتحمسين للتكنولوجيا أنفسنا، نفهم أهمية البقاء على اتصال في عالم اليوم.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        ما بدأ كمحل صغير في قلب مدينة غزة نما ليصبح اسماً موثوقاً في تجارة الموبايلات.
                        نفتخر بتقديم منتجات أصلية، نصائح خبراء، وخدمة ما بعد البيع استثنائية.
                        فريقنا شغوف بالتكنولوجيا ومكرس لمساعدتك في إيجاد الجهاز المثالي لاحتياجاتك.
                    </p>
                </div>

                <div class="bg-gradient-to-l from-green-600 to-green-700 rounded-xl p-8 mb-8 text-white">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-map-marker-alt text-4xl ml-4"></i>
                        <div>
                            <h3 class="text-2xl font-bold">موقعنا في غزة</h3>
                            <p class="opacity-90">كافتيريا كرزة ،مواصي خانيونس ، قطاع غزة، فلسطين</p>
                        </div>
                    </div>
                    <p class="text-center opacity-90">
                        نحن فخورون بخدمة مجتمعنا في غزة وتوفير أفضل الهواتف الذكية بأسعار معقولة
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">لماذا تختارنا؟</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start">
                            <div
                                class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                                <i class="fas fa-certificate text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-1">منتجات أصلية 100%</h3>
                                <p class="text-sm text-gray-600">جميع منتجاتنا من موزعين معتمدين</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                                <i class="fas fa-shield-alt text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-1">ضمان رسمي</h3>
                                <p class="text-sm text-gray-600">كل هاتف يأتي مع ضمان الشركة المصنعة</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                                <i class="fas fa-tags text-yellow-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-1">أفضل الأسعار</h3>
                                <p class="text-sm text-gray-600">أسعار منافسة مع عروض وخصومات منتظمة</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                                <i class="fas fa-headset text-red-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-1">دعم متخصص</h3>
                                <p class="text-sm text-gray-600">فريق متخصص جاهز لمساعدتك في الاختيار</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-l from-blue-600 to-blue-800 rounded-xl p-8 text-white">
                    <h2 class="text-2xl font-bold mb-4">مهمتنا</h2>
                    <p class="leading-relaxed opacity-90">
                        جعل تكنولوجيا الهواتف الذكية عالية الجودة متاحة للجميع في غزة من خلال توفير منتجات أصلية،
                        أسعار شفافة، وخدمة عملاء متميزة. نؤمن بأن الجميع يستحق الوصول إلى أدوات اتصال موثوقة،
                        ونحن ملتزمون بتحقيق ذلك.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
