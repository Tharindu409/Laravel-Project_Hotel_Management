<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Payment - Admin Dashboard</title>
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
          <h1 class="text-3xl font-bold">Edit Payment</h1>
          <p class="text-slate-500">Update payment details or change payment status.</p>
        </div>
      </div>
      @if(session()->has('message'))
        <div class="mb-4 rounded bg-emerald-50 p-3 text-emerald-700">{{ session()->get('message') }}</div>
      @endif
      <div class="bg-white rounded-xl shadow p-6 mb-6">
        <form action="{{ url('/payments/' . $payment->id) }}" method="POST" class="grid gap-4 md:grid-cols-2">
          @csrf
          @method('PUT')
          <select name="booking_id" required class="border rounded px-3 py-2">
            <option value="">Select booking</option>
            @foreach($bookings as $booking)
              <option value="{{ $booking->id }}" {{ $payment->booking_id === $booking->id ? 'selected' : '' }}>{{ $booking->customer->name ?? 'Guest' }} - {{ $booking->room->title ?? 'Room' }}</option>
            @endforeach
          </select>
          <input type="number" step="0.01" name="amount" required placeholder="Amount" value="{{ $payment->amount }}" class="border rounded px-3 py-2">
          <select name="payment_method" class="border rounded px-3 py-2">
            @foreach(['Cash','Card','Bank Transfer','Online Payment'] as $method)
              <option value="{{ $method }}" {{ $payment->payment_method === $method ? 'selected' : '' }}>{{ $method }}</option>
            @endforeach
          </select>
          <select name="status" class="border rounded px-3 py-2">
            @foreach(['Paid','Pending','Refund'] as $status)
              <option value="{{ $status }}" {{ $payment->status === $status ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
          </select>
          <textarea name="notes" rows="2" placeholder="Notes" class="md:col-span-2 border rounded px-3 py-2">{{ $payment->notes }}</textarea>
          <button class="md:col-span-2 bg-amber-500 text-white px-4 py-2 rounded">Update Payment</button>
        </form>
      </div>
    </main>
  </div>
</div>
</body>
</html>
