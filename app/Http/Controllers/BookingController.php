<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Support\Facades\DB; // se não estiver usando ainda





class BookingController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        dd('BookingController funcionando!');
        $room = Room::find($id);
    
        if (!$room) {
            return redirect()->route('cart')->with('error', 'Quarto não encontrado.');
        }
    
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
    
        // Recupera o carrinho atual da sessão
        $cart = session()->get('cart', []);
    
        // Verifica se já existe uma reserva para o mesmo quarto e datas sobrepostas no carrinho
        foreach ($cart as $item) {
            if ($item['room_id'] == $room->id) {
                $existingStart = Carbon::parse($item['start_date']);
                $existingEnd = Carbon::parse($item['end_date']);
    
                // Verificação de sobreposição de datas
                if (
                    $startDate < $existingEnd && $endDate > $existingStart
                ) {
                    return redirect()->back()->with('error', 'Este quarto já está no carrinho com datas que se sobrepõem.');
                }
            }
        }
    
        // Se não houver sobreposição, adiciona ao carrinho
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
        ];
    
        // Atualiza o carrinho na sessão
        session()->put('cart', $cart);
    
        return redirect()->route('cart')->with('success', 'Reserva adicionada ao carrinho!');
    }
    

public function showCart()
{
    // Recupera o carrinho da sessão
    $cart = session()->get('cart', []);

    // Passa o carrinho para a view
    return view('home.cart', compact('cart'));
}
}