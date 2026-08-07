<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payments History</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900">
  <div class="min-h-screen">
    <div class="max-w-6xl mx-auto p-6">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
        <div>
          <h1 class="text-3xl font-bold">Payments / History</h1>
          <p class="text-slate-500">Track your payments and settle outstanding invoices.</p>
        </div>
        <button onclick="history.back()" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-3 text-slate-900 shadow hover:bg-slate-50">← Go Back</button>
      </div>

      @if(session()->has('message'))
        <div class="mb-6 rounded-xl bg-emerald-100 p-4 text-emerald-900">{{ session()->get('message') }}</div>
      @endif

      <div class="bg-white rounded-3xl shadow-sm p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Outstanding Bookings</h2>
        @if($bookings->isEmpty())
          <p class="text-slate-500">No outstanding payments at the moment.</p>
        @else
          <div class="space-y-4">
            @foreach($bookings as $booking)
              <div class="rounded-3xl border border-slate-200 p-4">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                  <div>
                    <h3 class="font-semibold text-slate-900">Booking #{{ $booking->id }} • {{ $booking->room->title ?? '' }}</h3>
                    <p class="text-slate-500 text-sm">Total: ${{ number_format($booking->total_price, 2) }}</p>
                  </div>
                  <form action="{{ url('/account/bookings/' . $booking->id . '/payment') }}" method="POST" class="grid gap-3 sm:w-80">
                    @csrf
                    <input name="amount" type="number" step="0.01" min="0" value="{{ max(0, $booking->total_price - $booking->payments->sum('amount')) }}" class="border rounded-lg px-4 py-3 w-full" placeholder="Payment amount" required>
                    <select name="payment_method" class="border rounded-lg px-4 py-3 w-full">
                      <option value="Cash">Cash</option>
                      <option value="Card">Card</option>
                      <option value="Online Payment">Online Payment</option>
                    </select>
                    <button type="submit" class="rounded-full bg-amber-500 text-white px-4 py-3 font-semibold">Pay Now</button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>

      <div class="bg-white rounded-3xl shadow-sm p-6">
        <h2 class="text-xl font-semibold mb-4">Payment History</h2>
        <div class="space-y-4">
          @forelse($payments as $payment)
            <div class="rounded-3xl border border-slate-200 p-4">
              <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                  <p class="text-slate-900 font-semibold">${{ number_format($payment->amount, 2) }}</p>
                  <p class="text-slate-500 text-sm">{{ $payment->payment_method }} • {{ $payment->payment_date?->format('Y-m-d') }}</p>
                </div>
                <span class="rounded-full px-3 py-2 text-sm {{ $payment->status === 'Paid' ? 'bg-emerald-100 text-emerald-700' : 'bg-yellow-100 text-amber-700' }}">{{ $payment->status }}</span>
              </div>
            </div>
          @empty
            <p class="text-slate-500">No payments recorded yet.</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</body>
</html>
