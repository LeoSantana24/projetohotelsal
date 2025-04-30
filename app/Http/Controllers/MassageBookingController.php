<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingMassage;
use App\Models\TypeMassage;

class MassageBookingController extends Controller
{
    public function showMassageBooking()
    {
        $massages = TypeMassage::all();
        return view('home.massagens', compact('massages'));
    }

    public function add_massage_booking(Request $request, $id)
    {
        // Verifica se o horário está disponível
        $isBooked = BookingMassage::where('type_massage_id', $id)
            ->where('date', $request->date)
            ->where('hour', $request->hour)
            ->exists();

        if ($isBooked) {
            return response()->json([
                'success' => false,
                'message' => 'Este horário já está reservado. Por favor, escolha outro.'
            ]);
        }

        // Cria a reserva
        BookingMassage::create([
            'type_massage_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'hour' => $request->hour,
            'duration' => $request->duration,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Reserva criada com sucesso!'
        ]);
    }
}