 <header class="flex items-center justify-between border-b border-gray-200 bg-white p-4 shadow-sm">
     <!-- Mobile menu button -->
     <button @click="sidebarOpen = true" class="text-gray-500 hover:text-gray-700 focus:outline-none sm:hidden">
         <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
         </svg>
     </button>

     <!-- Search bar -->
     <div class="relative hidden md:block">
         <span class="absolute inset-y-0 left-0 flex items-center pl-3">
             <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
             </svg>
         </span>
         <input type="text"
             class="w-full rounded-md border border-gray-300 py-2 pl-10 pr-4 text-sm focus:border-indigo-500 focus:ring-indigo-500"
             placeholder="Cari...">
     </div>

     <!-- Right side of Navbar -->
     <div class="flex items-center space-x-4">
         <button class="relative text-gray-500 hover:text-gray-700">
             <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
             </svg>
             <span
                 class="absolute -top-1 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 text-xs text-white">3</span>
         </button>

         <!-- Profile dropdown -->
         <div x-data="{ dropdownOpen: false }" class="relative">
             <button @click="dropdownOpen = !dropdownOpen"
                 class="flex items-center space-x-2 rounded-full p-1 hover:bg-gray-100">
                 <img class="h-8 w-8 rounded-full object-cover" src="https://i.pravatar.cc/150?u=admin"
                     alt="Admin avatar">
                 <span class="hidden text-sm font-medium text-gray-700 md:block">{{ Auth::user()->name }}</span>
                 <svg class="hidden h-5 w-5 text-gray-400 md:block" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20" fill="currentColor">
                     <path fill-rule="evenodd"
                         d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                         clip-rule="evenodd" />
                 </svg>
             </button>
             <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition
                 class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5"
                 style="display: none;">
                 <a href="{{ route('profile.edit') }}"
                     class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil Saya</a>
                 <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                         class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">
                         Keluar
                     </a>
                 </form>
             </div>
         </div>
     </div>
 </header>
