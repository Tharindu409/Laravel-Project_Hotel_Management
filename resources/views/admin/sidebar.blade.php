 <aside class="w-64 bg-slate-900 text-white flex flex-col">
    <div class="p-6 text-2xl font-bold border-b border-slate-700">
      Resort Admin
    </div>

    <nav class="flex-1 p-4 text-sm overflow-y-auto">
      <ul class="space-y-2">
        <li><a href="#" class="block py-2 px-3 rounded bg-slate-800 font-medium">📊 Dashboard</a></li>
        
        <!-- Rooms Menu with Submenu -->
        <li>
          <a href="#" class="block py-2 px-3 rounded hover:bg-slate-800 font-medium">🛏️ Rooms</a>
          <ul class="pl-8 mt-1 space-y-1">
          <!-- can scroll the options-->
            <li>
              <a href="{{url('create_room')}}" class="block py-1.5 px-3 rounded text-slate-400 hover:text-white hover:bg-slate-800 text-xs"> Add Room</a>
            </li>

            <li>
              <a href="{{url('view_room')}}" class="block py-1.5 px-3 rounded text-slate-400 hover:text-white hover:bg-slate-800 text-xs"> View Rooms</a>
            </li>
            
          </ul>
        </li>

        <li><a href="{{ url('/bookings') }}" class="block py-2 px-3 rounded hover:bg-slate-800 font-medium">📅 Bookings</a></li>
        <li><a href="{{ url('/customers') }}" class="block py-2 px-3 rounded hover:bg-slate-800 font-medium">👤 Customers</a></li>
        <li><a href="{{ url('/payments') }}" class="block py-2 px-3 rounded hover:bg-slate-800 font-medium">💳 Payments</a></li>
        <li><a href="#" class="block py-2 px-3 rounded hover:bg-slate-800 font-medium">👨‍💼 Staff</a></li>
        <li><a href="#" class="block py-2 px-3 rounded hover:bg-slate-800 font-medium">🧹 Maintenance</a></li>
        <li><a href="#" class="block py-2 px-3 rounded hover:bg-slate-800 font-medium">📈 Reports</a></li>
        <li><a href="#" class="block py-2 px-3 rounded hover:bg-slate-800 font-medium">⚙️ Settings</a></li>
      </ul>
    </nav>
    

    <div class="p-4 border-t border-slate-700 text-sm">
      <p class="text-gray-400">Logged in as</p>
      <p class="font-semibold">{{ Auth::user()->name }}</p>
    </div>
  </aside>