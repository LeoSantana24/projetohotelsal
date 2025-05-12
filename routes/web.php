<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MassageBookingController;


//Admin Controller
Route::get('/', [AdminController::class, 'home'])->name('home.index');

Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::get('/create_room', [AdminController::class, 'create_room']);

Route::get('/create_type_massage', [AdminController::class, 'create_type_massage']);
Route::get('/type_massage', [AdminController::class, 'type_massage']);

Route::post('/add_type_massage', [AdminController::class, 'add_type_massage']);
//rota ver massagens
Route::get('/view_massages', [AdminController::class, 'view_massages']);




Route::get('/update_massage/{id}', [AdminController::class, 'edit_massage']);
Route::post('/update_massage/{id}', [AdminController::class, 'update_massage']);
Route::get('/massage_delete/{id}', [AdminController::class, 'delete_massage']);





Route::post('/add_room', [AdminController::class, 'add_room']);

Route::get('/view_room', [AdminController::class, 'view_room']);


Route::get('/room_delete/{id}', [AdminController::class, 'room_delete']);

Route::get('/room_update/{id}', [AdminController::class, 'room_update']);

Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);

Route::get('/bookings', [AdminController::class, 'bookings']);

Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);


Route::get('/approve_book/{id}', [AdminController::class, 'approve_book']);

Route::get('/reject_book/{id}', [AdminController::class, 'reject_book']);

Route::get('/view_gallery', [AdminController::class, 'view_gallery']);

Route::post('/upload_gallery', [AdminController::class, 'upload_gallery']);

Route::get('/delete_gallery/{id}', [AdminController::class, 'delete_gallery']);



//Home Controller

Route::get('/room_details/{id}', [HomeController::class, 'room_details']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/massagens', [HomeController::class, 'massagens']);

Route::get('/gallery', [HomeController::class, 'gallery']);

Route::get('/test', [HomeController::class, 'test']);



// Booking Controller

Route::post('/checkout', [BookingController::class, 'checkout']);

Route::get('/cart/remove/{index}', [BookingController::class, 'removeFromCart']);

Route::get('/cart/reset', [BookingController::class, 'resetCart']);

Route::get('/room-features/{id}', [BookingController::class, 'roomFeatures']);

Route::post('/add_booking/{id}', [BookingController::class, 'add_booking']);


// Massage Controller
Route::post('/add_massage_booking/{id}', [MassageBookingController::class, 'add_massage_booking'])->name('massage.booking');

Route::post('/massagens/reservar/{id}', [MassageBookingController::class, 'add_massage_booking']);

//teste
Route::get('/test-massage-booking', function() {
    $testData = [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'phone' => '123456789',
        'date' => now()->format('Y-m-d'),
        'hour' => '14:00',
        'duration' => '60min'
    ];
    
    $request = new \Illuminate\Http\Request($testData);
    $controller = new \App\Http\Controllers\MassageBookingController();
    
    return $controller->add_massage_booking($request, 1);
});
   







