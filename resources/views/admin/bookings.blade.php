<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookings - Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-slate-800">
<div class="flex min-h-screen">
  @include('admin.sidebar')
  <div class="flex-1 flex flex-col">
    @include('admin.header')
    <main class="p-6">
      <div class="flex justify-between items-center mb-6">
        <div>
          <h1 class="text-3xl font-bold">Booking Management</h1>
          <p class="text-slate-500">Search availability, confirm reservations, and manage check-in/out.</p>
        </div>
      </div>
      @if(session()->has('message'))
        <div class="mb-4 rounded bg-emerald-50 p-3 text-emerald-700">{{ session()->get('message') }}</div>
      @endif
      <div class="bg-white rounded-xl shadow p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Create Booking</h2>
        <form action="{{ url('/bookings') }}" method="POST" class="grid gap-4 md:grid-cols-2">
          @csrf
          <select name="customer_id" required class="border rounded px-3 py-2">
            <option value="">Select customer</option>
            @foreach($customers as $customer)
              <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
          </select>
          <select name="room_id" required class="border rounded px-3 py-2">
            <option value="">Select room</option>
            @foreach($rooms as $room)
              <option value="{{ $room->id }}">{{ $room->title }} - ${{ number_format($room->price_per_night, 2) }}</option>
            @endforeach
          </select>
          <input type="date" name="check_in_date" required class="border rounded px-3 py-2">
          <input type="date" name="check_out_date" required class="border rounded px-3 py-2">
          <input type="number" name="guests_count" min="1" value="1" required class="border rounded px-3 py-2">
          <select name="status" class="border rounded px-3 py-2">
            <option value="pending">Pending</option>
            <option value="confirmed">Confirmed</option>
          </select>
          <textarea name="notes" rows="2" placeholder="Notes" class="md:col-span-2 border rounded px-3 py-2"></textarea>
          <button class="md:col-span-2 bg-amber-500 text-white px-4 py-2 rounded">Create Booking</button>
        </form>
      </div>
      <div class="bg-white rounded-xl shadow p-6 overflow-x-auto">
        <h2 class="text-xl font-semibold mb-4">Booking List</h2>
        <table class="min-w-full text-sm">
          <thead>
            <tr class="text-left text-slate-500">
              <th class="py-2">Guest</th>
              <th class="py-2">Room</th>
              <th class="py-2">Dates</th>
              <th class="py-2">Total</th>
              <th class="py-2">Status</th>
              <th class="py-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($bookings as $booking)
              <tr class="border-t">
                <td class="py-2">{{ $booking->customer->name ?? 'N/A' }}</td>
                <td class="py-2">{{ $booking->room->title ?? 'N/A' }}</td>
                <td class="py-2">{{ $booking->check_in_date->format('Y-m-d') }} → {{ $booking->check_out_date->format('Y-m-d') }}</td>
                <td class="py-2">${{ number_format($booking->total_price, 2) }}</td>
                <td class="py-2">{{ ucfirst($booking->status) }}</td>
                <td class="py-2 space-x-2">
                  @if($booking->status !== 'cancelled')
                    <a href="{{ url('/bookings/checkin/' . $booking->id) }}" class="text-emerald-600">Check In</a>
                    <a href="{{ url('/bookings/checkout/' . $booking->id) }}" class="text-blue-600">Check Out</a>
                    <a href="{{ url('/bookings/cancel/' . $booking->id) }}" class="text-red-600">Cancel</a>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
</body>
</html>
