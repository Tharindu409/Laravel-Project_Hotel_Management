<header class="bg-white shadow-sm flex justify-between items-center px-8 py-4 border-b border-slate-200 z-10 sticky top-0">
      <div class="flex items-center gap-8">
        <h1 class="text-2xl font-bold font-display text-slate-800">Dashboard</h1>
        
        <!-- Search Bar -->
        <div class="hidden md:flex relative text-slate-500 focus-within:text-amber-500">
          <svg class="w-4 h-4 absolute top-1/2 left-3 transform -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
          <input type="text" placeholder="Search bookings, rooms, guests..." class="bg-slate-50 rounded-full py-2.5 pl-10 pr-4 text-sm font-medium w-80 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:bg-white transition-all shadow-inner border border-slate-100">
        </div>
      </div>

      <div class="flex items-center gap-6">
        <button class="text-slate-400 hover:text-amber-500 transition relative outline-none focus:ring-2 focus:ring-amber-500 rounded-full p-1">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
          <!-- Notification Dot -->
          <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></span>
        </button>

        <div class="flex items-center gap-4">
           <div class="hidden md:flex flex-col">
             <span class="text-sm text-slate-500">Administrator</span>
          </div>
          <!-- logout button -->
          <form method="POST" action="{{ route('logout') }}">
             @csrf
             <button type="submit" class="inline-flex items-center gap-2 bg-rose-50 text-rose-600 hover:bg-rose-100 hover:text-rose-700 px-3.5 py-1.5 rounded-lg text-sm font-semibold transition duration-150 border border-rose-100/80 shadow-sm cursor-pointer">
               <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
               </svg>
               Log Out
             </button>
          </form>

        </div>

        
          
      </div>
    </header>