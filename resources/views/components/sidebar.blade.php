 <aside
     class="fixed inset-y-0 left-0 z-30 w-64 flex-shrink-0 transform bg-gray-800 p-4 text-gray-200 transition-transform duration-300 ease-in-out sm:relative sm:translate-x-0"
     :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }">

     <div class="flex items-center justify-between">
         <div class="flex items-center">
             <svg class="h-8 w-auto text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round"
                     d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.25a.75.75 0 0 1-.75-.75V10.5a.75.75 0 0 1 .75-.75h1.5v1.5a.75.75 0 0 0 1.5 0v-1.5h3l3 4.5m-3-4.5V2.25a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 .75.75v3.75m0 0h3.75a.75.75 0 0 1 .75.75v12a.75.75 0 0 1-.75-.75h-3.75m-3.75 0h-3.75a.75.75 0 0 1-.75-.75V15m0 0h1.5m-1.5 0H5.25m15 0H18a.75.75 0 0 0 .75-.75V8.25a.75.75 0 0 0-.75-.75h-1.5" />
             </svg>
             <span class="ml-2 text-xl font-bold">TokoKita</span>
         </div>
         <button @click="sidebarOpen = false" class="text-gray-400 hover:text-white sm:hidden">
             <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
             </svg>
         </button>
     </div>

     <nav class="mt-10">
         <a href="#"
             class="flex items-center rounded-lg bg-gray-700 px-4 py-2 text-white transition-colors duration-200 hover:bg-gray-600">
             <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
             </svg>
             <span class="ml-4">Dashboard</span>
         </a>
         <a href="#"
             class="mt-2 flex items-center rounded-lg px-4 py-2 text-gray-400 transition-colors duration-200 hover:bg-gray-700 hover:text-white">
             <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
             </svg>
             <span class="ml-4">Produk</span>
         </a>
     </nav>
 </aside>
