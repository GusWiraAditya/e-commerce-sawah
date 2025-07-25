<x-admin-layout>
    <div class="p-4 sm:p-6">
        <div class="container mx-auto">
            <h1 class="mb-6 text-3xl font-bold text-gray-800">Admin Dashboard</h1>

            <!-- Stat Cards -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                
                {{-- Card 1: Total Produk --}}
                <div class="transform rounded-xl bg-white p-6 shadow-lg transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Produk</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $productCount }}</p>
                        </div>
                        <div class="rounded-full bg-blue-100 p-3">
                            <svg class="h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('admin.products.index') }}" class="mt-2 text-xs text-blue-600 hover:underline">Lihat semua produk &rarr;</a>
                </div>

                {{-- Card 2: Total Pengguna --}}
                <div class="transform rounded-xl bg-white p-6 shadow-lg transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Pengguna</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $userCount }}</p>
                        </div>
                        <div class="rounded-full bg-green-100 p-3">
                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m-7.5-2.962a3.75 3.75 0 100-5.925 3.75 3.75 0 000 5.925zM12 21a9.094 9.094 0 01-3.741-.479 3 3 0 01-4.682-2.72M12 3a3.75 3.75 0 000 5.925 3.75 3.75 0 000-5.925z" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Termasuk akun admin</p>
                </div>

                {{-- Anda bisa menambahkan kartu lain di sini --}}

            </div>
            <!-- End Stat Cards -->

            <div class="mt-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold text-gray-700">Selamat Datang di Panel Admin</h2>
                    <p class="mt-2 text-gray-600">Gunakan menu di sebelah kiri untuk mengelola produk dan konten lainnya di situs Anda.</p>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
