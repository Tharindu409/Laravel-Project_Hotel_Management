<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Bookings</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900">
  <div class="min-h-screen">
    <div class="max-w-6xl mx-auto p-6">
      <h1 class="text-3xl font-bold mb-3">My Bookings</h1>
      <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between mb-6">
        <p class="text-slate-500">Review your bookings, view invoices, and manage payments.</p>
        <button onclick="history.back()" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-3 text-slate-900 shadow hover:bg-slate-50">← Go Back</button>
      </div>

      @if(session()->has('message'))
        <div class="mb-6 rounded-xl bg-emerald-100 p-4 text-emerald-900">{{ session()->get('message') }}</div>
      @endif

      <div class="space-y-4">
        @forelse($bookings as $booking)
          <div class="rounded-3xl bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
              <div>
                <h2 class="text-xl font-semibold">Booking #{{ $booking->id }}</h2>
                <p class="text-slate-500">{{ $booking->room->title ?? 'Room' }} • {{ $booking->room->room_type ?? '' }}</p>
              </div>
              <div class="space-x-2">
                <a href="{{ url('/invoice/' . $booking->id) }}" class="rounded-full bg-slate-900 text-white px-4 py-2 text-sm">View Invoice</a>
                @if($booking->status === 'checked_out')
                  <span class="rounded-full bg-amber-100 text-amber-700 px-3 py-2 text-sm">Awaiting payment</span>
                @elseif($booking->status === 'completed')
                  <span class="rounded-full bg-emerald-100 text-emerald-700 px-3 py-2 text-sm">Completed</span>
                @else
                  <span class="rounded-full bg-slate-100 text-slate-600 px-3 py-2 text-sm">{{ ucfirst($booking->status) }}</span>
                @endif
              </div>
            </div>
            <div class="mt-4 grid sm:grid-cols-4 gap-4 text-sm text-slate-500">
              <div>
                <div class="font-semibold text-slate-900">{{ $booking->check_in_date->format('Y-m-d') }}</div>
                Check-in
              </div>
              <div>
                <div class="font-semibold text-slate-900">{{ $booking->check_out_date->format('Y-m-d') }}</div>
                Check-out
              </div>
              <div>
                <div class="font-semibold text-slate-900">${{ number_format($booking->total_price, 2) }}</div>
                Total
              </div>
              <div>
                <div class="font-semibold text-slate-900">{{ $booking->payments->sum('amount') ? '$' . number_format($booking->payments->sum('amount'), 2) : 'None' }}</div>
                Paid
              </div>
            </div>
          </div>
        @empty
          <div class="rounded-3xl bg-white p-6 shadow-sm text-slate-500">You have no bookings yet.</div>
        @endforelse
      </div>
    </div>
  </div>
</body>
</html>
