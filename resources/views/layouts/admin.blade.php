<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم') - موبايلات المواصي</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        /* Custom scrollbar for sidebar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 4px;
        }

        /* Mobile sidebar animation */
        .sidebar-overlay {
            transition: opacity 0.3s ease;
        }

        .sidebar-panel {
            transition: transform 0.3s ease;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <div id="sidebar-overlay" class="sidebar-overlay fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"
            onclick="toggleSidebar()"></div>

        <aside id="sidebar"
            class="sidebar-panel w-64 bg-gray-900 text-gray-300 flex-shrink-0 fixed h-full right-0 z-50 transform translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
            <div class="flex flex-col h-full">
                <div class="p-4 border-b border-gray-800 flex items-center justify-between">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 space-x-reverse">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-mobile-alt text-white text-xl"></i>
                        </div>
                        <span class="text-lg font-bold text-white">لوحة التحكم</span>
                    </a>
                    <button onclick="toggleSidebar()" class="lg:hidden text-gray-400 hover:text-white p-1">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <nav class="flex-1 p-4 overflow-y-auto sidebar-scroll">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                                class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : '' }}">
                                <i class="fas fa-tachometer-alt w-5 ml-3"></i>
                                <span>الرئيسية</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products.index') }}"
                                class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.products.*') ? 'bg-gray-800 text-white' : '' }}">
                                <i class="fas fa-mobile-alt w-5 ml-3"></i>
                                <span>المنتجات</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.brands.index') }}"
                                class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.brands.*') ? 'bg-gray-800 text-white' : '' }}">
                                <i class="fas fa-building w-5 ml-3"></i>
                                <span>العلامات التجارية</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories.index') }}"
                                class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.categories.*') ? 'bg-gray-800 text-white' : '' }}">
                                <i class="fas fa-folder w-5 ml-3"></i>
                                <span>التصنيفات</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.settings.index') }}"
                                class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.settings.*') ? 'bg-gray-800 text-white' : '' }}">
                                <i class="fas fa-cog w-5 ml-3"></i>
                                <span>الإعدادات</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="p-4 border-t border-gray-800">
                    <a href="{{ route('home') }}" target="_blank"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition text-blue-400">
                        <i class="fas fa-external-link-alt w-5 ml-3"></i>
                        <span>عرض المتجر</span>
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition text-red-400">
                            <i class="fas fa-sign-out-alt w-5 ml-3"></i>
                            <span>تسجيل الخروج</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <div class="flex-1 lg:mr-64 min-w-0">
            <header class="bg-white shadow-sm sticky top-0 z-30">
                <div class="flex items-center justify-between px-4 sm:px-6 py-4">
                    <div class="flex items-center">
                        <button onclick="toggleSidebar()"
                            class="lg:hidden text-gray-600 hover:text-gray-800 ml-4 p-2 -mr-2">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <div>
                            <h1 class="text-lg sm:text-xl font-semibold text-gray-800">@yield('page-title', 'لوحة التحكم')</h1>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 sm:space-x-4 space-x-reverse">
                        <span
                            class="text-gray-600 text-sm sm:text-base hidden sm:inline">{{ auth()->user()->name }}</span>
                        <div
                            class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-600 text-white rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-sm sm:text-base"></i>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-4 sm:p-6">
                @if (session('success'))
                    <div
                        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center justify-between">
                        <span class="text-sm sm:text-base">{{ session('success') }}</span>
                        <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900 mr-2">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div
                        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-center justify-between">
                        <span class="text-sm sm:text-base">{{ session('error') }}</span>
                        <button onclick="this.parentElement.remove()" class="text-red-700 hover:text-red-900 mr-2">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                        <ul class="list-disc list-inside text-sm sm:text-base">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            sidebar.classList.toggle('translate-x-full');
            overlay.classList.toggle('hidden');

            // Prevent body scroll when sidebar is open
            document.body.classList.toggle('overflow-hidden', !sidebar.classList.contains('translate-x-full'));
        }

        // Close sidebar when pressing Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const sidebar = document.getElementById('sidebar');
                if (!sidebar.classList.contains('translate-x-full')) {
                    toggleSidebar();
                }
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
