<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Rooms - Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>

<body class="bg-gray-50 text-slate-800 h-screen overflow-hidden">

<div class="flex h-screen">
  <!-- Sidebar -->
  @include('admin.sidebar')

  <!-- Main Content -->
  <div class="flex-1 flex flex-col h-screen overflow-hidden">
    <!-- Top Navbar -->
    @include('admin.header')

    <!-- Content -->
    <main class="flex-1 overflow-y-auto p-6 lg:p-10 bg-slate-50/50">
      
      <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
          <div>
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-slate-800 to-slate-500">
              All Rooms
            </h1>
            <p class="text-slate-500 mt-2">Manage and monitor all rooms in the hotel database.</p>
          </div>
           
        </div>

        <!-- Success/Error Message Alerts -->
        @if(session()->has('message'))
          <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 font-medium flex justify-between items-center transition duration-150 shadow-sm">
            <span>{{ session()->get('message') }}</span>
            <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800 font-bold">&times;</button>
          </div>
        @endif

        @if(session()->has('error'))
          <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 font-medium flex justify-between items-center transition duration-150 shadow-sm">
            <span>{{ session()->get('error') }}</span>
            <button onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-800 font-bold">&times;</button>
          </div>
        @endif

        <!-- Rooms Table Card -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
          <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
              <thead class="text-xs text-slate-500 uppercase bg-slate-50 border-b border-slate-200">
                <tr>
                  <th class="px-6 py-4 font-semibold">Room Details</th>
                  <th class="px-6 py-4 font-semibold">Location / Hotel</th>
                  <th class="px-6 py-4 font-semibold">Type</th>
                  <th class="px-6 py-4 font-semibold">Capacity</th>
                  <th class="px-6 py-4 font-semibold">Price per Night</th>
                  <th class="px-6 py-4 font-semibold">Status</th>
                  <th class="px-6 py-4 font-semibold">Featured</th>
                  <th class="px-6 py-4 font-semibold text-center">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100">
                @forelse($rooms as $room)
                  <tr class="hover:bg-slate-50/75 transition duration-150">
                    <!-- Room Details (Image + Name/Title) -->
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center gap-4">
                        <div class="h-14 w-20 flex-shrink-0 rounded-lg overflow-hidden border border-slate-200 bg-slate-100 flex items-center justify-center">
                          @if($room->image)
                            <img src="{{ asset('room_images/' . $room->image) }}" class="h-full w-full object-cover" alt="{{ $room->title }}">
                          @else
                            <!-- Placeholder -->
                            <div class="h-full w-full bg-gradient-to-br from-indigo-500 to-purple-600 flex flex-col items-center justify-center text-white text-[10px] font-bold uppercase tracking-wider">
                              <span>No Img</span>
                            </div>
                          @endif
                        </div>
                        <div class="flex flex-col">
                          <span class="font-bold text-slate-800 text-[15px]">{{ $room->title }}</span>
                          <span class="text-xs text-slate-400 mt-1 max-w-[200px] truncate" title="{{ $room->description }}">{{ $room->description }}</span>
                        </div>
                      </div>
                    </td>

                    <!-- Hotel Name -->
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-slate-600">
                      {{ $room->hotel_name ?? 'N/A' }}
                    </td>

                    <!-- Room Type -->
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-slate-600">
                      <span class="bg-slate-100 border border-slate-200 text-slate-700 px-2.5 py-1 rounded text-xs">
                        {{ $room->room_type }}
                      </span>
                    </td>

                    <!-- Capacity -->
                    <td class="px-6 py-4 whitespace-nowrap text-slate-600">
                      <div class="flex flex-col gap-0.5 text-xs">
                        <span class="font-medium">Adults: <strong class="text-slate-800">{{ $room->capacity_adults }}</strong></span>
                        <span class="text-slate-400">Children: {{ $room->capacity_children }}</span>
                      </div>
                    </td>

                    <!-- Price per Night -->
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="text-base font-bold text-blue-655 text-blue-600">${{ number_format($room->price_per_night, 2) }}</span>
                    </td>

                    <!-- Availability Status -->
                    <td class="px-6 py-4 whitespace-nowrap">
                      @if($room->is_available)
                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-100 font-semibold px-2.5 py-1 rounded-full text-xs">
                          <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                          Available
                        </span>
                      @else
                        <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-100 font-semibold px-2.5 py-1 rounded-full text-xs">
                          <span class="w-1.5 h-1.5 bg-rose-500 rounded-full"></span>
                          Booked / Mainten.
                        </span>
                      @endif
                    </td>

                    <!-- Featured -->
                    <td class="px-6 py-4 whitespace-nowrap">
                      @if($room->is_featured)
                        <span class="inline-flex items-center gap-1 bg-amber-50 text-amber-700 border border-amber-200 font-semibold px-2.5 py-0.5 rounded text-xs">
                          ★ Featured
                        </span>
                      @else
                        <span class="text-slate-400 text-xs">-</span>
                      @endif
                    </td>

                    <!-- Actions -->
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                      <div class="flex items-center justify-center gap-3">
                        <!-- Edit Button -->
                        <a href="{{ url('edit_room', $room->id) }}" class="inline-flex items-center justify-center p-2 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 transition duration-150" title="Edit Room">
                          <svg class="w-5 h-5 animate-hover-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                          </svg>
                        </a>
                        
                        <!-- Delete Button -->
                        <a href="{{ url('delete_room', $room->id) }}" onclick="return confirm('Are you sure you want to delete this room?');" class="inline-flex items-center justify-center p-2 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 transition duration-150" title="Delete Room">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                          </svg>
                        </a>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="8" class="px-6 py-12 text-center text-slate-400">
                      <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z"/>
                      </svg>
                      <p class="font-medium text-slate-500">No rooms found in database</p>
                      <p class="text-xs text-slate-400 mt-1">Get started by creating a new room profile.</p>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
      
    </main>

    <!-- Footer -->
    @if(View::exists('admin.footer'))
      @include('admin.footer')
    @endif

  </div>
</div>

</body>
</html>