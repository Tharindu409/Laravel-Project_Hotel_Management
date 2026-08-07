<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice {{ $booking->id }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900">
  <div class="max-w-5xl mx-auto p-6">
    <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <div>
        <h1 class="text-3xl font-bold">Invoice #{{ $booking->id }}</h1>
        <p class="text-slate-500">Status: <span class="font-semibold">{{ ucfirst($booking->status) }}</span></p>
      </div>
      <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
        <button onclick="history.back()" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-3 text-slate-900 shadow hover:bg-slate-50">← Go Back</button>
        <a href="{{ url('/invoice') }}" class="inline-flex items-center gap-2 rounded-full bg-white px-5 py-3 text-slate-900 shadow">Lookup another invoice</a>
      </div>
    </div>

    @if(session()->has('message'))
      <div class="mb-6 rounded-xl bg-emerald-100 p-4 text-emerald-900">{{ session()->get('message') }}</div>
    @endif

    <div class="grid gap-6 lg:grid-cols-3 mb-6">
      <div class="rounded-3xl bg-white p-6 shadow-sm">
        <h2 class="font-semibold text-slate-700 mb-3">Guest</h2>
        <p class="text-slate-900 font-semibold">{{ $booking->customer->name ?? 'Guest' }}</p>
        <p class="text-slate-500">{{ $booking->customer->email ?? '' }}</p>
      </div>
      <div class="rounded-3xl bg-white p-6 shadow-sm">
        <h2 class="font-semibold text-slate-700 mb-3">Room</h2>
        <p class="text-slate-900 font-semibold">{{ $booking->room->title ?? 'Room' }}</p>
        <p class="text-slate-500">{{ $booking->room->room_type ?? '' }}</p>
      </div>
      <div class="rounded-3xl bg-white p-6 shadow-sm">
        <h2 class="font-semibold text-slate-700 mb-3">Dates</h2>
        <p class="text-slate-900">{{ $booking->check_in_date->format('Y-m-d') }} → {{ $booking->check_out_date->format('Y-m-d') }}</p>
        <p class="text-slate-500">{{ $booking->guests_count }} guests</p>
      </div>
    </div>

    <div class="rounded-3xl bg-white p-6 shadow-sm mb-6">
      <div class="flex items-center justify-between mb-4">
        <h2 class="font-semibold text-slate-700">Invoice Summary</h2>
        <span class="text-sm text-slate-500">Generated {{ now()->format('F j, Y') }}</span>
      </div>
      <div class="grid gap-4 sm:grid-cols-2">
        <div>
          <p class="text-slate-500">Room rate</p>
          <p class="font-semibold text-slate-900">${{ number_format($booking->room->price_per_night, 2) }} / night</p>
        </div>
        <div>
          <p class="text-slate-500">Nights</p>
          <p class="font-semibold text-slate-900">{{ max(1, $booking->check_in_date->diffInDays($booking->check_out_date)) }}</p>
        </div>
      </div>
      <div class="mt-4 border-t border-slate-200 pt-4 flex items-center justify-between">
        <span class="text-slate-500">Total due</span>
        <span class="text-xl font-semibold text-slate-900">${{ number_format($booking->total_price, 2) }}</span>
      </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-2">
      <div class="rounded-3xl bg-white p-6 shadow-sm">
        <h2 class="font-semibold text-slate-700 mb-3">Payments</h2>
        @if($booking->payments->isEmpty())
          <p class="text-slate-500">No payments recorded yet.</p>
        @else
          <ul class="space-y-3">
            @foreach($booking->payments as $payment)
              <li class="rounded-2xl border border-slate-200 p-4">
                <div class="flex items-center justify-between mb-2">
                  <span class="font-semibold">${{ number_format($payment->amount, 2) }}</span>
                  <span class="text-sm text-slate-500">{{ $payment->status }}</span>
                </div>
                <p class="text-slate-500 text-sm">{{ $payment->payment_method }} • {{ $payment->payment_date?->format('Y-m-d H:i') }}</p>
              </li>
            @endforeach
          </ul>
        @endif
      </div>

      <div class="rounded-3xl bg-white p-6 shadow-sm">
        <h2 class="font-semibold text-slate-700 mb-3">Make a Payment</h2>
        <form action="{{ url('/invoice/' . $booking->id . '/payment') }}" method="POST" class="grid gap-4">
          @csrf
          <input type="number" step="0.01" name="amount" value="{{ $booking->total_price - $booking->payments->sum('amount') }}" min="0" required class="border rounded-lg px-4 py-3" placeholder="Payment amount">
          <select name="payment_method" class="border rounded-lg px-4 py-3">
            <option value="Cash">Cash</option>
            <option value="Card">Card</option>
            <option value="Bank Transfer">Bank Transfer</option>
            <option value="Online Payment">Online Payment</option>
          </select>
          <textarea name="notes" rows="3" placeholder="Payment notes" class="border rounded-lg px-4 py-3"></textarea>
          <button type="submit" class="bg-amber-500 text-white rounded-lg px-5 py-3 font-semibold">Submit Payment</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
