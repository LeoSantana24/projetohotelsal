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
    public function addToCart(Request $request, $id)
    {
        $room = Room::find($id);

        if (!$room) {
            return redirect()->back()->with('error', 'Quarto não encontrado.');
        }

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $cart = session()->get('cart', []);

        // Verifica se já existe uma reserva para o mesmo quarto com datas sobrepostas
        foreach ($cart as $item) {
            if ($item['room_id'] == $room->id) {
                $existingStart = Carbon::parse($item['start_date']);
                $existingEnd = Carbon::parse($item['end_date']);

                if ($startDate < $existingEnd && $endDate > $existingStart) {
                    return redirect()->back()->with('error', 'Este quarto já está no carrinho com datas que se sobrepõem.');
                }
            }
        }

        // Adiciona ao carrinho
        $cart[] = [
            'room_id' => $room->id,
            'room_title' => $room->room_title,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'start_date' => $startDate->toDateString(),
            'end_date' => $endDate->toDateString(),
            'number_adults' => $request->number_adults,
            'number_children' => $request->number_children,
            'price' => $room->price,
            'baby_crib' => $request->number_children > 0 && $request->has('baby_crib'),
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Reserva adicionada ao carrinho!');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('home.cart', compact('cart'));
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
