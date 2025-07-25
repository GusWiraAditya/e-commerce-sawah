{{-- 
=========================================================================================================
| Halaman Detail Produk (Revisi Modern)                                                                 |
|                                                                                                       |
| Penjelasan Revisi:                                                                                    |
| 1. Breadcrumbs: Menambahkan navigasi breadcrumb di bagian atas.                                       |
| 2. Layout Dua Kolom yang Disempurnakan: Tata letak gambar dan informasi produk.                       |
| 3. Informasi Terstruktur: Harga, nama, ulasan, dan deskripsi produk.                                  |
| 4. Opsi & Aksi: Input kuantitas dan tombol tambah ke keranjang.                                       |
| 5. Produk Terkait: Menambahkan bagian baru di bawah untuk menampilkan produk lain yang relevan,       |
|    mendorong pengguna untuk menjelajah lebih jauh.                                                    |
|                                                                                                       |
| Catatan Controller: Untuk menampilkan "Produk Terkait", Anda perlu mengirimkan data tambahan          |
| dari metode `publicShow` di `ProductController` Anda.                                                 |
=========================================================================================================
--}}
<x-main-layout>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Breadcrumbs -->
            <nav aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-2">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('home') }}" class="mr-2 text-sm font-medium text-gray-900">Home</a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('products.public.index') }}" class="mr-2 text-sm font-medium text-gray-900">Products</a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>
                    <li class="text-sm">
                        <span aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">{{ $product->nama_produk }}</span>
                    </li>
                </ol>
            </nav>

            <!-- Product info -->
            <div class="mt-6 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
                <!-- Kolom Gambar -->
                <div class="w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/' . $product->gambar_produk) }}" 
                         alt="Gambar detail {{ $product->nama_produk }}" 
                         class="w-full h-full object-center object-cover"
                         onerror="this.onerror=null;this.src='https://placehold.co/600x700/e2e8f0/4a5568?text=Gambar+Rusak';">
                </div>

                <!-- Kolom Detail Produk -->
                <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $product->nama_produk }}</h1>

                    <div class="mt-3">
                        <p class="text-3xl text-gray-900">Rp {{$product->harga_produk }}</p>
                    </div>

                    <!-- Placeholder Ulasan -->
                    <div class="mt-3">
                        <h3 class="sr-only">Ulasan</h3>
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <!-- Bintang ulasan (contoh) -->
                                <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                <svg class="text-gray-200 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            </div>
                            <p class="sr-only">4 dari 5 bintang</p>
                            <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117 ulasan</a>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="sr-only">Deskripsi</h3>
                        <div class="text-base text-gray-700 space-y-6">
                            <p>{{ $product->deskripsi_produk }}</p>
                        </div>
                    </div>

                    <form class="mt-10">
                        <div class="flex items-center space-x-4">
                            <div>
                                <label for="quantity" class="sr-only">Kuantitas</label>
                                <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stok_produk }}" class="w-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                            <button type="submit" class="flex-1 bg-blue-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Tambah ke Keranjang
                            </button>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Stok Tersedia: {{ $product->stok_produk }}</p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Produk Terkait -->
    @if($relatedProducts->isNotEmpty())
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Pelanggan Juga Melihat</h2>

            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm transition-all duration-300 hover:shadow-xl">
                        <div class="aspect-w-3 aspect-h-4 bg-gray-200 sm:aspect-none sm:h-60">
                            <img src="{{ asset('images/' . $relatedProduct->gambar_produk) }}" 
                                 alt="Gambar produk {{ $relatedProduct->nama_produk }}" 
                                 class="h-full w-full object-cover object-center sm:h-full sm:w-full transition-transform duration-300 group-hover:scale-105"
                                 onerror="this.onerror=null;this.src='https://placehold.co/400x400/e2e8f0/4a5568?text=Gambar+Rusak';">
                        </div>
                        <div class="flex flex-1 flex-col space-y-2 p-4">
                            <h3 class="text-base font-medium text-gray-900">
                                <a href="{{ route('products.public.show', $relatedProduct) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $relatedProduct->nama_produk }}
                                </a>
                            </h3>
                            <div class="flex flex-1 flex-col justify-end">
                                <p class="text-lg font-bold text-gray-900">Rp {{$relatedProduct->harga_produk}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</x-main-layout>
