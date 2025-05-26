<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use App\Models\BookingsMassage;
use App\Models\TypeMassage;



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
            
                return redirect()->back()->with('message', "The room is already booked for the period you selected: from $start to $end. Please choose another date.");
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
                        return redirect()->back()->with('message', 'This room has already been booked for the period selected in the cart. Please choose another date.');
                    }
                }
            }


        // Se for para adicionar ao carrinho
        if ($request->input('action') === 'Add to cart' || $request->input('action') === 'checkout') {
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

            return redirect()->back()->with('message', 'Reservation added to cart!');
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

        return redirect()->back()->with('message', 'Reservation successful! Check your email.');
    }

    public function removeFromCart($index)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$index])) {
            unset($cart[$index]);
            $cart = array_values($cart); // Reindexa
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Reservation removed from cart.');
        }

        return redirect()->back()->with('error', 'Reservation not found.');
    }

    public function resetCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleaned successfully.');
    }

    public function showMassageBooking()
    {
        $massages = TypeMassage::all();
        return view('home.massagens', compact('massages'));
    }
    
   

// Adicionar reserva Massagem
public function add_massage_booking(Request $request, $id)
{
    // Validação dos dados
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'date' => 'required|date|after_or_equal:today',
        'hour' => 'required|date_format:H:i',
        'duration' => 'required|string|in:30min,60min,90min',
    ]);

    // Verifica se o tipo de massagem existe
    $massage = TypeMassage::findOrFail($id);

    // Verifica se já há uma reserva nesse mesmo horário e data
    $isBooked = BookingsMassage::where('type_massage_id', $id)
        ->where('date', $request->date)
        ->where('hour', $request->hour)
        ->exists();

    if ($isBooked) {
        $formattedDate = date('d/m/Y', strtotime($request->date));
        return redirect()->back()->with('message', "There is already a reservation for this time on $formattedDate at {$request->hour}. Please choose another time.");
    }

    // Cria a reserva
    BookingsMassage::create([
        'type_massage_id' => $id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'date' => $request->date,
        'hour' => $request->hour,
        'duration' => $request->duration,
    ]);

    return redirect()->back()->with('success', 'Massage reservation created successfully!');
}
public function finishcheckout(Request $request)
{
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()->back()->with('error', 'Empty cart. Please add a reservation before checkout.');
    }

    DB::beginTransaction();

    try {
        foreach ($cart as $item) {
            Booking::create([
                'room_id' => $item['room_id'],
                'name' => $item['name'],
                'email' => $item['email'],
                'phone' => $item['phone'],
                'start_date' => $item['start_date'],
                'end_date' => $item['end_date'],
                'number_adults' => $item['number_adults'],
                'number_children' => $item['number_children'],
                'baby_crib' => !empty($item['baby_crib']),
            ]);
        }

        DB::commit();
        session()->forget('cart');

        return redirect()->back()->with('success', 'Reservation completed successfully!');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', 'Error completing reservation: ' . $e->getMessage());
    }
}
public function showprofile()
{
    $user = Auth::user();

    // Busca as reservas do usuário pelo e-mail
    $data = Booking::where('email', $user->email)->orderBy('start_date', 'desc')->get();

    return view('home.profile', compact('data'));
}






}

    

