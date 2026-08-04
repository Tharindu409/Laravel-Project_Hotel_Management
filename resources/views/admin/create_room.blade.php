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

        <!-- Success Message Alert -->
        @if(session()->has('message'))
          <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 font-medium flex justify-between items-center">
            <span>{{ session()->get('message') }}</span>
            <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800 font-bold">&times;</button>
          </div>
        @endif

       <!-- Form Card -->
<div class="bg-white rounded-lg border border-gray-200 shadow-sm p-6">
  <!-- Display Errors -->
@if ($errors->any())
    <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Display Success Message -->
@if(session()->has('message'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
        {{ session()->get('message') }}
    </div>
@endif
  <form action="{{ url('add_room') }}" method="post" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

      <!-- Room Title -->
      <div class="md:col-span-2">
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Room Title / Name</label>
        <input type="text" name="title" id="title" required placeholder="e.g. Deluxe Ocean View Suite" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
      </div>

      <!-- Property Name -->
      <div>
        <label for="hotel_name" class="block text-sm font-medium text-gray-700 mb-1">Property Name</label>
        <select name="hotel_name" id="hotel_name" required class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:border-blue-500">
          <option value="Benthota Resort" selected>Benthota Resort</option>
        </select>
      </div>

      <!-- Room Type -->
      <div>
        <label for="room_type" class="block text-sm font-medium text-gray-700 mb-1">Room Type</label>
        <select name="room_type" id="room_type" required class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:border-blue-500">
          <option value="" disabled selected>Select Room Type</option>
          <option value="Single">Single</option>
          <option value="Double">Double</option>
          <option value="Deluxe">Deluxe</option>
          <option value="Suite">Suite</option>
        </select>
      </div>

      <!-- Capacity Adults -->
      <div>
        <label for="capacity_adults" class="block text-sm font-medium text-gray-700 mb-1">Adult Capacity</label>
        <input type="number" min="1" name="capacity_adults" id="capacity_adults" placeholder="e.g. 2" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
      </div>

      <!-- Capacity Children -->
      <div>
        <label for="capacity_children" class="block text-sm font-medium text-gray-700 mb-1">Children Capacity</label>
        <input type="number" min="0" name="capacity_children" id="capacity_children" placeholder="e.g. 1" value="0" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
      </div>

      <div>
  <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price per Night ($)</label>
  <input 
    type="number" 
    step="0.01" 
    name="price" 
    id="price" 
    required 
    placeholder="0.00" 
    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
  >
</div>

      <!-- Image Upload -->
      <div>
        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Room Image</label>
        <input type="file" name="image" id="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 cursor-pointer">
      </div>

      <!-- WiFi Availability -->
      <div>
        <label for="wifi" class="block text-sm font-medium text-gray-700 mb-1">Free WiFi</label>
        <select name="wifi" id="wifi" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:border-blue-500">
          <option value="1">Available</option>
          <option value="0">Not Available</option>
        </select>
      </div>

      <!-- Room Availability -->
      <div>
        <label for="is_available" class="block text-sm font-medium text-gray-700 mb-1">Availability Status</label>
        <select name="is_available" id="is_available" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:border-blue-500">
          <option value="1">Available</option>
          <option value="0">Booked / Maintenance</option>
        </select>
      </div>
    </div>

    <!-- Description -->
    <div>
      <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
      <textarea name="description" id="description" rows="3" placeholder="Enter room details..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"></textarea>
    </div>

    <!-- Checkbox -->
    <div class="flex items-center">
      <input type="checkbox" name="is_featured" id="is_featured" value="1" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
      <label for="is_featured" class="ml-2 text-sm text-gray-700 font-medium">Feature on Homepage</label>
    </div>

    <!-- Submit Button -->
    <div class="pt-2">
      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-150">
        Add Room
      </button>
    </div>

  </form>
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