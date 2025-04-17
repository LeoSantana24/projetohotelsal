<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function roomFeatures($id)
    {
        $room = Room::with('features')->findOrFail($id);
        return response()->json($room->features);
    }

    public function add_booking(Request $request, $id)
{
    // Validação dos dados do formulário
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
        'number_adults' => 'required|integer|min:1',
        'number_children' => 'nullable|integer|min:0',
    ]);
    

    $room = Room::findOrFail($id);

    // Verificação de datas ocupadas (independente da ação)
    $isBooked = Booking::where('room_id', $id)
        ->where('start_date', '<=', $request->end_date)
        ->where('end_date', '>=', $request->start_date)
        ->exists();

        if ($isBooked) {
            $start = date('d/m/Y', strtotime($request->start_date));
            $end = date('d/m/Y', strtotime($request->end_date));
        
            return redirect()->back()->with('message', "O quarto já está reservado no período que você escolheu: de $start até $end. Por favor, escolha outra data.");
        }
        
        // Verificar conflitos de datas dentro do carrinho para o mesmo quarto
        $cart = session()->get('cart', []);
        foreach ($cart as $item) {
            if ($item['room_id'] == $id) {
                $existingStart = Carbon::parse($item['start_date']);
                $existingEnd = Carbon::parse($item['end_date']);
                $newStart = Carbon::parse($request->start_date);
                $newEnd = Carbon::parse($request->end_date);

                // Se as datas se sobrepõem
                if ($newStart <= $existingEnd && $newEnd >= $existingStart) {
                    return redirect()->back()->with('message', 'Este quarto já foi reservado para o período selecionado no carrinho. Por favor, escolha outra data.');
                }
            }
        }


    // Se for para adicionar ao carrinho
    if ($request->input('action') === 'Adicionar ao Carrinho') {
        $cart = session()->get('cart', []);

        $cart[] = [
            'room_id' => $id,
            'room_title' => $room->room_title,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'number_adults' => $request->number_adults,
            'number_children' => $request->number_children,
            'price' => $room->price,
            'baby_crib' => $request->has('baby_crib'),
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'Reserva adicionada ao carrinho!');
    }

    // Se for para reservar direto
    Booking::create([
        'room_id' => $id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'number_adults' => $request->number_adults,
        'number_children' => $request->number_children,
    ]);

    return redirect()->back()->with('message', 'Reserva realizada com sucesso!');
}
public function removeFromCart($index)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$index])) {
            unset($cart[$index]);
            $cart = array_values($cart); // Reindexa
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Reserva removida do carrinho.');
        }

        return redirect()->back()->with('error', 'Reserva não encontrada.');
    }

    public function resetCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Carrinho limpo com sucesso.');
    }
}

    

