<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Benthota Resort — Sri Lanka Beach Resort</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
  body { font-family: 'Inter', sans-serif; }
  .font-display { font-family: 'Playfair Display', serif; }
  .hero-slider-container {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
  }
  .swiper-slide-bg {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
  }
  .slide-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.7), rgba(15, 23, 42, 0.4));
    z-index: 10;
  }
  .hero-content-wrapper {
    position: relative;
    z-index: 20;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }
</style>
</head>
<body class="bg-white text-slate-800">

  <!-- Hero + Nav -->
  <div class="hero-slider-container">
    
    <!-- Swiper -->
    <div class="swiper heroSwiper absolute inset-0 z-0">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="swiper-slide-bg" style="background-image: url('https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=1920&q=80')"></div>
        </div>
        <div class="swiper-slide">
          <div class="swiper-slide-bg" style="background-image: url('https://images.unsplash.com/photo-1610641818989-c2051b5e2cfd?auto=format&fit=crop&w=1920&q=80')"></div>
        </div>
        <div class="swiper-slide">
          <div class="swiper-slide-bg" style="background-image: url('https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=1920&q=80')"></div>
        </div>
      </div>
      <div class="slide-overlay"></div>
    </div>

    <div class="hero-content-wrapper">

    <!-- Navbar -->
    @include('home.nav')
    <!-- Content -->
    <div class="max-w-7xl mx-auto px-6 pt-16 pb-24 relative flex-1 w-full">

      <!-- Headline & Advanced Booking Search -->
      <div class="flex flex-col items-center justify-center h-full text-center mt-12 md:mt-24">
        <h1 class="font-display text-4xl sm:text-5xl md:text-7xl font-bold text-white leading-tight drop-shadow-xl">
          Experience Ultimate Luxury
        </h1>
        <p class="mt-6 text-white/90 text-lg md:text-xl max-w-2xl drop-shadow-md">
          Book a stay at our serene Benthota Resort and enjoy sacred time with family and friends.
        </p>

        <!-- Advanced Booking Search (Horizontal) -->
        <div class="mt-12 bg-white rounded-xl shadow-2xl p-6 w-full max-w-6xl md:flex md:items-end gap-6 text-left">
          <div class="flex-1 mb-4 md:mb-0 relative">
            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Location</label>
            <select class="w-full appearance-none bg-transparent border-b-2 border-slate-200 pb-2 text-slate-800 focus:outline-none focus:border-amber-400 font-medium cursor-pointer">
              <option>Benthota Resort</option>
            </select>
          </div>
          <div class="flex-1 mb-4 md:mb-0">
            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Check In</label>
            <input type="date" class="w-full bg-transparent border-b-2 border-slate-200 pb-2 text-slate-800 focus:outline-none focus:border-amber-400 font-medium cursor-pointer" />
          </div>
          <div class="flex-1 mb-4 md:mb-0">
            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Check Out</label>
            <input type="date" class="w-full bg-transparent border-b-2 border-slate-200 pb-2 text-slate-800 focus:outline-none focus:border-amber-400 font-medium cursor-pointer" />
          </div>
          <div class="flex-1 mb-6 md:mb-0">
            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Guests & Rooms</label>
            <select class="w-full appearance-none bg-transparent border-b-2 border-slate-200 pb-2 text-slate-800 focus:outline-none focus:border-amber-400 font-medium cursor-pointer">
              <option>1 Room, 2 Adults</option>
              <option>1 Room, 2 Adults, 2 Children</option>
              <option>2 Rooms, 4 Adults</option>
            </select>
          </div>
          <div>
            <button class="w-full md:w-auto bg-amber-500 hover:bg-amber-400 text-white font-bold tracking-widest uppercase text-[11px] px-8 py-4 rounded transition shadow-lg hover:shadow-xl hover:-translate-y-0.5">
              Check Availability
            </button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>

  <!-- Properties Section (Featured Rooms equivalent) -->
  <section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center max-w-2xl mx-auto mb-16">
        <span class="text-amber-500 text-[10px] font-bold uppercase tracking-widest">Featured Destinations</span>
        <h2 class="font-display text-4xl sm:text-5xl font-bold text-slate-900 mt-4">Discover Our Resort</h2>
        <div class="h-1 w-20 bg-amber-400 mx-auto mt-6 mb-6"></div>
        <p class="text-slate-500 text-lg">Every corner of Benthota Resort is designed for comfort, calm, and unforgettable views of the Sri Lankan coast.</p>
      </div>
       

      <div class="grid sm:grid-cols-3 gap-8">
        <div class="rounded-xl overflow-hidden shadow-lg group bg-slate-50 hover:shadow-2xl transition duration-300">
          <div class="h-64 bg-cover bg-center group-hover:scale-105 transition duration-700" style="background-image:url('https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=600&q=80')"></div>
          <div class="p-6 text-center">
            <h3 class="font-display font-semibold text-xl text-slate-900">Benthota Resort</h3>
            <p class="text-sm text-slate-500 mt-2">Signature suites with private balconies and infinity pools overlooking the coast.</p>
            <a href="#" class="inline-block mt-4 text-sm font-semibold text-amber-500 hover:text-amber-400 uppercase tracking-widest border-b border-amber-500 pb-1">Explore Benthota Resort</a>
          </div>
        </div>
        <div class="rounded-xl overflow-hidden shadow-lg group bg-slate-50 hover:shadow-2xl transition duration-300">
          <div class="h-64 bg-cover bg-center group-hover:scale-105 transition duration-700" style="background-image:url('https://images.unsplash.com/photo-1499793983690-e29da59ef1c2?auto=format&fit=crop&w=600&q=80')"></div>
          <div class="p-6 text-center">
            <h3 class="font-display font-semibold text-xl text-slate-900">Benthota Resort</h3>
            <p class="text-sm text-slate-500 mt-2">Elegant rooms with lush garden views and serene lounging spaces.</p>
            <a href="#" class="inline-block mt-4 text-sm font-semibold text-amber-500 hover:text-amber-400 uppercase tracking-widest border-b border-amber-500 pb-1">Explore Benthota Resort</a>
          </div>
        </div>
        <div class="rounded-xl overflow-hidden shadow-lg group bg-slate-50 hover:shadow-2xl transition duration-300">
          <div class="h-64 bg-cover bg-center group-hover:scale-105 transition duration-700" style="background-image:url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80')"></div>
          <div class="p-6 text-center">
            <h3 class="font-display font-semibold text-xl text-slate-900">Benthota Resort</h3>
            <p class="text-sm text-slate-500 mt-2">Luxury stays infused with wellness, comfort, and spa-inspired details.</p>
            <a href="#" class="inline-block mt-4 text-sm font-semibold text-amber-500 hover:text-amber-400 uppercase tracking-widest border-b border-amber-500 pb-1">Explore Benthota Resort</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Dynamic Rooms Section -->
  <section class="bg-slate-50 py-24 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center max-w-2xl mx-auto mb-16">
        <span class="text-amber-500 text-[10px] font-bold uppercase tracking-widest">Our Accommodations</span>
        <h2 class="font-display text-4xl sm:text-5xl font-bold text-slate-900 mt-4 font-semibold">Luxurious Rooms &amp; Suites</h2>
        <div class="h-1 w-20 bg-amber-400 mx-auto mt-6 mb-6"></div>
        <p class="text-slate-500 text-lg">Browse our hand-selected accommodations at our premier Benthota Resort.</p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        @forelse($rooms ?? [] as $r)
          <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 flex flex-col border border-slate-100 group">
            <!-- Room Image -->
            <div class="h-64 overflow-hidden relative bg-slate-100">
              @if($r->image)
                <img src="{{ asset('room_images/' . $r->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $r->title }}">
              @else
                <div class="w-full h-full bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center text-amber-500 font-display font-medium text-lg">
                  Benthota Luxury
                </div>
              @endif
              <div class="absolute top-4 right-4 bg-slate-900/90 text-white text-xs font-semibold px-3 py-1.5 rounded-full border border-white/10 uppercase tracking-wider backdrop-blur-sm">
                {{ $r->room_type }}
              </div>
            </div>

            <!-- Card Content Body -->
            <div class="p-6 flex-1 flex flex-col justify-between">
              <div>
                <!-- Hotel Location Badge -->
                <span class="text-[10px] uppercase font-bold text-amber-500 tracking-wider">
                  {{ $r->hotel_name }}
                </span>
                
                <h3 class="font-display font-bold text-2xl text-slate-900 mt-2 hover:text-amber-600 transition truncate" title="{{ $r->title }}">
                  {{ $r->title }}
                </h3>
                
                <p class="text-slate-500 text-sm mt-3 line-clamp-2" title="{{ $r->description }}">
                  {{ $r->description }}
                </p>

                <!-- Room Specifications -->
                <div class="flex items-center gap-6 mt-6 py-4 border-t border-b border-slate-100 text-xs text-slate-500 font-medium">
                  <div class="flex items-center gap-1.5">
                    <span>Adults: <strong>{{ $r->capacity_adults }}</strong></span>
                  </div>
                  <div class="flex items-center gap-1.5">
                    <span>Children: <strong>{{ $r->capacity_children }}</strong></span>
                  </div>
                  <div class="flex items-center gap-1.5">
                    @if($r->is_available)
                      <span class="text-emerald-600 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> Available
                      </span>
                    @else
                      <span class="text-rose-600 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 bg-rose-500 rounded-full"></span> Full
                      </span>
                    @endif
                  </div>
                </div>
              </div>

              <!-- Price & Booking Button -->
              <div class="flex items-center justify-between mt-6 pt-2">
                <div>
                  <span class="text-[10px] text-slate-400 uppercase font-bold tracking-wider block">Price per night</span>
                  <span class="text-2xl font-bold text-slate-900 font-display">${{ number_format($r->price_per_night, 2) }}</span>
                </div>
                <div>
                  <button type="button" data-room-id="{{ $r->id }}" data-room-title="{{ $r->title }}" class="open-reserve-modal inline-flex items-center justify-center bg-slate-900 hover:bg-amber-500 hover:text-slate-900 text-white font-bold text-[10px] tracking-widest uppercase px-5 py-3 rounded-lg transition duration-205 shadow-md">
                    Book Stay
                  </button>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-3 text-center py-12 text-slate-400">
            <svg class="w-16 h-16 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z"/>
            </svg>
            <p class="font-display text-xl text-slate-500 font-medium">No active rooms found</p>
            <p class="text-xs text-slate-400 mt-2">Check back soon for available suites and villas.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  @if(session()->has('message'))
    <div class="fixed top-5 right-5 z-50 rounded-lg bg-emerald-600 px-4 py-3 text-sm font-semibold text-white shadow-lg">
      {{ session()->get('message') }}
    </div>
  @endif

  <div id="reservation-modal" class="fixed inset-0 z-[60] hidden items-center justify-center bg-slate-950/70 px-4">
    <div class="w-full max-w-2xl rounded-2xl bg-white p-6 shadow-2xl">
      <div class="flex items-center justify-between mb-4">
        <div>
          <h3 class="text-xl font-bold text-slate-900">Reserve Your Stay</h3>
          <p id="modal-room-title" class="text-sm text-slate-500"></p>
        </div>
        <button type="button" id="close-reservation-modal" class="text-slate-500 hover:text-slate-900">✕</button>
      </div>
      <form action="{{ url('/reserve') }}" method="POST" class="grid gap-4 md:grid-cols-2">
        @csrf
        <input type="hidden" name="room_id" id="reservation-room-id">
        <input name="name" required placeholder="Your full name" class="border rounded px-3 py-2 md:col-span-2">
        <input name="email" type="email" required placeholder="Email address" class="border rounded px-3 py-2">
        <input name="phone" placeholder="Phone number" class="border rounded px-3 py-2">
        <input type="date" name="check_in_date" required class="border rounded px-3 py-2">
        <input type="date" name="check_out_date" required class="border rounded px-3 py-2">
        <input type="number" name="guests_count" min="1" value="1" required class="border rounded px-3 py-2">
        <textarea name="notes" rows="3" placeholder="Notes or arrival time" class="border rounded px-3 py-2 md:col-span-2"></textarea>
        <button class="md:col-span-2 rounded bg-amber-500 px-4 py-3 font-semibold text-white">Request Reservation</button>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const modal = document.getElementById('reservation-modal');
      const roomIdInput = document.getElementById('reservation-room-id');
      const roomTitle = document.getElementById('modal-room-title');
      const openButtons = document.querySelectorAll('.open-reserve-modal');
      const closeButton = document.getElementById('close-reservation-modal');

      openButtons.forEach((button) => {
        button.addEventListener('click', function () {
          roomIdInput.value = this.dataset.roomId;
          roomTitle.textContent = this.dataset.roomTitle;
          modal.classList.remove('hidden');
          modal.classList.add('flex');
        });
      });

      if (closeButton) {
        closeButton.addEventListener('click', function () {
          modal.classList.add('hidden');
          modal.classList.remove('flex');
        });
      }

      if (modal) {
        modal.addEventListener('click', function (event) {
          if (event.target === modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
          }
        });
      }
    });
  </script>

  <!-- Why Choose Us & Statistics -->
  <section class="bg-slate-900 text-white relative py-24 object-cover" style="background-image: linear-gradient(rgba(15,23,42,0.85), rgba(15,23,42,0.85)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1920&q=80'); background-attachment: fixed; background-size: cover; background-position: center;">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid md:grid-cols-2 gap-16 items-center">
        <div>
          <span class="text-amber-400 text-[10px] font-bold uppercase tracking-widest">The Benthota Difference</span>
          <h2 class="font-display text-4xl sm:text-5xl font-bold mt-4 leading-tight">Elevating the Art of Hospitality</h2>
          <p class="mt-6 text-white/80 text-lg leading-relaxed mb-8">
            From the moment you arrive, you'll experience a level of service and comfort unmatched on the Sri Lankan Coast. We prioritize your peace, relaxation, and bespoke requirements.
          </p>
          <ul class="space-y-4">
            <li class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-full bg-amber-500/20 text-amber-400 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              </div>
              <span class="font-medium text-lg">Award-Winning Service</span>
            </li>
            <li class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-full bg-amber-500/20 text-amber-400 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              </div>
              <span class="font-medium text-lg">Exclusive Private Beaches</span>
            </li>
            <li class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-full bg-amber-500/20 text-amber-400 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              </div>
              <span class="font-medium text-lg">Curated Culinary Experiences</span>
            </li>
          </ul>
        </div>
        
        <div class="grid grid-cols-2 gap-8">
          <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 text-center border border-white/20">
            <div class="text-4xl text-amber-400 font-bold font-display mb-2">3</div>
            <div class="text-sm font-semibold uppercase tracking-widest text-white/80">Luxury Properties</div>
          </div>
          <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 text-center border border-white/20">
            <div class="text-4xl text-amber-400 font-bold font-display mb-2">15+</div>
            <div class="text-sm font-semibold uppercase tracking-widest text-white/80">Years of Excellence</div>
          </div>
          <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 text-center border border-white/20">
            <div class="text-4xl text-amber-400 font-bold font-display mb-2">45k</div>
            <div class="text-sm font-semibold uppercase tracking-widest text-white/80">Happy Guests</div>
          </div>
          <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 text-center border border-white/20">
            <div class="text-4xl text-amber-400 font-bold font-display mb-2">5</div>
            <div class="text-sm font-semibold uppercase tracking-widest text-white/80">Star Dining Rooms</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Amenities Grid -->
  <section class="bg-slate-50 py-24 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-16">
        <span class="text-amber-500 text-[10px] font-bold uppercase tracking-widest">Premium Features</span>
        <h2 class="font-display text-4xl font-bold text-slate-900 mt-4">Resort Amenities</h2>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-3 gap-12 text-center">
        <div>
          <div class="w-16 h-16 rounded-full bg-slate-900 text-amber-400 flex items-center justify-center mx-auto mb-6 shadow-xl">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v18M3 12h18"/></svg>
          </div>
          <h3 class="font-display font-bold text-lg text-slate-900">Private Beach Access</h3>
          <p class="text-sm text-slate-500 mt-3 leading-relaxed">Direct access to pristine, groomed private beach areas with complimentary chairs and umbrellas.</p>
        </div>
        <div>
          <div class="w-16 h-16 rounded-full bg-slate-900 text-amber-400 flex items-center justify-center mx-auto mb-6 shadow-xl">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 12h16M4 6h16M4 18h16"/></svg>
          </div>
          <h3 class="font-display font-bold text-lg text-slate-900">Rooftop Dining</h3>
          <p class="text-sm text-slate-500 mt-3 leading-relaxed">Experience our award-winning seasonal menus with panoramic ocean views at our signature restaurants.</p>
        </div>
        <div>
          <div class="w-16 h-16 rounded-full bg-slate-900 text-amber-400 flex items-center justify-center mx-auto mb-6 shadow-xl">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3"/></svg>
          </div>
          <h3 class="font-display font-bold text-lg text-slate-900">24/7 Room Service</h3>
          <p class="text-sm text-slate-500 mt-3 leading-relaxed">Enjoy our curated menu from the comfort of your suite, available around the clock.</p>
        </div>
        <div>
          <div class="w-16 h-16 rounded-full bg-slate-900 text-amber-400 flex items-center justify-center mx-auto mb-6 shadow-xl">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/></svg>
          </div>
          <h3 class="font-display font-bold text-lg text-slate-900">World-Class Spa</h3>
          <p class="text-sm text-slate-500 mt-3 leading-relaxed">Rejuvenate with custom treatments, deep tissue massages, and holistic wellness programs.</p>
        </div>
        <div>
          <div class="w-16 h-16 rounded-full bg-slate-900 text-amber-400 flex items-center justify-center mx-auto mb-6 shadow-xl">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
          </div>
          <h3 class="font-display font-bold text-lg text-slate-900">Fitness Center</h3>
          <p class="text-sm text-slate-500 mt-3 leading-relaxed">State-of-the-art Peloton bikes, free weights, and daily yoga classes on the beach.</p>
        </div>
        <div>
          <div class="w-16 h-16 rounded-full bg-slate-900 text-amber-400 flex items-center justify-center mx-auto mb-6 shadow-xl">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
          </div>
          <h3 class="font-display font-bold text-lg text-slate-900">Event Spaces</h3>
          <p class="text-sm text-slate-500 mt-3 leading-relaxed">Custom packages for beach weddings, corporate retreats, and private waterfront events.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Special Offers -->
  <section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex justify-between items-end mb-12">
        <div>
          <span class="text-amber-500 text-[10px] font-bold uppercase tracking-widest">Limited Time Deals</span>
          <h2 class="font-display text-4xl font-bold text-slate-900 mt-3">Special Offers</h2>
        </div>
        <a href="#" class="text-sm font-semibold text-amber-600 hover:text-amber-500">View All Offers &rarr;</a>
      </div>
      <div class="grid md:grid-cols-2 gap-8">
        <div class="rounded-2xl overflow-hidden flex flex-col sm:flex-row bg-slate-50 shadow-md group">
          <div class="sm:w-2/5 h-48 sm:h-auto bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=600&q=80')"></div>
          <div class="p-8 sm:w-3/5 flex flex-col justify-center">
            <div class="uppercase tracking-widest text-[10px] font-bold text-amber-500 mb-2">Summer 2026</div>
            <h3 class="font-display text-xl font-bold text-slate-900 mb-3">Weekend Escape - 20% Off</h3>
            <p class="text-slate-500 text-sm mb-6">Book a 3-night stay this weekend and enjoy 20% off your entire booking plus complimentary breakfast.</p>
            <a href="#" class="text-sm font-bold text-slate-900 border-b-2 border-slate-900 pb-1 self-start inline-block group-hover:text-amber-500 group-hover:border-amber-500 transition">Claim Offer</a>
          </div>
        </div>
        <div class="rounded-2xl overflow-hidden flex flex-col sm:flex-row bg-slate-50 shadow-md group">
          <div class="sm:w-2/5 h-48 sm:h-auto bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=600&q=80')"></div>
          <div class="p-8 sm:w-3/5 flex flex-col justify-center">
            <div class="uppercase tracking-widest text-[10px] font-bold text-amber-500 mb-2">Spa & Wellness</div>
            <h3 class="font-display text-xl font-bold text-slate-900 mb-3">Couples Retreat Package</h3>
            <p class="text-slate-500 text-sm mb-6">Includes two 60-minute deep tissue massages, champagne on arrival, and late check-out at 2 PM.</p>
            <a href="#" class="text-sm font-bold text-slate-900 border-b-2 border-slate-900 pb-1 self-start inline-block group-hover:text-amber-500 group-hover:border-amber-500 transition">Claim Offer</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="py-24 bg-slate-900 text-white overflow-hidden">
    <div class="max-w-4xl mx-auto px-6 text-center">
      <span class="text-amber-400 text-[10px] font-bold uppercase tracking-widest">Guest Experiences</span>
      <h2 class="font-display text-4xl font-bold mt-4 mb-16">What Our Guests Say</h2>
      
      <div class="swiper testimonialSwiper pb-12">
        <div class="swiper-wrapper">
          <!-- Slide 1 -->
          <div class="swiper-slide cursor-grab">
            <svg class="w-10 h-10 mx-auto text-amber-400/50 mb-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
            <p class="text-xl md:text-2xl font-display font-medium text-white/90 leading-relaxed italic mb-8">
              "An absolutely perfect honeymoon destination. The Ocean View Suite at Benthota Resort exceeded every expectation. We will be coming back every anniversary if we can help it!"
            </p>
            <div class="font-bold text-amber-400">Sarah & James T.</div>
            <div class="text-sm text-white/50 mt-1">Stayed July 2025</div>
          </div>
          <!-- Slide 2 -->
          <div class="swiper-slide cursor-grab">
            <svg class="w-10 h-10 mx-auto text-amber-400/50 mb-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
            <p class="text-xl md:text-2xl font-display font-medium text-white/90 leading-relaxed italic mb-8">
              "The 24/7 service and tropical dining at Benthota Resort made our corporate retreat wildly successful. The attention to detail from the staff is just incredible."
            </p>
            <div class="font-bold text-amber-400">Michael R.</div>
            <div class="text-sm text-white/50 mt-1">Stayed September 2025</div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

  <!-- Gallery -->
  <section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="font-display text-4xl font-bold text-slate-900">Resort Gallery</h2>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="h-64 bg-cover bg-center rounded-lg col-span-2 row-span-2" style="background-image:url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=80')"></div>
        <div class="h-64 bg-cover bg-center rounded-lg" style="background-image:url('https://images.unsplash.com/photo-1499793983690-e29da59ef1c2?auto=format&fit=crop&w=400&q=80')"></div>
        <div class="h-64 bg-cover bg-center rounded-lg" style="background-image:url('https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=400&q=80')"></div>
        <div class="h-64 bg-cover bg-center rounded-lg" style="background-image:url('https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=400&q=80')"></div>
        <div class="h-64 bg-cover bg-center rounded-lg" style="background-image:url('https://images.unsplash.com/photo-1610641818989-c2051b5e2cfd?auto=format&fit=crop&w=400&q=80')"></div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="py-24 bg-slate-50">
    <div class="max-w-3xl mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="font-display text-4xl font-bold text-slate-900">Frequently Asked Questions</h2>
      </div>
      <div class="space-y-4">
        <details class="bg-white p-6 rounded-lg shadow-sm group cursor-pointer">
          <summary class="font-semibold text-slate-900 text-lg flex items-center justify-between list-none">
            What time is check-in and check-out?
            <span class="transition group-open:rotate-180">
              <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"><polyline points="6 9 12 15 18 9"/></svg>
            </span>
          </summary>
          <div class="mt-4 text-slate-500 leading-relaxed">
            Check-in time starts at 3:00 PM, and check-out is exactly at 11:00 PM. Early check-ins and late check-outs can be requested but are strictly subject to availability.
          </div>
        </details>
        <details class="bg-white p-6 rounded-lg shadow-sm group cursor-pointer">
          <summary class="font-semibold text-slate-900 text-lg flex items-center justify-between list-none">
            Are the properties pet-friendly?
            <span class="transition group-open:rotate-180">
              <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"><polyline points="6 9 12 15 18 9"/></svg>
            </span>
          </summary>
          <div class="mt-4 text-slate-500 leading-relaxed">
            We love animals, but to ensure the luxury experience and allergy-safety for all guests, pets are currently not permitted at our resort. Service animals are always welcome.
          </div>
        </details>
        <details class="bg-white p-6 rounded-lg shadow-sm group cursor-pointer">
          <summary class="font-semibold text-slate-900 text-lg flex items-center justify-between list-none">
            Is parking included in the reservation?
            <span class="transition group-open:rotate-180">
              <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"><polyline points="6 9 12 15 18 9"/></svg>
            </span>
          </summary>
          <div class="mt-4 text-slate-500 leading-relaxed">
            Yes, complimentary valet parking is included with every suite reservation. Self-parking options are also available on-site for no additional fee.
          </div>
        </details>
      </div>
    </div>
  </section>

  <!-- Newsletter -->
  <section class="max-w-7xl mx-auto px-6 py-24">
    <div class="rounded-2xl bg-slate-900 text-white px-10 py-16 text-center relative overflow-hidden shadow-2xl flex flex-col md:flex-row items-center justify-between gap-10">
      <div class="md:w-1/2 text-left z-10">
        <h2 class="font-display text-3xl sm:text-4xl font-bold mb-4">Join the Benthota Family</h2>
        <p class="text-white/70 text-lg">Sign up for special offers, seasonal packages, and insider access to our newest luxury properties.</p>
      </div>
      <div class="md:w-1/2 w-full z-10">
        <form class="flex flex-col sm:flex-row gap-3">
          <input type="email" placeholder="Enter your email address" class="flex-1 bg-white/10 border border-white/20 text-white placeholder-white/50 px-6 py-4 rounded-lg focus:outline-none focus:border-amber-400" required>
          <button type="submit" class="bg-amber-500 hover:bg-amber-400 text-slate-900 font-bold tracking-widest uppercase text-sm px-8 py-4 rounded-lg transition shadow-xl">
            Subscribe
          </button>
        </form>
      </div>
      <!-- Background Abstract Shape -->
      <div class="absolute -right-20 -top-20 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
    </div>
  </section>

  <!-- Footer -->
  @include('home.footer')

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".heroSwiper", {
      spaceBetween: 0,
      effect: "fade",
      speed: 1500,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
    });

    var testimonialSwiper = new Swiper(".testimonialSwiper", {
      spaceBetween: 30,
      speed: 800,
      loop: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: true,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>
</body>
</html>