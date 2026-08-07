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

        return redirect('/reservation/' . $booking->id);
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
        if (!$booking->customer || !$booking->room) {
            return redirect('/bookings')->with('error', 'Cannot check in: missing customer or assigned room.');
        }

        $booking->update([
            'status' => 'checked_in',
            'checked_in_at' => now(),
        ]);

        $booking->room()->update(['is_available' => false]);

        return redirect('/bookings')->with('message', 'Customer checked in successfully. Arrival time recorded.');
    }

    public function checkOut(Booking $booking)
    {
        if (!$booking->room) {
            return redirect('/bookings')->with('error', 'Cannot check out: assigned room is missing.');
        }

        $checkIn = Carbon::parse($booking->check_in_date);
        $checkOut = Carbon::parse($booking->check_out_date);
        $nights = max(1, $checkIn->diffInDays($checkOut));
        $finalBill = $nights * (float) $booking->room->price_per_night;

        $booking->update([
            'status' => 'checked_out',
            'checked_out_at' => now(),
            'total_price' => $finalBill,
        ]);

        $booking->room()->update(['is_available' => true]);

        return redirect('/bookings')->with('message', 'Guest checked out successfully. Final bill: $' . number_format($finalBill, 2));
    }

    public function payments()
    {
        $payments = Payment::with('booking.customer')->latest()->get();
        $bookings = Booking::whereIn('status', ['confirmed', 'checked_in', 'checked_out'])->get();

        return view('admin.payments', compact('payments', 'bookings'));
    }

    public function editPayment(Payment $payment)
    {
        $bookings = Booking::whereIn('status', ['confirmed', 'checked_in', 'checked_out'])->get();

        return view('admin.payments-edit', compact('payment', 'bookings'));
    }

    public function updatePayment(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'status' => 'required|string|in:Paid,Pending,Refund',
            'notes' => 'nullable|string',
        ]);

        $payment->update($data);

        return redirect('/payments')->with('message', 'Payment updated successfully.');
    }

    public function invoicePayment(Payment $payment)
    {
        return view('admin.payment-invoice', compact('payment'));
    }

    public function reservationConfirmation(Booking $booking)
    {
        $booking->load(['customer', 'room', 'payments']);

        return view('guest.confirmation', compact('booking'));
    }

    public function myBookings()
    {
        $user = auth()->user();
        $bookings = Booking::with(['customer', 'room', 'payments'])
            ->where('user_id', $user->id)
            ->orWhereHas('customer', function ($query) use ($user) {
                $query->where('email', $user->email);
            })
            ->latest()
            ->get();

        return view('account.bookings', compact('bookings'));
    }

    public function myPayments()
    {
        $user = auth()->user();
        $payments = Payment::with(['booking.customer', 'booking.room'])
            ->whereHas('booking', function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhereHas('customer', function ($query) use ($user) {
                        $query->where('email', $user->email);
                    });
            })
            ->latest()
            ->get();

        $bookings = Booking::with(['customer', 'room'])
            ->where('user_id', $user->id)
            ->orWhereHas('customer', function ($query) use ($user) {
                $query->where('email', $user->email);
            })
            ->whereIn('status', ['pending', 'checked_out'])
            ->get();

        return view('account.payments', compact('payments', 'bookings'));
    }

    public function accountPayment(Request $request, Booking $booking)
    {
        $user = auth()->user();

        if ($booking->user_id !== $user->id && optional($booking->customer)->email !== $user->email) {
            abort(403);
        }

        $data = $request->validate([
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|in:Cash,Card,Online Payment',
            'notes' => 'nullable|string',
        ]);

        $data['booking_id'] = $booking->id;
        $data['status'] = 'Paid';
        $data['payment_date'] = now();

        Payment::create($data);

        if ($booking->status === 'checked_out') {
            $booking->update(['status' => 'completed']);
        }

        return redirect()->route('account.payments')->with('message', 'Payment submitted successfully.');
    }

    public function storePayment(Request $request)
    {
        $data = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|in:Cash,Card,Bank Transfer,Online Payment',
            'status' => 'required|string|in:Paid,Pending,Refund',
            'notes' => 'nullable|string',
        ]);

        $data['payment_date'] = now();
        Payment::create($data);

        return redirect('/payments')->with('message', 'Payment recorded successfully.');
    }

    public function invoiceLookup(Request $request)
    {
        return view('guest.invoice-lookup');
    }

    public function deletePayment(Payment $payment)
    {
        $payment->delete();

        return redirect('/payments')->with('message', 'Payment deleted successfully.');
    }
}
