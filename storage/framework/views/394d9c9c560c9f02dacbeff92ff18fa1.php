<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="<?php echo e(setting('site_meta_description', 'موبايلات المواصي - وجهتك الموثوقة لأحدث الهواتف الذكية وملحقاتها في غزة')); ?>">
    <meta name="keywords" content="<?php echo e(setting('site_keywords', 'موبايلات, هواتف ذكية, غزة, فلسطين')); ?>">
    <?php if(setting('site_favicon')): ?>
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('storage/' . setting('site_favicon'))); ?>">
    <?php endif; ?>
    <title><?php echo $__env->yieldContent('title', setting('site_meta_title', 'موبايلات المواصي - غزة')); ?></title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts - Arabic -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .product-card {
            transition: all 0.3s ease;
        }

        /* Line clamp utility */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Mobile menu animation */
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        #mobile-menu.open {
            max-height: 500px;
        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Top Bar -->
    <div class="bg-gray-900 text-gray-300 text-xs sm:text-sm py-2">
        <div class="container mx-auto px-4 flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center space-x-2 sm:space-x-4 space-x-reverse">
                <?php if(setting('site_phone')): ?>
                    <a href="tel:<?php echo e(setting('site_phone')); ?>" class="hover:text-white">
                        <i class="fas fa-phone-alt ml-1 sm:ml-2"></i>
                        <span class="hidden xs:inline"><?php echo e(setting('site_phone')); ?></span>
                    </a>
                <?php endif; ?>
                <?php if(setting('site_email')): ?>
                    <a href="mailto:<?php echo e(setting('site_email')); ?>" class="hidden md:inline hover:text-white">
                        <i class="fas fa-envelope ml-2"></i> <?php echo e(setting('site_email')); ?>

                    </a>
                <?php endif; ?>
            </div>
            <div class="flex items-center space-x-3 sm:space-x-4 space-x-reverse">
                <?php if(setting('site_location')): ?>
                    <span class="text-yellow-400 text-xs sm:text-sm">
                        <i class="fas fa-map-marker-alt ml-1"></i>
                        <span class="hidden sm:inline"><?php echo e(setting('site_location')); ?></span>
                    </span>
                <?php endif; ?>
                <div class="flex items-center space-x-2 space-x-reverse">
                    <?php if(setting('site_facebook')): ?>
                        <a href="<?php echo e(setting('site_facebook')); ?>" target="_blank" class="hover:text-white p-1"><i
                                class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if(setting('site_instagram')): ?>
                        <a href="<?php echo e(setting('site_instagram')); ?>" target="_blank" class="hover:text-white p-1"><i
                                class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if(setting('site_whatsapp')): ?>
                        <a href="https://wa.me/<?php echo e(setting('site_whatsapp')); ?>" target="_blank"
                            class="hover:text-white p-1"><i class="fab fa-whatsapp"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-3 sm:py-4">
                <!-- Logo -->
                <a href="<?php echo e(route('home')); ?>" class="flex items-center space-x-2 space-x-reverse flex-shrink-0">
                    <?php if(setting('site_logo')): ?>
                        <img src="<?php echo e(asset('storage/' . setting('site_logo'))); ?>" alt="<?php echo e(setting('site_name')); ?>"
                            class="h-10 sm:h-12 w-auto">
                    <?php else: ?>
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-mobile-alt text-white text-lg sm:text-xl"></i>
                        </div>
                    <?php endif; ?>
                    <div class="flex flex-col">
                        <span
                            class="text-base sm:text-xl font-bold text-gray-800"><?php echo e(setting('site_name', 'موبايلات المواصي')); ?></span>
                        <?php if(setting('site_location')): ?>
                            <span class="text-xs text-gray-500 hidden sm:inline"><?php echo e(setting('site_location')); ?></span>
                        <?php endif; ?>
                    </div>
                </a>

                <!-- Search Bar -->
                <div class="hidden md:flex flex-1 max-w-md lg:max-w-xl mx-4 lg:mx-8">
                    <form action="<?php echo e(route('products.index')); ?>" method="GET" class="w-full">
                        <div class="relative">
                            <input type="text" name="search" placeholder="ابحث عن الهواتف المحمولة..."
                                value="<?php echo e(request('search')); ?>"
                                class="w-full pr-4 pl-12 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-sm">
                            <button type="submit"
                                class="absolute left-0 top-0 h-full px-4 text-gray-500 hover:text-blue-600">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Navigation -->
                <nav class="hidden lg:flex items-center space-x-4 xl:space-x-6 space-x-reverse">
                    <a href="<?php echo e(route('home')); ?>"
                        class="text-gray-700 hover:text-blue-600 font-medium text-sm xl:text-base whitespace-nowrap xl:pl-6">الرئيسية</a>
                    <a href="<?php echo e(route('products.index')); ?>"
                        class="text-gray-700 hover:text-blue-600 font-medium text-sm xl:text-base whitespace-nowrap">المنتجات</a>
                    <a href="<?php echo e(route('brands.index')); ?>"
                        class="text-gray-700 hover:text-blue-600 font-medium text-sm xl:text-base whitespace-nowrap">العلامات
                        التجارية</a>
                    <a href="<?php echo e(route('categories.index')); ?>"
                        class="text-gray-700 hover:text-blue-600 font-medium text-sm xl:text-base whitespace-nowrap">التصنيفات</a>
                    <a href="<?php echo e(route('contact')); ?>"
                        class="text-gray-700 hover:text-blue-600 font-medium text-sm xl:text-base whitespace-nowrap">اتصل
                        بنا</a>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="lg:hidden text-gray-700 p-2 -ml-2" id="mobile-menu-btn" aria-label="قائمة التنقل">
                    <i class="fas fa-bars text-xl sm:text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="lg:hidden bg-white border-t" id="mobile-menu">
            <div class="container mx-auto px-4 py-4">
                <!-- Mobile Search -->
                <form action="<?php echo e(route('products.index')); ?>" method="GET" class="mb-4">
                    <div class="relative">
                        <input type="text" name="search" placeholder="بحث..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg text-base">
                        <button type="submit" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <nav class="flex flex-col space-y-1">
                    <a href="<?php echo e(route('home')); ?>"
                        class="text-gray-700 hover:text-blue-600 hover:bg-gray-50 py-3 px-2 rounded-lg transition">الرئيسية</a>
                    <a href="<?php echo e(route('products.index')); ?>"
                        class="text-gray-700 hover:text-blue-600 hover:bg-gray-50 py-3 px-2 rounded-lg transition">المنتجات</a>
                    <a href="<?php echo e(route('brands.index')); ?>"
                        class="text-gray-700 hover:text-blue-600 hover:bg-gray-50 py-3 px-2 rounded-lg transition">العلامات
                        التجارية</a>
                    <a href="<?php echo e(route('categories.index')); ?>"
                        class="text-gray-700 hover:text-blue-600 hover:bg-gray-50 py-3 px-2 rounded-lg transition">التصنيفات</a>
                    <a href="<?php echo e(route('contact')); ?>"
                        class="text-gray-700 hover:text-blue-600 hover:bg-gray-50 py-3 px-2 rounded-lg transition">اتصل
                        بنا</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 mt-8 sm:mt-12">
        <div class="container mx-auto px-4 py-8 sm:py-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                <!-- About -->
                <div class="sm:col-span-2 lg:col-span-1">
                    <div class="flex items-center space-x-2 space-x-reverse mb-4">
                        <?php if(setting('site_footer_logo')): ?>
                            <img src="<?php echo e(asset('storage/' . setting('site_footer_logo'))); ?>"
                                alt="<?php echo e(setting('site_name')); ?>" class="h-10 sm:h-12 w-auto">
                        <?php else: ?>
                            <div
                                class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-mobile-alt text-white text-lg sm:text-xl"></i>
                            </div>
                        <?php endif; ?>
                        <span
                            class="text-lg sm:text-xl font-bold text-white"><?php echo e(setting('site_name', 'موبايلات المواصي')); ?></span>
                    </div>
                    <p class="text-sm leading-relaxed">
                        <?php echo e(setting('site_description', 'وجهتك الموثوقة لأحدث الهواتف الذكية وملحقاتها في غزة. منتجات أصلية بأسعار منافسة وخدمة ما بعد البيع ممتازة.')); ?>

                    </p>
                    <?php if(setting('site_address')): ?>
                        <div class="mt-4 bg-gray-800 rounded-lg p-3">
                            <p class="text-yellow-400 text-sm font-semibold">
                                <i class="fas fa-map-marker-alt ml-1"></i> موقعنا في
                                <?php echo e(setting('site_location', 'غزة')); ?>

                            </p>
                            <p class="text-gray-400 text-xs mt-1"><?php echo e(setting('site_address')); ?></p>
                        </div>
                    <?php endif; ?>

                    <!-- Social Media - Mobile -->
                    <?php if(setting('site_facebook') || setting('site_instagram') || setting('site_whatsapp')): ?>
                        <div class="flex items-center space-x-4 space-x-reverse mt-4 lg:hidden">
                            <?php if(setting('site_facebook')): ?>
                                <a href="<?php echo e(setting('site_facebook')); ?>" target="_blank"
                                    class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            <?php endif; ?>
                            <?php if(setting('site_instagram')): ?>
                                <a href="<?php echo e(setting('site_instagram')); ?>" target="_blank"
                                    class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            <?php endif; ?>
                            <?php if(setting('site_whatsapp')): ?>
                                <a href="https://wa.me/<?php echo e(setting('site_whatsapp')); ?>" target="_blank"
                                    class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-semibold mb-3 sm:mb-4">روابط سريعة</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="<?php echo e(route('home')); ?>" class="hover:text-white transition">الرئيسية</a></li>
                        <li><a href="<?php echo e(route('products.index')); ?>" class="hover:text-white transition">جميع
                                المنتجات</a></li>
                        <li><a href="<?php echo e(route('brands.index')); ?>" class="hover:text-white transition">العلامات
                                التجارية</a></li>
                        <li><a href="<?php echo e(route('about')); ?>" class="hover:text-white transition">من نحن</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>" class="hover:text-white transition">اتصل بنا</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div>
                    <h4 class="text-white font-semibold mb-3 sm:mb-4">التصنيفات</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="<?php echo e(route('products.index', ['category' => 'flagship'])); ?>"
                                class="hover:text-white transition">الهواتف الرائدة</a></li>
                        <li><a href="<?php echo e(route('products.index', ['category' => 'mid-range'])); ?>"
                                class="hover:text-white transition">الفئة المتوسطة</a></li>
                        <li><a href="<?php echo e(route('products.index', ['category' => 'budget'])); ?>"
                                class="hover:text-white transition">الهواتف الاقتصادية</a></li>
                        <li><a href="<?php echo e(route('products.index', ['category' => 'gaming'])); ?>"
                                class="hover:text-white transition">هواتف الألعاب</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-white font-semibold mb-3 sm:mb-4">تواصل معنا</h4>
                    <ul class="space-y-3 text-sm">
                        <?php if(setting('site_address')): ?>
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt mt-1 ml-3 text-blue-500 flex-shrink-0"></i>
                                <span><?php echo e(setting('site_address')); ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if(setting('site_phone')): ?>
                            <li class="flex items-center">
                                <i class="fas fa-phone-alt ml-3 text-blue-500 flex-shrink-0"></i>
                                <a href="tel:<?php echo e(setting('site_phone')); ?>" dir="ltr"
                                    class="hover:text-white transition"><?php echo e(setting('site_phone')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(setting('site_email')): ?>
                            <li class="flex items-center">
                                <i class="fas fa-envelope ml-3 text-blue-500 flex-shrink-0"></i>
                                <a href="mailto:<?php echo e(setting('site_email')); ?>"
                                    class="hover:text-white transition break-all"><?php echo e(setting('site_email')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-6 sm:mt-8 pt-6 sm:pt-8 text-center text-xs sm:text-sm">
                <p>&copy; <?php echo e(date('Y')); ?> <?php echo e(setting('site_name', 'موبايلات المواصي')); ?>. جميع الحقوق محفوظة.</p>
                <p class="mt-2 text-gray-500">مشروع تخرج - صُنع بـ <i class="fas fa-heart text-red-500"></i> في غزة،
                    فلسطين</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle with animation
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('open');
            const icon = this.querySelector('i');
            if (mobileMenu.classList.contains('open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Close mobile menu on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                mobileMenu.classList.remove('open');
                const icon = mobileMenuBtn.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    </script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\mobiles-store\resources\views/layouts/app.blade.php ENDPATH**/ ?>