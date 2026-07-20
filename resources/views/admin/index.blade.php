<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 font-sans">

<div class="flex h-screen">

  <!-- Sidebar -->
  <aside class="w-64 bg-slate-900 text-white flex flex-col">
    <div class="p-6 text-2xl font-bold border-b border-slate-700">
      Hotel Admin
    </div>

    <nav class="flex-1 p-4 space-y-2 text-sm">
      <a href="#" class="block py-2 px-3 rounded bg-slate-800">📊 Dashboard</a>
      <a href="#" class="block py-2 px-3 rounded hover:bg-slate-800">🛏️ Rooms</a>
      <a href="#" class="block py-2 px-3 rounded hover:bg-slate-800">📅 Bookings</a>
      <a href="#" class="block py-2 px-3 rounded hover:bg-slate-800">👤 Customers</a>
      <a href="#" class="block py-2 px-3 rounded hover:bg-slate-800">💳 Payments</a>
      <a href="#" class="block py-2 px-3 rounded hover:bg-slate-800">👨‍💼 Staff</a>
      <a href="#" class="block py-2 px-3 rounded hover:bg-slate-800">🧹 Maintenance</a>
      <a href="#" class="block py-2 px-3 rounded hover:bg-slate-800">📈 Reports</a>
      <a href="#" class="block py-2 px-3 rounded hover:bg-slate-800">⚙️ Settings</a>
    </nav>

    <div class="p-4 border-t border-slate-700 text-sm">
      <p class="text-gray-400">Logged in as</p>
      <p class="font-semibold">{{ Auth::user()->name }}</p>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col">

    <!-- Top Navbar -->
    @include('admin.header')

    <!-- Content -->
    <main class="p-6 overflow-y-auto">

      <!-- Stats -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

        <div class="bg-white p-4 rounded shadow">
          <p class="text-gray-500 text-sm">Total Rooms</p>
          <h2 class="text-2xl font-bold">120</h2>
        </div>

        <div class="bg-white p-4 rounded shadow">
          <p class="text-gray-500 text-sm">Bookings</p>
          <h2 class="text-2xl font-bold">58</h2>
        </div>

        <div class="bg-white p-4 rounded shadow">
          <p class="text-gray-500 text-sm">Customers</p>
          <h2 class="text-2xl font-bold">245</h2>
        </div>

        <div class="bg-white p-4 rounded shadow">
          <p class="text-gray-500 text-sm">Revenue</p>
          <h2 class="text-2xl font-bold">$12,400</h2>
        </div>

      </div>

      <!-- Charts Section Row 1 -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        
        <!-- Bookings Chart -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 lg:col-span-2">
          <div class="flex justify-between items-center mb-4">
            <h3 class="font-bold text-slate-800 text-lg">Bookings Overview</h3>
            <span class="text-xs font-semibold bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full">+12.5% This Week</span>
          </div>
          <div class="relative h-72 w-full">
            <canvas id="bookingsChart"></canvas>
          </div>
        </div>

        <!-- Occupancy Chart -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex flex-col items-center">
          <h3 class="font-bold text-slate-800 text-lg w-full text-left mb-6">Room Occupancy</h3>
          <div class="relative h-56 w-full flex justify-center">
            <canvas id="occupancyChart"></canvas>
          </div>
        </div>
      </div>

      <!-- Charts Section Row 2 & Recent Bookings -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        
        <!-- Revenue Chart -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
          <h3 class="font-bold text-slate-800 text-lg mb-4">Revenue Analytics</h3>
          <div class="relative h-64 w-full">
            <canvas id="revenueChart"></canvas>
          </div>
        </div>
        

        <!-- Recent Bookings -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
          <div class="flex justify-between items-center mb-6">
            <h3 class="font-bold text-slate-800 text-lg">Recent Bookings</h3>
            <a href="#" class="text-sm font-semibold text-amber-500 hover:text-amber-600 transition">View All</a>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
              <thead class="text-xs text-slate-500 uppercase bg-slate-50 text-left">
                <tr>
                  <th class="px-4 py-3 rounded-l-lg">Customer</th>
                  <th class="px-4 py-3">Room</th>
                  <th class="px-4 py-3">Date</th>
                  <th class="px-4 py-3 rounded-r-lg text-right">Status</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100">
                <tr class="hover:bg-slate-50 transition">
                  <td class="px-4 py-3 font-semibold text-slate-800">John Doe</td>
                  <td class="px-4 py-3 text-slate-500">Deluxe Room</td>
                  <td class="px-4 py-3 text-slate-500">2026-07-05</td>
                  <td class="px-4 py-3 text-right"><span class="bg-emerald-100 text-emerald-700 font-bold px-3 py-1 rounded text-[10px] uppercase tracking-wider">Confirmed</span></td>
                </tr>
                <tr class="hover:bg-slate-50 transition">
                  <td class="px-4 py-3 font-semibold text-slate-800">Sarah Lee</td>
                  <td class="px-4 py-3 text-slate-500">Suite</td>
                  <td class="px-4 py-3 text-slate-500">2026-07-04</td>
                  <td class="px-4 py-3 text-right"><span class="bg-amber-100 text-amber-700 font-bold px-3 py-1 rounded text-[10px] uppercase tracking-wider">Pending</span></td>
                </tr>
                <tr class="hover:bg-slate-50 transition">
                  <td class="px-4 py-3 font-semibold text-slate-800">Michael Smith</td>
                  <td class="px-4 py-3 text-slate-500">Standard</td>
                  <td class="px-4 py-3 text-slate-500">2026-07-03</td>
                  <td class="px-4 py-3 text-right"><span class="bg-red-100 text-red-700 font-bold px-3 py-1 rounded text-[10px] uppercase tracking-wider">Cancelled</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </main>

    <!-- Admin Footer -->
    @include('admin.footer')

  </div>
</div>

<script>
  /* ----------------------------
     BOOKINGS LINE CHART
  ---------------------------- */
  new Chart(document.getElementById('bookingsChart'), {
      type: 'line',
      data: {
          labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
          datasets: [{
              label: 'Bookings',
              data: [5, 8, 6, 12, 9, 15, 11],
              borderColor: '#f59e0b',
              backgroundColor: 'rgba(245, 158, 11, 0.2)',
              fill: true,
              tension: 0.4
          }]
      },
      options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
              legend: { display: false }
          }
      }
  });
  
  /* ----------------------------
     REVENUE BAR CHART
  ---------------------------- */
  new Chart(document.getElementById('revenueChart'), {
      type: 'bar',
      data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
          datasets: [{
              label: 'Revenue ($)',
              data: [12000, 15000, 18000, 14000, 22000, 26000],
              backgroundColor: '#0f172a',
              borderRadius: 4
          }]
      },
      options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
              legend: { display: false }
          }
      }
  });
  
  /* ----------------------------
     ROOM OCCUPANCY PIE CHART
  ---------------------------- */
  new Chart(document.getElementById('occupancyChart'), {
      type: 'doughnut',
      data: {
          labels: ['Occupied', 'Available', 'Maintenance'],
          datasets: [{
              data: [65, 25, 10],
              backgroundColor: [
                  '#10b981',
                  '#f59e0b',
                  '#ef4444'
              ],
              borderWidth: 0,
              hoverOffset: 4
          }]
      },
      options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
              legend: { 
                  position: 'bottom',
                  labels: { padding: 20, usePointStyle: true }
              }
          },
          cutout: '70%'
      }
  });
</script>
</body>
</html>