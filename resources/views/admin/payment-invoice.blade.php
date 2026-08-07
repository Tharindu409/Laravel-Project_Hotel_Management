<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice #{{ $payment->id }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-900">
<div class="max-w-4xl mx-auto p-6">
  <div class="bg-white rounded-3xl shadow-xl p-8">
    <div class="flex items-start justify-between mb-8">
      <div>
        <h1 class="text-3xl font-bold">Invoice</h1>
        <p class="text-slate-500">Payment #{{ $payment->id }}</p>
      </div>
      <div class="text-right">
        <p class="text-slate-500">Date</p>
        <p class="font-semibold">{{ $payment->payment_date?->format('F j, Y') }}</p>
      </div>
    </div>

    <div class="grid grid-cols-2 gap-6 mb-6">
      <div>
        <h2 class="font-semibold text-slate-700">Guest</h2>
        <p>{{ $payment->booking->customer->name ?? 'Guest' }}</p>
        <p class="text-slate-500">{{ $payment->booking->customer->email ?? '' }}</p>
      </div>
      <div>
        <h2 class="font-semibold text-slate-700">Room</h2>
        <p>{{ $payment->booking->room->title ?? 'Room' }}</p>
        <p class="text-slate-500">{{ $payment->booking->room->room_type ?? '' }}</p>
      </div>
    </div>

    <div class="border-t border-slate-200 pt-6 mb-6">
      <div class="flex justify-between mb-2">
        <span class="text-slate-500">Booking Dates</span>
        <span class="font-semibold">{{ $payment->booking->check_in_date->format('Y-m-d') }} → {{ $payment->booking->check_out_date->format('Y-m-d') }}</span>
      </div>
      <div class="flex justify-between mb-2">
        <span class="text-slate-500">Payment Method</span>
        <span>{{ $payment->payment_method }}</span>
      </div>
      <div class="flex justify-between mb-2">
        <span class="text-slate-500">Status</span>
        <span>{{ $payment->status }}</span>
      </div>
    </div>

    <div class="bg-slate-50 rounded-2xl p-6">
      <div class="flex justify-between text-slate-600 mb-3">
        <span>Amount</span>
        <span class="font-semibold text-slate-900">${{ number_format($payment->amount, 2) }}</span>
      </div>
      @if($payment->notes)
        <div class="text-slate-500">
          <h3 class="font-semibold mb-2">Notes</h3>
          <p>{{ $payment->notes }}</p>
        </div>
      @endif
    </div>

    <div class="mt-8 text-right">
      <a href="{{ url('/payments') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-slate-900 text-white">Back to payments</a>
    </div>
  </div>
</div>
</body>
</html>
