<x-main-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="mt-2 text-gray-600">
                        Anda telah berhasil masuk ke akun Anda. Dari sini, Anda dapat mengelola profil Anda.
                    </p>
                </div>
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium">Aksi Cepat</h3>
                     <div class="mt-4 flex space-x-4">
                        <a href="{{ route('profile.edit') }}" class="text-blue-600 hover:underline">Ubah Profil</a>
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
