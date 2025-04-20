<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\BookingController;


// Rota para a página inicial que renderiza a view 'home.index'
Route::get('/', [AdminController::class, 'home'])->name('home.index');

// Rota para a página home, se necessário
Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::get('/create_room', [AdminController::class, 'create_room']);

Route::post('/add_room', [AdminController::class, 'add_room']);

Route::get('/view_room', [AdminController::class, 'view_room']);


Route::get('/room_delete/{id}', [AdminController::class, 'room_delete']);

Route::get('/room_update/{id}', [AdminController::class, 'room_update']);

Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);


Route::get('/room_details/{id}', [HomeController::class, 'room_details']);

Route::post('/add_booking/{id}', [BookingController::class, 'add_booking']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/massagens', [HomeController::class, 'massagens']);

Route::get('/gallery', [HomeController::class, 'gallery']);

Route::get('/test', [HomeController::class, 'test']);




Route::post('/checkout', [BookingController::class, 'checkout']);

Route::get('/cart/remove/{index}', [BookingController::class, 'removeFromCart']);

Route::get('/cart/reset', [BookingController::class, 'resetCart']);








Route::get('/room-features/{id}', [BookingController::class, 'roomFeatures']);






Route::get('/bookings', [AdminController::class, 'bookings']);

Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);


Route::get('/approve_book/{id}', [AdminController::class, 'approve_book']);

Route::get('/reject_book/{id}', [AdminController::class, 'reject_book']);

Route::get('/view_gallery', [AdminController::class, 'view_gallery']);

Route::post('/upload_gallery', [AdminController::class, 'upload_gallery']);

Route::get('/delete_gallery/{id}', [AdminController::class, 'delete_gallery']);



