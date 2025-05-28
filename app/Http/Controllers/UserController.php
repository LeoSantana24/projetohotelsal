<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Exibe o perfil do usuário (para ambas as rotas /perfil e /profile)
     */
    public function perfil()
    {
        $user = Auth::user();
        return view('user.perfil', compact('user')); // Usando view perfil.blade.php
    }
    public function profile()
    {
        
        return view('user.profile'); // Usando view perfil.blade.php
    }

    /**
     * Atualiza o perfil do usuário
     */
    public function atualizarPerfil(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);
        
        $user->update($request->all());
        
        return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
    }

    /**
     * Exibe todas as reservas do usuário
     */
   public function minhasreservas()
{
    $user = Auth::user();
    
    // Consulta com fallback para email
    $reservas = Booking::with([
            'room' => function($query) {
                $query->with(['typeRoom', 'images']);
            }
        ])
        ->where(function($query) use ($user) {
            $query->where('user_id', $user->id)
                  ->orWhere('email', $user->email);
        })
        ->orderBy('start_date', 'desc')
        ->paginate(10);

    // Debug no log (verifique storage/logs/laravel.log)
    \Log::debug('Reservas do usuário', [
        'user_id' => $user->id,
        'count' => $reservas->count(),
        
    ]);

    return view('user.minhasreservas', compact('reservas', 'user'));
}

    /**
     * Exibe detalhes de uma reserva específica
     */
    public function reservadetalhes($id)
    {
        $user = Auth::user();
        
        $reserva = Booking::with(['room.typeRoom', 'room.images'])
            ->where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();
        
        return view('user.reservadetalhes', compact('reserva'));
    }
    public function showprofile()
{
    $user = Auth::user();

    // Busca as reservas do usuário pelo user_id (prioritário) ou por email (fallback)
    $data = Booking::where(function($query) use ($user) {
            $query->where('user_id', $user->id)
                  ->orWhere('email', $user->email);
        })
        ->orderBy('start_date', 'desc')
        ->get();

    return view('user.profile', compact('data'));
}
}