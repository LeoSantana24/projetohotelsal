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

   // Em app/Http/Controllers/MassageBookingController.php

public function add_massage_booking(Request $request)
{
    try {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to make a reservation.'
            ], 401);
        }

        // Validação dos dados recebidos do formulário
        $validated = $request->validate([
            'type_massage_id' => 'required|exists:type_massage,id', // Valida se a massagem existe
            'name'            => 'required|string|max:255',
            'email'           => 'required|email',
            'phone'           => 'required|string|max:20',
            'date'            => 'required|date|after_or_equal:today',
            'hour'            => 'required|string',
            'duration'        => 'required|string',
            'price'           => 'required|numeric|min:0', // <-- MODIFICADO: Validar o preço recebido
        ]);

        // Verifica se o horário já está reservado
        $isBooked = BookingMassage::where('date', $validated['date'])
            ->where('hour', $validated['hour'])
            ->exists();

        if ($isBooked) {
            return response()->json([
                'success' => false,
                'message' => 'This time slot is already booked. Please choose another one.'
            ], 409); // 409 Conflict é um bom status code para isto
        }

        // Cria a reserva usando os dados validados
        $booking = BookingMassage::create([
            'user_id'         => Auth::id(),
            'type_massage_id' => $validated['type_massage_id'],
            'name'            => $validated['name'],
            'email'           => $validated['email'],
            'phone'           => $validated['phone'],
            'date'            => $validated['date'],
            'hour'            => $validated['hour'],
            'duration'        => $validated['duration'],
            'price'           => $validated['price'], //
            'status'          => 'waiting',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Reservation created successfully!',
            'booking' => $booking
        ], 201); 

    } catch (\Illuminate\Validation\ValidationException $e) {
        
        return response()->json([
            'success' => false,
            'message' => 'Please check the fields.',
            'errors'  => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        
        \Log::error('Error creating massage booking: ' . $e->getMessage());
        
        return response()->json([
            'success' => false,
            'message' => 'An unexpected server error occurred.'
        ], 500);
    }



    }
    public function deleteMassageBooking($id)
    {
        try {
            $booking = BookingMassage::findOrFail($id);
            $booking->delete();

            return redirect()->back()->with('success', 'Reservation successfully removed.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error removing reservation: ' . $e->getMessage());
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
