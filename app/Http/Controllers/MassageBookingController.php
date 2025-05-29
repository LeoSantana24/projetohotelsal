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

    public function add_massage_booking(Request $request)
    {
        // Obtém o ID do tipo de massagem do formulário
        
        $id = $request->input('type_massage_id');
        
        // Verifica se o tipo de massagem existe
        $massageType = TypeMassage::find($id);
        if (!$massageType) {
            // Verifica se é uma requisição AJAX
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tipo de massagem não encontrado.'
                ]);
            }
            return redirect()->back()->with('error', 'Tipo de massagem não encontrado.');
        }

        // Validação dos dados
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:20',
                'date' => 'required|date',
                'hour' => 'required|string',
                'duration' => 'required|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Dados inválidos. Verifique e tente novamente.',
                    'errors' => $e->errors()
                ]);
            }
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        // Verifica disponibilidade
        $isBooked = BookingMassage::where('type_massage_id', $id)
            ->where('date', $validated['date'])
            ->where('hour', $validated['hour'])
            ->exists();

        if ($isBooked) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Este horário já está reservado. Por favor, escolha outro.'
                ]);
            }
            return redirect()->back()->with('error', 'Este horário já está reservado. Por favor, escolha outro.');
        }

        // Cria a reserva
        if (Auth::check()) {
            $validated['user_id'] = Auth::id();
        }
        
        // Cria a reserva
        try {
            BookingMassage::create([
                'user_id' => $validated['user_id'] ?? null,
                'type_massage_id' => $id,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'date' => $validated['date'],
                'hour' => $validated['hour'],
                'duration' => $validated['duration'],
                'status' => 'pendente',
            ]);

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Reserva criada com sucesso!'
                ]);
            }
            return redirect()->back()->with('success', 'Reserva criada com sucesso!');
        } catch (\Exception $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erro ao criar reserva: ' . $e->getMessage()
                ]);
            }
            return redirect()->back()->with('error', 'Erro ao criar reserva: ' . $e->getMessage());
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
