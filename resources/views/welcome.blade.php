<x-main-layout>
    <!-- Banner Iklan -->
    <div class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Koleksi Musim Panas</h1>
            <p class="mt-6 max-w-lg mx-auto text-xl text-indigo-200">
                Tampil gaya dengan koleksi terbaru kami. Kualitas terbaik dengan harga yang tidak akan Anda temukan di tempat lain.
            </p>
            <a href="{{ route('products.public.index') }}" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-800 bg-white hover:bg-indigo-50 sm:w-auto">
                Belanja Sekarang
            </a>
        </div>
    </div>

    <!-- Bagian Produk Terbaru -->
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Produk Terbaru</h2>
            <a href="{{ route('products.public.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                Lihat Semua Produk &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            @forelse ($latestProducts as $product)
                {{-- Kartu produk yang sama seperti sebelumnya --}}
                <a href="{{ route('products.public.show', $product) }}" class="group block overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-2xl">
                    <div class="relative">
                        <img src="{{ asset('images/' . $product->gambar_produk) }}" alt="Gambar produk {{ $product->nama_produk }}" class="aspect-square w-full object-cover transition-transform duration-300 group-hover:scale-105" onerror="this.onerror=null;this.src='https://placehold.co/400x400/e2e8f0/4a5568?text=Gambar+Rusak';">
                    </div>
                    <div class="p-4">
                        <h3 class="mt-1 truncate text-md font-semibold text-gray-800" title="{{ $product->nama_produk }}">{{ $product->nama_produk }}</h3>
                        <p class="mt-2 text-lg font-bold text-blue-600">Rp {{$product->harga_produk}}</p>
                    </div>
                </a>
            @empty
                <p class="col-span-full text-center text-gray-500">Belum ada produk untuk ditampilkan.</p>
            @endforelse
        </div>
    </div>
</x-main-layout>
