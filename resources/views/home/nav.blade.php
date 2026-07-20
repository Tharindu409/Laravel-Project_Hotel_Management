<nav class="bg-slate-900/80 backdrop-blur-md border-b border-white/10 z-50 absolute w-full top-0">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    <!-- Logo -->
    <div class="flex items-center gap-2 text-white shrink-0">
      <span class="font-display text-2xl tracking-wide font-bold">BENTHOTA</span>
      <span class="text-[10px] tracking-[0.3em] text-amber-400 hidden sm:block mt-1">RESORTS</span>
    </div>

    <!-- Main Navigation Links -->
    <ul class="hidden xl:flex items-center gap-8 text-sm font-semibold text-white/90 uppercase tracking-wider text-[11px]">
      <li><a href="/" class="hover:text-amber-400 transition">Home</a></li>
      <li><a href="#" class="hover:text-amber-400 transition">Rooms</a></li>
      <li><a href="#" class="hover:text-amber-400 transition">Offers</a></li>
      <li><a href="#" class="hover:text-amber-400 transition">Dining</a></li>
      
      <!-- Experiences Dropdown -->
      <li class="relative group py-4">
        <button class="flex items-center gap-1 hover:text-amber-400 transition uppercase tracking-wider">
          Experiences
          <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
        </button>
        <div class="absolute top-full left-0 w-56 bg-white rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 py-2 border border-slate-100 text-slate-700 normal-case tracking-normal text-sm">
          <a href="#" class="block px-5 py-2.5 hover:bg-amber-50 hover:text-amber-600 transition">Spa &amp; Wellness</a>
          <a href="#" class="block px-5 py-2.5 hover:bg-amber-50 hover:text-amber-600 transition">Events &amp; Weddings</a>
          <a href="#" class="block px-5 py-2.5 hover:bg-amber-50 hover:text-amber-600 transition">Activities</a>
          <a href="#" class="block px-5 py-2.5 hover:bg-amber-50 hover:text-amber-600 transition">Travel Guide</a>
        </div>
      </li>

      <!-- Info Dropdown -->
      <li class="relative group py-4">
        <button class="flex items-center gap-1 hover:text-amber-400 transition uppercase tracking-wider">
          Explore
          <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
        </button>
        <div class="absolute top-full left-0 w-48 bg-white rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 py-2 border border-slate-100 text-slate-700 normal-case tracking-normal text-sm">
          <a href="#" class="block px-5 py-2.5 hover:bg-amber-50 hover:text-amber-600 transition">Gallery</a>
          <a href="#" class="block px-5 py-2.5 hover:bg-amber-50 hover:text-amber-600 transition">Locations</a>
          <a href="#" class="block px-5 py-2.5 hover:bg-amber-50 hover:text-amber-600 transition">Reviews</a>
          <div class="border-t border-slate-100 my-1"></div>
          <a href="#" class="block px-5 py-2.5 hover:bg-amber-50 hover:text-amber-600 transition">Contact Us</a>
        </div>
      </li>
    </ul>

    <!-- Action & Auth Area -->
    <div class="flex items-center gap-4">
       

      @guest
        <div class="hidden sm:flex items-center gap-2 border-l border-white/20 pl-4 ml-2">
          <a class="text-white hover:text-amber-400 text-xs font-bold tracking-widest uppercase px-3 py-2 transition"
             href="{{ route('login') }}">
            Login
          </a>
          <a class="bg-white/10 hover:bg-white/20 text-white border border-white/30 text-xs font-bold tracking-widest uppercase px-4 py-2.5 rounded-md transition"
             href="{{ route('register') }}">
            Register
          </a>
        </div>
      @endguest

      @auth
        <!-- User Profile Dropdown -->
        <div class="relative group ml-2 pl-4 border-l border-white/20">
          <button class="flex items-center gap-2 text-white hover:text-amber-400 transition">
            <div class="w-8 h-8 rounded-full bg-amber-500 text-slate-900 flex items-center justify-center font-bold text-sm">
              {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <span class="text-sm font-semibold hidden md:block">{{ Auth::user()->name }}</span>
            <svg class="w-4 h-4 hidden md:block transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
          </button>
          
          <div class="absolute right-0 top-full mt-2 w-56 bg-white rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 py-2 border border-slate-100 text-slate-700">
            <div class="px-5 py-2 font-semibold text-xs uppercase tracking-widest text-slate-400 border-b border-slate-100 mb-1">My Account</div>
            <a href="{{ route('profile.show') }}" class="block px-5 py-2.5 hover:bg-amber-50 hover:text-amber-600 transition flex items-center gap-2 text-sm">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
              My Profile
            </a>
            <a href="#" class="block px-5 py-2.5 hover:bg-amber-50 hover:text-amber-600 transition flex items-center gap-2 text-sm">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
              My Bookings
            </a>
            <a href="#" class="block px-5 py-2.5 hover:bg-amber-50 hover:text-amber-600 transition flex items-center gap-2 text-sm">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
              Payments / History
            </a>
            <a href="#" class="block px-5 py-2.5 hover:bg-amber-50 hover:text-amber-600 transition flex items-center gap-2 text-sm">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
              Wishlist
            </a>

            <a href="#" class="block px-5 py-2.5 hover:bg-amber-50 hover:text-amber-600 transition flex items-center gap-2 text-sm justify-between">
              <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                Notifications
              </div>
               
            </a>

            <div class="border-t border-slate-100 my-1"></div>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full text-left px-5 py-2.5 hover:bg-red-50 text-red-600 transition flex items-center gap-2 text-sm font-semibold">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Logout
              </button>
            </form>
          </div>
        </div>
      @endauth
    </div>
  </div>
</nav>