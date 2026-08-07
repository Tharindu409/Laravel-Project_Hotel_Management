<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payments - Admin Dashboard</title>
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
          <h1 class="text-3xl font-bold">Payment Management</h1>
          <p class="text-slate-500">Record payments, track status, and generate invoices.</p>
        </div>
      </div>
      @if(session()->has('message'))
        <div class="mb-4 rounded bg-emerald-50 p-3 text-emerald-700">{{ session()->get('message') }}</div>
      @endif
      <div class="bg-white rounded-xl shadow p-6 mb-6">
        <div class="flex items-center justify-between mb-4">
          <h2 class="text-xl font-semibold">Record Payment</h2>
          <button type="button" onclick="toggleModal('paymentModal')" class="rounded-full bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Open Payment Form</button>
        </div>
        <p class="text-slate-500">Use the button to open the payment entry popup.</p>
      </div>

      <div id="paymentModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4">
        <div class="w-full max-w-3xl rounded-3xl bg-white p-6 shadow-xl">
          <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold">Record Payment</h2>
            <button type="button" onclick="toggleModal('paymentModal')" class="text-slate-500 hover:text-slate-900 text-2xl leading-none">&times;</button>
          </div>
          <form action="{{ url('/payments') }}" method="POST" class="grid gap-4 md:grid-cols-2">
            @csrf
            <select name="booking_id" required class="border rounded px-3 py-2">
              <option value="">Select booking</option>
              @foreach($bookings as $booking)
                <option value="{{ $booking->id }}">{{ $booking->customer->name ?? 'Guest' }} - {{ $booking->room->title ?? 'Room' }}</option>
              @endforeach
            </select>
            <input type="number" step="0.01" name="amount" required placeholder="Amount" class="border rounded px-3 py-2">
            <select name="payment_method" class="border rounded px-3 py-2">
              <option value="Cash">Cash</option>
              <option value="Card">Card</option>
              <option value="Bank Transfer">Bank Transfer</option>
              <option value="Online Payment">Online Payment</option>
            </select>
            <select name="status" class="border rounded px-3 py-2">
              <option value="Paid">Paid</option>
              <option value="Pending">Pending</option>
              <option value="Refund">Refund</option>
            </select>
            <textarea name="notes" rows="2" placeholder="Notes" class="md:col-span-2 border rounded px-3 py-2"></textarea>
            <div class="md:col-span-2 flex justify-end gap-3">
              <button type="button" onclick="toggleModal('paymentModal')" class="rounded-lg border border-slate-300 px-4 py-2">Cancel</button>
              <button type="submit" class="rounded-lg bg-black text-white px-4 py-2">Save Payment</button>
            </div>
          </form>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow p-6 overflow-x-auto">
        <h2 class="text-xl font-semibold mb-4">Payment History</h2>
        <table class="min-w-full text-sm">
          <thead>
            <tr class="text-left text-slate-500">
              <th class="py-2">Guest</th>
              <th class="py-2">Amount</th>
              <th class="py-2">Method</th>
              <th class="py-2">Status</th>
              <th class="py-2">Date</th>
              <th class="py-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($payments as $payment)
              <tr class="border-t">
                <td class="py-2">{{ $payment->booking->customer->name ?? 'Guest' }}</td>
                <td class="py-2">${{ number_format($payment->amount, 2) }}</td>
                <td class="py-2">{{ $payment->payment_method }}</td>
                <td class="py-2">{{ $payment->status }}</td>
                <td class="py-2">{{ $payment->payment_date?->format('Y-m-d H:i') }}</td>
                <td class="py-2 space-x-2">
                  <a href="{{ url('/payments/' . $payment->id . '/edit') }}" class="text-indigo-600">Edit</a>
                  <a href="{{ url('/payments/' . $payment->id . '/invoice') }}" class="text-emerald-600">Invoice</a>
                  <form action="{{ url('/payments/' . $payment->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
  <script>
    function toggleModal(id) {
      const modal = document.getElementById(id);
      if (!modal) return;
      modal.classList.toggle('hidden');
      modal.classList.toggle('flex');
    }
  </script>
</body>
</html>
