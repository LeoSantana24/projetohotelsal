<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'quarto_id' => 'required|exists:rooms,id',
            'data_checkin' => 'required|date|after_or_equal:today',
            'data_checkout' => 'required|date|after:data_checkin',
            'numero_adultos' => 'required|integer|min:1',
            'numero_criancas' => 'nullable|integer|min:0',
        ]);

        // Calcular o número total de pessoas (adultos + crianças)
        $numero_pessoas = $request->numero_adultos + $request->numero_criancas;

        // Criar a reserva incluindo o número total de pessoas
        $reserva = Reserva::create([
            'user_id' => $request->user_id,
            'quarto_id' => $request->quarto_id,
            'data_checkin' => $request->data_checkin,
            'data_checkout' => $request->data_checkout,
            'numero_adultos' => $request->numero_adultos,
            'numero_criancas' => $request->numero_criancas,
        
        ]);

        return response()->json(['message' => 'Reserva criada com sucesso!', 'reserva' => $reserva], 201);
    }
}

