<x-main-layout>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Judul Halaman -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Semua Produk</h1>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">Jelajahi seluruh koleksi yang kami miliki.</p>
        </div>

        <!-- Grid Produk -->
        <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            @forelse ($products as $product)
                {{-- Kartu produk yang sama --}}
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
                <p class="col-span-full text-center text-gray-500">Tidak ada produk yang ditemukan.</p>
            @endforelse
        </div>
        
        <!-- Paginasi -->
        <div class="mt-12">
            {{ $products->links() }}
        </div>
    </div>
</x-main-layout>
