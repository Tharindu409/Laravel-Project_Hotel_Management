<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HotelController;

Route::get('/', function () {
    return view('home.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/', [AdminController::class, 'home']);    
route::get('/home', [AdminController::class, 'index'])->name('home');

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

Route::get('/payments', [HotelController::class, 'payments']);
Route::post('/payments', [HotelController::class, 'storePayment']);
Route::get('/payments/delete/{payment}', [HotelController::class, 'deletePayment']);

