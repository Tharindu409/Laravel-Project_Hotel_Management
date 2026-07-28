<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;           


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

