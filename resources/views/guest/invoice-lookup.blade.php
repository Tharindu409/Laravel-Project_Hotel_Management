<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find Your Invoice</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900">
  <div class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-xl bg-white rounded-3xl shadow-xl p-8">
      <h1 class="text-3xl font-bold mb-3">Find Your Booking Invoice</h1>
      <p class="text-slate-500 mb-6">Enter your booking ID to view the invoice and pay online.</p>
      <form action="{{ url('/invoice') }}" method="GET" class="grid gap-4">
        <input name="booking_id" type="text" placeholder="Booking ID" class="border rounded-lg px-4 py-3 w-full" required>
        <button type="submit" class="bg-amber-500 text-white rounded-lg px-5 py-3 font-semibold">Lookup Invoice</button>
      </form>
    </div>
  </div>
</body>
</html>
