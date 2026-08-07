<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Confirmed</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900">
  <div class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-3xl bg-white rounded-3xl shadow-xl p-8">
      <div class="mb-6">
        <h1 class="text-3xl font-bold mb-2">Reservation Confirmed</h1>
        <p class="text-slate-500">Thank you, {{ $booking->customer->name ?? 'Guest' }}. Your booking is confirmed and the invoice is ready.</p>
        <button onclick="history.back()" class="mt-4 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-3 text-slate-900 shadow hover:bg-slate-50">← Go Back</button>
      </div>

      <div class="grid gap-4 sm:grid-cols-2 mb-6">
        <div class="rounded-3xl bg-slate-50 p-6">
          <h2 class="text-slate-700 font-semibold mb-2">Booking ID</h2>
          <p class="text-2xl font-bold">{{ $booking->id }}</p>
        </div>
        <div class="rounded-3xl bg-slate-50 p-6">
          <h2 class="text-slate-700 font-semibold mb-2">Room</h2>
          <p class="text-slate-900 font-semibold">{{ $booking->room->title ?? 'Room' }}</p>
          <p class="text-slate-500">{{ $booking->room->room_type ?? '' }}</p>
        </div>
      </div>

      <div class="rounded-3xl bg-white p-6 shadow-sm mb-6">
        <h2 class="font-semibold text-slate-700 mb-3">Stay Details</h2>
        <div class="grid gap-4 sm:grid-cols-2">
          <div>
            <p class="text-slate-500">Check-in</p>
            <p class="font-semibold">{{ $booking->check_in_date->format('Y-m-d') }}</p>
          </div>
          <div>
            <p class="text-slate-500">Check-out</p>
            <p class="font-semibold">{{ $booking->check_out_date->format('Y-m-d') }}</p>
          </div>
          <div>
            <p class="text-slate-500">Guests</p>
            <p class="font-semibold">{{ $booking->guests_count }}</p>
          </div>
          <div>
            <p class="text-slate-500">Status</p>
            <p class="font-semibold">{{ ucfirst($booking->status) }}</p>
          </div>
        </div>
      </div>

      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <a href="{{ url('/invoice/' . $booking->id) }}" class="inline-flex items-center justify-center rounded-full bg-amber-500 px-6 py-3 text-white font-semibold shadow-lg hover:bg-amber-400">View Invoice</a>
        <a href="{{ url('/') }}" class="inline-flex items-center justify-center rounded-full bg-slate-900 px-6 py-3 text-white font-semibold shadow-lg hover:bg-slate-700">Return Home</a>
      </div>
    </div>
  </div>
</body>
</html>
