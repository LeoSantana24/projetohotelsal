<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingMassage;
use App\Models\TypeMassage;
use Illuminate\Support\Facades\Auth;

class MassageBookingController extends Controller
{
    public function showMassageBooking()
    {
        $massages = TypeMassage::all();
        return view('home.massagens', compact('massages'));
    }

    public function add_massage_booking(Request $request)
{
    try {
        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Você precisa estar logado para fazer uma reserva.'
            ], 401);
        }

        // Obtém o ID do tipo de massagem
        $id = $request->input('type_massage_id');
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'Tipo de massagem não especificado.'
            ], 400);
        }

        // Verifica se o tipo de massagem existe
        $massageType = TypeMassage::find($id);
        if (!$massageType) {
            return response()->json([
                'success' => false,
                'message' => 'Tipo de massagem não encontrado.'
            ], 404);
        }

        // Validação dos dados
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'date' => 'required|date|after_or_equal:today',
            'hour' => 'required|string',
            'duration' => 'required|string',
        ]);

        // Verifica disponibilidade
        $isBooked = BookingMassage::where('type_massage_id', $id)
            ->where('date', $validated['date'])
            ->where('hour', $validated['hour'])
            ->exists();

        if ($isBooked) {
            return response()->json([
                'success' => false,
                'message' => 'Este horário já está reservado. Por favor, escolha outro.'
            ], 409);
        }

        // Cria a reserva
        $booking = BookingMassage::create([
            'user_id' => Auth::id(),
            'type_massage_id' => $id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'date' => $validated['date'],
            'hour' => $validated['hour'],
            'duration' => $validated['duration'],
            'status' => 'pendente',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Reserva criada com sucesso!',
            'booking' => $booking
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Erro de validação',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Erro ao processar reserva: ' . $e->getMessage()
        ], 500);
    }


    }
    public function deleteMassageBooking($id)
    {
        try {
            $booking = BookingMassage::findOrFail($id);
            $booking->delete();

            return redirect()->back()->with('success', 'Reserva removida com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao remover a reserva: ' . $e->getMessage());
        }
    }
    public function approve_bookMassage($id)
    {
        $booking = BookingMassage::find($id);

        $booking->status= 'aprovado';

        $booking->save();

        return redirect()->back();
    }

    public function reject_bookMassage($id)
    {
        $booking = BookingMassage::find($id);

        $booking->status= 'rejeitado';

        $booking->save();

        return redirect()->back();
    }
    }
