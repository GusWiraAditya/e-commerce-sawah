<x-admin-layout>
    <div class="p-4 sm:p-6">
        <div class="mx-auto">

            <!-- Header Halaman -->
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl">
                        Ubah Produk
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">Perbarui detail produk di bawah ini.</p>
                </div>
                <div>
                    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-white border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        <svg class="w-4 h-4 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="bg-white shadow-md sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                            
                            <!-- Kolom Kiri: Detail Produk -->
                            <div class="md:col-span-2 space-y-6">
                                <!-- Nama Produk -->
                                <div>
                                    <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                                    <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}" class="mt-1 block w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('nama_produk') border-red-500 @enderror" placeholder="Contoh: Kemeja Lengan Panjang">
                                    @error('nama_produk')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Deskripsi Produk -->
                                <div>
                                    <label for="deskripsi_produk" class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
                                    <textarea name="deskripsi_produk" id="deskripsi_produk" rows="4" class="mt-1 block w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('deskripsi_produk') border-red-500 @enderror" placeholder="Jelaskan detail produk Anda di sini...">{{ old('deskripsi_produk', $product->deskripsi_produk) }}</textarea>
                                    @error('deskripsi_produk')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Harga & Stok -->
                                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                    <div>
                                        <label for="harga_produk" class="block text-sm font-medium text-gray-700">Harga Produk</label>
                                        <div class="relative mt-1 rounded-md shadow-sm">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                <span class="text-gray-500 sm:text-sm">Rp</span>
                                            </div>
                                            {{-- PERBAIKAN DI SINI: Memastikan format angka benar untuk input --}}
                                            <input type="number" name="harga_produk" id="harga_produk" value="{{ old('harga_produk', $product->harga_produk)}}" class="block w-full rounded-md pl-8 pr-4 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('harga_produk') border-red-500 @enderror" placeholder="0.00" step="0.01">
                                        </div>
                                        @error('harga_produk')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="stok_produk" class="block text-sm font-medium text-gray-700">Stok Produk</label>
                                        <input type="number" name="stok_produk" id="stok_produk" value="{{ old('stok_produk', $product->stok_produk) }}" class="mt-1 block w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('stok_produk') border-red-500 @enderror" placeholder="0">
                                        @error('stok_produk')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom Kanan: Gambar Produk -->
                            <div class="md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                                <div x-data="{ imagePreview: '{{ $product->gambar_produk ? asset('images/' . $product->gambar_produk) : null }}' }" class="mt-1">
                                    <!-- Area Pratinjau Gambar -->
                                    <div class="w-full h-48 overflow-hidden rounded-md bg-gray-100 border @error('gambar_produk') border-red-500 @else @enderror flex items-center justify-center">
                                        <template x-if="imagePreview">
                                            <img :src="imagePreview" class="h-full w-full object-cover">
                                        </template>
                                        <template x-if="!imagePreview">
                                            <div class="text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <p class="mt-2 text-sm text-gray-500">Tidak ada gambar</p>
                                            </div>
                                        </template>
                                    </div>
                                    <!-- Tombol Ganti Gambar -->
                                    <div class="mt-4">
                                        <label for="gambar_produk" class="cursor-pointer inline-flex items-center px-4 py-2 bg-white border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                            Ganti Gambar
                                        </label>
                                        <input id="gambar_produk" name="gambar_produk" type="file" class="hidden"
                                            @change="
                                                let reader = new FileReader();
                                                reader.onload = (e) => {
                                                    imagePreview = e.target.result;
                                                };
                                                reader.readAsDataURL($event.target.files[0]);
                                            ">
                                    </div>
                                    @error('gambar_produk')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tombol Aksi Form -->
                    <div class="flex items-center justify-end gap-x-6 bg-gray-50 px-4 py-3 text-right sm:px-6 rounded-b-lg">
                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Perbarui Produk
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
