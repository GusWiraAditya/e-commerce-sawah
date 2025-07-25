{{-- 
=========================================================================================================
| File Layout Utama (Kerangka Situs)                                                                    |
|                                                                                                       |
| Penjelasan Revisi:                                                                                    |
| 1. Navbar untuk pengguna yang sudah login (@auth) diubah menjadi dropdown yang lebih ringkas.         |
| 2. Menggunakan Alpine.js (x-data) untuk fungsionalitas buka/tutup dropdown. Alpine.js sudah           |
|    termasuk dalam Laravel Breeze, jadi tidak perlu setup tambahan.                                    |
| 3. Trigger dropdown adalah nama pengguna yang sedang login.                                           |
| 4. Isi dropdown mencakup link ke Dashboard (Admin/User), Ubah Profil, dan Logout.                     |
| 5. Tampilan link navigasi aktif (Home/Products) dipertahankan sesuai permintaan Anda.                 |
=========================================================================================================
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'TokoKita' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    
    {{-- Alpine.js disertakan melalui Vite di Laravel Breeze. Jika tidak, Anda bisa menambahkannya via CDN --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-100 antialiased">
    <div class="flex flex-col min-h-screen">
        <!-- Navbar Terpadu -->
        <nav class="bg-white shadow-md sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center space-x-8">
                        <!-- Logo -->
                        <div class="flex-shrink-0">
                            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800">TokoKita</a>
                        </div>
                        <!-- Navigasi Utama -->
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="{{ route('home') }}" class="px-3 py-2  text-sm font-medium {{ request()->routeIs('home') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-600 hover:text-gray-700' }}">Home</a>
                                <a href="{{ route('products.public.index') }}" class="px-3 py-2  text-sm font-medium {{ request()->routeIs('products.public.index') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-600 hover:text-gray-700' }}">Products</a>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Navigasi Kanan (Login/Logout) -->
                    <div class="flex items-center space-x-4">
                        @guest
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Masuk</a>
                            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">Daftar</a>
                        @else
                            <!-- Dropdown Profil Pengguna -->
                            <div x-data="{ open: false }" class="relative">
                                <!-- Tombol Trigger Dropdown -->
                                <button @click="open = !open" class="flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 focus:outline-none">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>

                                <!-- Menu Dropdown -->
                                <div x-show="open" 
                                     @click.away="open = false" 
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="transform opacity-0 scale-95"
                                     x-transition:enter-end="transform opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="transform opacity-100 scale-100"
                                     x-transition:leave-end="transform opacity-0 scale-95"
                                     class="absolute right-0 mt-2 w-48 rounded-md shadow-lg origin-top-right bg-white ring-1 ring-black ring-opacity-5"
                                     style="display: none;">
                                    <div class="py-1">
                                        @if(Auth::user()->isAdmin)
                                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Admin Panel</a>
                                        @else
                                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard Saya</a>
                                        @endif
                                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ubah Profil</a>
                                        <div class="border-t border-gray-100"></div>
                                        <!-- Tombol Logout -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}" 
                                               onclick="event.preventDefault(); this.closest('form').submit();" 
                                               class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                Keluar
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Konten Halaman Dinamis -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 mt-auto">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-sm text-gray-500">&copy; {{ date('Y') }} TokoKita. Semua Hak Cipta Dilindungi.</p>
            </div>
        </footer>
    </div>
</body>
</html>
