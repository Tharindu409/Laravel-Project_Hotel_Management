<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HotelController extends Controller
{
    public function customers()
    {
        $customers = Customer::latest()->get();
        return view('admin.customers', compact('customers'));
    }

    public function storeCustomer(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        Customer::create($data);

        return redirect('/customers')->with('message', 'Customer added successfully.');
    }

    public function updateCustomer(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $customer->update($data);

        return redirect('/customers')->with('message', 'Customer updated successfully.');
    }

    public function deleteCustomer(Customer $customer)
    {
        $customer->delete();

        return redirect('/customers')->with('message', 'Customer deleted successfully.');
    }

    public function bookings()
    {
        $bookings = Booking::with(['customer', 'room'])->latest()->get();
        $customers = Customer::all();
        $rooms = Room::where('is_available', true)->get();

        return view('admin.bookings', compact('bookings', 'customers', 'rooms'));
    }

    public function reserve(Request $request)
    {
        $data = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'guests_count' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $customer = Customer::firstOrCreate(
            ['email' => $data['email']],
            [
                'name' => $data['name'],
                'phone' => $data['phone'] ?? null,
                'address' => null,
            ]
        );

        $room = Room::findOrFail($data['room_id']);
        $checkIn = Carbon::parse($data['check_in_date']);
        $checkOut = Carbon::parse($data['check_out_date']);
        $nights = max(1, $checkIn->diffInDays($checkOut));
        $totalPrice = $nights * (float) $room->price_per_night;

        $bookingData = [
            'customer_id' => $customer->id,
            'room_id' => $room->id,
            'check_in_date' => $data['check_in_date'],
            'check_out_date' => $data['check_out_date'],
            'guests_count' => $data['guests_count'],
            'status' => 'pending',
            'total_price' => $totalPrice,
            'notes' => $data['notes'],
        ];

        if (auth()->check()) {
            $bookingData['user_id'] = auth()->id();
        }

        $booking = new Booking();
        $booking->fill($bookingData);
        $booking->save();

        $room->update(['is_available' => false]);

        return redirect('/')->with('message', 'Your reservation request has been received. We will contact you shortly.');
    }

    public function storeBooking(Request $request)
    {
        $data = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'guests_count' => 'required|integer|min:1',
            'status' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $room = Room::findOrFail($request->room_id);
        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);
        $nights = max(1, $checkIn->diffInDays($checkOut));
        $data['total_price'] = $nights * (float) $room->price_per_night;

        $booking = new Booking();
        $booking->fill($data);
        $booking->save();
        $room->update(['is_available' => false]);

        return redirect('/bookings')->with('message', 'Booking created successfully.');
    }

    public function updateBooking(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $booking->update($data);

        return redirect('/bookings')->with('message', 'Booking updated successfully.');
    }

    public function cancelBooking(Booking $booking)
    {
        $booking->update(['status' => 'cancelled']);
        $booking->room()->update(['is_available' => true]);

        return redirect('/bookings')->with('message', 'Booking cancelled successfully.');
    }

    public function checkIn(Booking $booking)
    {
        $booking->update([
            'status' => 'checked_in',
            'checked_in_at' => now(),
        ]);

        return redirect('/bookings')->with('message', 'Guest checked in successfully.');
    }

    public function checkOut(Booking $booking)
    {
        $booking->update([
            'status' => 'checked_out',
            'checked_out_at' => now(),
        ]);
        $booking->room()->update(['is_available' => true]);

        return redirect('/bookings')->with('message', 'Guest checked out successfully.');
    }

    public function payments()
    {
        $payments = Payment::with('booking.customer')->latest()->get();
        $bookings = Booking::whereIn('status', ['confirmed', 'checked_in', 'checked_out'])->get();

        return view('admin.payments', compact('payments', 'bookings'));
    }

    public function storePayment(Request $request)
    {
        $data = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $data['payment_date'] = now();
        Payment::create($data);

        return redirect('/payments')->with('message', 'Payment recorded successfully.');
    }

    public function deletePayment(Payment $payment)
    {
        $payment->delete();

        return redirect('/payments')->with('message', 'Payment deleted successfully.');
    }
}
