{{-- 
=========================================================================================================
| Halaman Manajemen Produk (CRUD Index)                                                                 |
| Dibuat dengan Laravel Blade & Tailwind CSS                                                            |
|                                                                                                       |
| Penjelasan:                                                                                           |
| 1. Menggunakan layout yang sama dengan dashboard (<x-app-layout> atau <x-admin-layout> Anda).         |
| 2. Menggantikan seluruh kelas Bootstrap (card, btn, table-bordered) dengan utility-class Tailwind CSS.|
| 3. Header Halaman: Judul halaman yang jelas dan tombol "Tambah Produk" dengan ikon.                   |
| 4. Notifikasi Sukses: Pesan @session('success') diubah menjadi alert modern dengan warna hijau.       |
| 5. Tabel Modern: Tabel didesain ulang dengan padding, border, dan warna latar yang lebih baik.        |
|    - Gambar produk ditampilkan dalam bentuk thumbnail bulat.                                          |
|    - Harga diformat sebagai mata uang.                                                                |
|    - Deskripsi dipotong agar tidak terlalu panjang.                                                   |
| 6. Tombol Aksi: Tombol Show, Edit, dan Delete diganti dengan ikon dan tooltip untuk tampilan minimalis.|
| 7. Pesan Data Kosong: Tampilan yang lebih informatif saat tidak ada produk.                           |
| 8. Paginasi: Menggunakan paginasi bawaan Laravel yang akan di-style oleh Tailwind.                     |
|                                                                                                       |
| Catatan Penting:                                                                                      |
| - Anda perlu menjalankan `php artisan vendor:publish --tag=laravel-pagination` dan memilih           |
|   opsi untuk Tailwind CSS agar paginasi {!! $products->links() !!} tampil dengan benar.               |
=========================================================================================================
--}}

<x-admin-layout>
    {{-- Asumsikan Anda menggunakan layout yang sama dengan dashboard --}}
    <div class="p-4 sm:p-6">
        <div class="mx-auto max-w-7xl">
            
            <!-- Header Halaman -->
            <div class="mb-6 md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                        Manajemen Produk
                    </h2>
                </div>
                <div class="mt-4 flex md:mt-0 md:ml-4">
                    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <svg class="w-4 h-4 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Produk Baru
                    </a>
                </div>
            </div>

            <!-- Notifikasi Sukses -->
            @session('success')
                <div class="rounded-md bg-green-50 p-4 mb-4 border border-green-200">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                {{ $value }}
                            </p>
                        </div>
                    </div>
                </div>
            @endsession

            <!-- Tabel Produk -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($products as $product)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ ++$i }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-12 w-12">
                                                        <img class="h-12 w-12 rounded-full object-cover" src="{{ asset('images/' . $product->gambar_produk) }}" alt="{{ $product->nama_produk }}" onerror="this.onerror=null;this.src='https://placehold.co/100x100/e2e8f0/4a5568?text=N/A';">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">{{ $product->nama_produk }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-900 max-w-xs truncate">{{ $product->deskripsi_produk }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->stok_produk }} Pcs</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">Rp {{ $product->harga_produk}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                                    <a href="{{ route('admin.products.show', $product->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3" title="Lihat">
                                                        <svg class="w-5 h-5 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                                    </a>
                                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="text-yellow-500 hover:text-yellow-700 mr-3" title="Ubah">
                                                        <svg class="w-5 h-5 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.536L16.732 3.732z" /></svg>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus">
                                                        <svg class="w-5 h-5 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-12 text-center">
                                                <div class="text-center">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                    </svg>
                                                    <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada produk</h3>
                                                    <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan produk baru.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paginasi -->
            <div class="mt-4">
                {{-- Pastikan Anda sudah mem-publish view paginasi untuk Tailwind CSS --}}
                {!! $products->withQueryString()->links() !!}
            </div>

        </div>
    </div>
</x-admin-layout>
