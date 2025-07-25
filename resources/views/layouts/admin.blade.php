{{-- 
=========================================================================================================
| File Layout Admin Panel                                                                               |
|                                                                                                       |
| Penjelasan Revisi:                                                                                    |
| 1. Ini adalah file layout utama yang didedikasikan untuk seluruh halaman di dalam panel admin Anda.   |
| 2. Sidebar Diperbarui:                                                                                |
|    - Link "Dashboard" sekarang mengarah ke route `admin.dashboard`.                                   |
|    - Link "Produk" sekarang mengarah ke route `admin.products.index`.                                 |
| 3. Link Aktif: Menggunakan `request()->routeIs(...)` untuk secara otomatis memberikan highlight        |
|    pada menu sidebar yang sedang aktif, memberikan navigasi yang lebih intuitif.                      |
| 4. Struktur Lengkap: Menyertakan navbar atas dengan dropdown profil dan slot untuk konten utama,      |
|    menciptakan kerangka kerja yang kokoh dan dapat digunakan kembali untuk semua halaman admin.         |
=========================================================================================================
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="font-sans antialiased">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside 
            class="fixed inset-y-0 left-0 z-30 w-64 flex-shrink-0 transform bg-gray-800 p-4 text-gray-200 transition-transform duration-300 ease-in-out sm:relative sm:translate-x-0"
            :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
            
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="h-8 w-auto text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.25a.75.75 0 0 1-.75-.75V10.5a.75.75 0 0 1 .75-.75h1.5v1.5a.75.75 0 0 0 1.5 0v-1.5h3l3 4.5m-3-4.5V2.25a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 .75.75v3.75m0 0h3.75a.75.75 0 0 1 .75.75v12a.75.75 0 0 1-.75-.75h-3.75m-3.75 0h-3.75a.75.75 0 0 1-.75-.75V15m0 0h1.5m-1.5 0H5.25m15 0H18a.75.75 0 0 0 .75-.75V8.25a.75.75 0 0 0-.75-.75h-1.5" />
                    </svg>
                    <span class="ml-2 text-xl font-bold">TokoKita</span>
                </div>
                 <button @click="sidebarOpen = false" class="text-gray-400 hover:text-white sm:hidden">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <nav class="mt-10">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center rounded-lg px-4 py-2 transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-600 hover:text-white' }}">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
                <a href="{{ route('admin.products.index') }}" class="mt-2 flex items-center rounded-lg px-4 py-2 transition-colors duration-200 {{ request()->routeIs('admin.products.*') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-600 hover:text-white' }}">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="ml-4">Produk</span>
                </a>
                {{-- Tambahkan link admin lain di sini --}}
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex flex-1 flex-col overflow-hidden">
            <!-- Navbar Atas -->
            <header class="flex items-center justify-between border-b border-gray-200 bg-white p-4 shadow-sm">
                <!-- Tombol Menu Mobile -->
                <button @click="sidebarOpen = true" class="text-gray-500 hover:text-gray-700 focus:outline-none sm:hidden">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="flex-1"></div>
                <!-- Dropdown Profil -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </header>
            
            <!-- Konten Utama Halaman -->
            <main class="flex-1 overflow-y-auto overflow-x-hidden">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
