<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MassageBookingController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\UserController;


//Admin Controller







//reservas


Route::get('/deleteMassageBooking/{id}', [MassageBookingController::class, 'deleteMassageBooking']);

Route::get('/approve_bookMassage/{id}', [MassageBookingController::class, 'approve_bookMassage']);
Route::get('/reject_bookMassage/{id}', [MassageBookingController::class, 'reject_bookMassage']);

//testando
Route::get('/reservas/quarto', [ReservaController::class, 'quarto'])->name('reservas.quarto');
Route::get('/reservas/massagem', [ReservaController::class, 'massagem'])->name('reservas.massagem');


Route::get('/minhas-reservas', [App\Http\Controllers\BookingController::class, 'minhasReservas'])
    ->middleware('auth')
    ->name('minhas.reservas');







//Home Controller

Route::get('/room_details/{id}', [HomeController::class, 'room_details']);

Route::get('/contact', [HomeController::class, 'contact']);

//checkout
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::post('/finishcheckout', [BookingController::class, 'finishcheckout']);

Route::get('/minhas-reservas', [BookingController::class, 'minhasReservas'])->name('reservas.usuario');



Route::post('/sendcontact', [HomeController::class, 'sendcontact']);

Route::get('/showprofile', [BookingController::class, 'showprofile']);

Route::get('/massagens', [HomeController::class, 'massagens']);
//mensagens





Route::get('/gallery', [HomeController::class, 'gallery']);

Route::get('/test', [HomeController::class, 'test']);



// Booking Controller

Route::post('/checkout', [BookingController::class, 'checkout']);

Route::get('/cart/remove/{index}', [BookingController::class, 'removeFromCart']);

Route::get('/cart/reset', [BookingController::class, 'resetCart']);

Route::get('/room-features/{id}', [BookingController::class, 'roomFeatures']);

Route::post('/add_booking/{id}', [BookingController::class, 'add_booking']);

Route::get('/perfil/reservas', [BookingController::class, 'minhasReservas'])->name('perfil.reservas');



// Massage Controller
//Route::post('/add_massage_booking/{id}', [MassageBookingController::class, 'add_massage_booking'])->name('massage.booking');
Route::post('/massage-booking', [MassageBookingController::class, 'add_massage_booking'])
    ->name('massage.booking')
    ->middleware('auth');

Route::post('/massagens/reservar/{id}', [MassageBookingController::class, 'add_massage_booking']);
Route::get('/', [AdminController::class, 'home'])->name('home.index');

//rotas somente admin
Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/view-room', [AdminController::class, 'view_room']);
    Route::get('/all_messages', [AdminController::class, 'all_messages']);
    Route::get('/send_email/{id}', [AdminController::class, 'send_email']);
    Route::post('/email/{id}', [AdminController::class, 'email']);
    Route::get('/approve_book/{id}', [AdminController::class, 'approve_book']);

Route::get('/reject_book/{id}', [AdminController::class, 'reject_book']);

Route::get('/view_gallery', [AdminController::class, 'view_gallery']);

Route::post('/upload_gallery', [AdminController::class, 'upload_gallery']);

Route::get('/delete_gallery/{id}', [AdminController::class, 'delete_gallery']);
Route::get('/bookings', [AdminController::class, 'bookings']);
Route::get('/massageBookings', [AdminController::class, 'massageBookings']);


Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);



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
Route::get('/mensagens.show', [AdminController::class, 'mensagens.show'])
 ->name('admin.mensagens.show');


Route::get('/room_delete/{id}', [AdminController::class, 'room_delete']);

Route::get('/room_update/{id}', [AdminController::class, 'room_update']);

Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);


});

 
//teste
// Rotas do painel do usuário
// Rotas do usuário autenticado

Route::middleware(['auth'])->group(function () {

    // Perfil
    Route::get('/perfil', [UserController::class, 'perfil'])->name('user.perfil');
    Route::post('/perfil/atualizar', [UserController::class, 'atualizarPerfil'])->name('user.perfil.atualizar');

    // Compatibilidade: /profile redireciona para /perfil
    Route::get('/profile', function () {
        return redirect()->route('user.perfil');
    });

    // OU: usar diretamente o método profile() e update() se quiser editar lá também
    Route::get('/profile/edit', [UserController::class, 'profile'])->name('user.profile');
    Route::put('/profile', [UserController::class, 'update'])->name('user.profile.update');

    // Reservas
    Route::get('/minhasreservas', [UserController::class, 'minhasreservas'])->name('user.minhasreservas');
    Route::get('/minhasmassagens', [UserController::class, 'minhasmassagens'])->name('user.minhasmassagens');
    Route::get('/reservadetalhes/{id}', [UserController::class, 'reservadetalhes'])->name('user.reservadetalhes');
    Route::get('/cancelarmassagem/{id}', [UserController::class, 'cancelarMassagem'])->name('user.cancelarmassagem');
    Route::get('/cancelarreservaquarto/{id}', [UserController::class, 'cancelarReservaQuarto'])->name('user.cancelarreservaquarto');
    Route::get('/perfil/editar', [UserController::class, 'editarPerfil'])->name('user.perfil.editar');
    Route::post('/perfil/atualizar', [UserController::class, 'atualizarPerfil'])->name('user.perfil.atualizar');


    // Ajax e cancelamento
    Route::get('/user/reservas-ajax', [ReservaController::class, 'reservasAjax'])->name('user.reservas.ajax');
    Route::post('/user/reservas/{id}/cancelar', [ReservaController::class, 'cancelar'])->name('user.reservas.cancelar');
});
    
   

   







