<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Room - Admin Dashboard</title>
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
      
      <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
          <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-slate-800 to-slate-500">
            Add New Room
          </h1>
          <p class="text-slate-500 mt-2">Fill in the details below to add a new room to your property.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-8">
          <form action="{{ url('store_room') }}" method="post" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Room Type -->
              <div class="space-y-2">
                <label for="room_type" class="block text-sm font-semibold text-slate-700">Room Type</label>
                <select name="room_type" id="room_type" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none">
                    <option value="" disabled selected>Select Room Type</option>
                    <option value="Single">Single</option>
                    <option value="Double">Double</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Suite">Suite</option>
                </select>
              </div>

              <!-- Capacity -->
              <div class="space-y-2">
                <label for="capacity" class="block text-sm font-semibold text-slate-700">Capacity (Persons)</label>
                <input type="number" min="1" name="capacity" id="capacity" placeholder="e.g. 2" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none">
              </div>

              <!-- Price -->
              <div class="space-y-2">
                <label for="price" class="block text-sm font-semibold text-slate-700">Price per Night ($)</label>
                <div class="relative">
                  <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 font-medium">$</span>
                  <input type="number" min="0" step="0.01" name="price" id="price" placeholder="0.00" class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none">
                </div>
              </div>
              
              <!-- Image Upload -->
              <div class="space-y-2">
                <label for="image" class="block text-sm font-semibold text-slate-700">Room Image</label>
                <input type="file" name="image" id="image" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-all cursor-pointer text-slate-500 focus:outline-none">
              </div>
            </div>

            <!-- Description -->
            <div class="space-y-2">
              <label for="description" class="block text-sm font-semibold text-slate-700">Description</label>
              <textarea name="description" id="description" rows="4" placeholder="Enter a detailed description of the room..." class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none resize-none"></textarea>
            </div>

            <div>
              <label class="flex items-center space-x-2">Free Wifi</label>
               <select>
                <option value="1">Available</option>
                <option value="0">Not Available</option>
               </select>
              
            </div>

            <!-- Submit Button -->
            <div class="pt-4 flex justify-end">
              <button type="submit" class="px-8 py-3.5 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-xl shadow-lg shadow-slate-900/20 hover:shadow-xl hover:shadow-slate-900/30 hover:-translate-y-0.5 transition-all duration-200">
                Add Room
              </button>
            </div>
            
          </form>
        </div>
      </div>
      
    </main>

    <!-- Footer -->
    {{-- Assuming there is a footer component --}}
    @if(View::exists('admin.footer'))
        @include('admin.footer')
    @endif
  </div>
</div>

</body>
</html>
