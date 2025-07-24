<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles / Scripts -->
        
    </head>
    <body class="flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="px-10 flex justify-between w-full text-sm shadow-md p-6 rounded-md top-0">
            <div class="flex items-center justify-between ">
                <p class="text-2xl font-mono">UMKM</p>
            </div>
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 text-black border-[#19140035] hover:border-[#1915014a] border  dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:scale-200 hover:border-black 
                            rounded-md text-sm leading-normal transition-all duration-300"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:scale-200 hover:border-black 
                                rounded-md text-sm leading-normal transition-all duration-300">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
            <main class="flex items-center justify-center rounded-lg border-white border-2">
                <div class="flex flex-col ">
                <!-- Content -->
                    <div style="background-image: url('/images/gs.jpeg');" class="rounded-xl bg-cover w-auto min-h-auto flex flex-col text-center text-white py-12 px-12 my-20">
                            <h1 class="text-4xl font-bold text-center">Welcome to UMKM E-Commerce</h1>
                            <p class="mt-4 text-center text-lg">Your one-stop solution for all your e-commerce needs.</p>
                    </div>
                <!-- Produk Content -->
                <div class="flex flex-wrap gap-7 max-w-5xl justify-center ">
                    @foreach ($products as $p )
                        <div class="border-2 rounded-xl border-gray-100 max-w-auto h-auto hover:scale-105 hover:shadow-md  transition-transform duration-300 ">
                        <!-- Image -->
                            <div class="p-4">
                                <img src={{ asset('images/'.$p->gambar_produk) }} alt="gambar produk" />
                            </div>
                        <!-- Price -->
                            <div class="text-4xl p-4"> 
                                <h1>Rp{{ $p->harga_produk }}</h1>
                            </div>
                        <!-- description -->
                            <div class ="p-4">
                                <h2 class="text-2xl">{{$p->nama_produk}}</h2>
                                <p>{{$p->deskripsi_produk}}</p>
                            </div>
                        <!-- Button -->
                            <div class="p-4 flex justify-end ">
                                <button class="p-2 w-20 rounded-md border-2 border-gray-300 hover:bg-blue-500 hover:text-white hover:border-none transition-color duration-300">Buy</button>
                            </div>
                        </div>
                            @endforeach   
                        </div>
                </div>   
            </main>
        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
