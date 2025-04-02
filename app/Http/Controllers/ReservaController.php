<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'numero_criancas' => 'nullable|integer|min:0'
        ]);

        $reserva = Reserva::create($request->all());

        return response()->json(['message' => 'Reserva criada com sucesso!', 'reserva' => $reserva], 201);
    }
}

