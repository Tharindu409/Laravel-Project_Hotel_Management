<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customers - Admin Dashboard</title>
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
          <h1 class="text-3xl font-bold">Customer Management</h1>
          <p class="text-slate-500">Manage resort guests and their history.</p>
        </div>
      </div>
      @if(session()->has('message'))
        <div class="mb-4 rounded bg-emerald-50 p-3 text-emerald-700">{{ session()->get('message') }}</div>
      @endif
      <div class="grid gap-6 lg:grid-cols-[1.1fr_0.9fr]">
        <div class="bg-white rounded-xl shadow p-6">
          <h2 class="text-xl font-semibold mb-4">Add Customer</h2>
          <form action="{{ url('/customers') }}" method="POST" class="space-y-3">
            @csrf
            <input name="name" required placeholder="Customer name" class="w-full border rounded px-3 py-2">
            <input name="email" required type="email" placeholder="Email" class="w-full border rounded px-3 py-2">
            <input name="phone" placeholder="Phone" class="w-full border rounded px-3 py-2">
            <input name="address" placeholder="Address" class="w-full border rounded px-3 py-2">
            <textarea name="notes" rows="3" placeholder="Notes" class="w-full border rounded px-3 py-2"></textarea>
            <button class="bg-amber-500 text-white px-4 py-2 rounded">Save Customer</button>
          </form>
        </div>
        <div class="bg-white rounded-xl shadow p-6 overflow-x-auto">
          <h2 class="text-xl font-semibold mb-4">Customer List</h2>
          <table class="min-w-full text-sm">
            <thead>
              <tr class="text-left text-slate-500">
                <th class="py-2">Name</th>
                <th class="py-2">Email</th>
                <th class="py-2">Phone</th>
                <th class="py-2">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($customers as $customer)
                <tr class="border-t">
                  <td class="py-2">{{ $customer->name }}</td>
                  <td class="py-2">{{ $customer->email }}</td>
                  <td class="py-2">{{ $customer->phone }}</td>
                  <td class="py-2 space-x-2">
                    <a href="{{ url('/customers/delete/' . $customer->id) }}" class="text-red-600">Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</div>
</body>
</html>
