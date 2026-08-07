<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HotelController;

Route::get('/', [AdminController::class, 'home']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/home', [AdminController::class, 'index'])->name('home');

route::get('/create_room', [AdminController::class, 'create_room']);

route::post('/add_room', [AdminController::class, 'add_room']);

route::get('/view_room', [AdminController::class, 'view_room']);

route::get('/delete_room/{id}', [AdminController::class, 'delete_room']);

route::get('/edit_room/{id}', [AdminController::class, 'edit_room']);

route::post('/update_room/{id}', [AdminController::class, 'update_room']);

Route::get('/customers', [HotelController::class, 'customers']);
Route::post('/customers', [HotelController::class, 'storeCustomer']);
Route::post('/customers/{customer}', [HotelController::class, 'updateCustomer']);
Route::get('/customers/delete/{customer}', [HotelController::class, 'deleteCustomer']);

Route::get('/bookings', [HotelController::class, 'bookings']);
Route::post('/bookings', [HotelController::class, 'storeBooking']);
Route::post('/bookings/{booking}', [HotelController::class, 'updateBooking']);
Route::get('/bookings/cancel/{booking}', [HotelController::class, 'cancelBooking']);
Route::get('/bookings/checkin/{booking}', [HotelController::class, 'checkIn']);
Route::get('/bookings/checkout/{booking}', [HotelController::class, 'checkOut']);

Route::post('/reserve', [HotelController::class, 'reserve']);
Route::get('/reservation/{booking}', [HotelController::class, 'reservationConfirmation']);

Route::get('/invoice', [HotelController::class, 'invoiceLookup']);
Route::get('/invoice/{booking}', [HotelController::class, 'guestInvoice']);
Route::post('/invoice/{booking}/payment', [HotelController::class, 'guestStorePayment']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/account/bookings', [HotelController::class, 'myBookings'])->name('account.bookings');
    Route::get('/account/payments', [HotelController::class, 'myPayments'])->name('account.payments');
    Route::post('/account/bookings/{booking}/payment', [HotelController::class, 'accountPayment'])->name('account.bookings.payment');
});

Route::get('/payments', [HotelController::class, 'payments']);
Route::get('/payments/{payment}/edit', [HotelController::class, 'editPayment']);
Route::put('/payments/{payment}', [HotelController::class, 'updatePayment']);
Route::get('/payments/{payment}/invoice', [HotelController::class, 'invoicePayment']);
Route::post('/payments', [HotelController::class, 'storePayment']);
Route::delete('/payments/{payment}', [HotelController::class, 'deletePayment']);

