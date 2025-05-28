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
use App\Models\TypeRoom;



class BookingController extends Controller
{
    public function roomFeatures($id)
    {
        $room = Room::with('features')->findOrFail($id);
        return response()->json($room->features);
    }

   public function add_booking(Request $request, $id)
{
    $request->validate([
        // Mantenha suas validações atuais
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        // ... outras validações
    ]);

    // Adicione automaticamente o user_id se o usuário estiver logado
    $userData = [];
    if (Auth::check()) {
        $user = Auth::user();
        $userData = [
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone
        ];
    }

    // Restante da sua lógica de verificação de datas...

    // Se for para adicionar ao carrinho
    if ($request->input('action') === 'Add to cart' || $request->input('action') === 'checkout') {
        $cart = session()->get('cart', []);
        
        $cartItem = [
            'room_id' => $id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'number_adults' => $request->number_adults,
            'number_children' => $request->number_children,
            'price' => $request->price,
            'baby_crib' => $request->has('baby_crib'),
        ] + $userData; // Merge com os dados do usuário

        $cart[] = $cartItem;
        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'Reservation added to cart!');
    }

    // Se for para reservar direto
    Booking::create([
        'room_id' => $id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'number_adults' => $request->number_adults,
        'number_children' => $request->number_children,
    ] + $userData); // Merge com os dados do usuário

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
            $bookingData = [
                'room_id' => $item['room_id'],
                'start_date' => $item['start_date'],
                'end_date' => $item['end_date'],
                'number_adults' => $item['number_adults'],
                'number_children' => $item['number_children'],
                'baby_crib' => !empty($item['baby_crib']),
            ];

            // Adiciona user_id se existir no item do carrinho
            if (isset($item['user_id'])) {
                $bookingData['user_id'] = $item['user_id'];
            }

            // Mantém os dados do formulário como fallback
            $bookingData += [
                'name' => $item['name'] ?? null,
                'email' => $item['email'] ?? null,
                'phone' => $item['phone'] ?? null,
            ];

            Booking::create($bookingData);
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

    // Busca as reservas do usuário pelo user_id (prioritário) ou por email (fallback)
    $data = Booking::where(function($query) use ($user) {
            $query->where('user_id', $user->id)
                  ->orWhere('email', $user->email);
        })
        ->orderBy('start_date', 'desc')
        ->get();

    return view('home.profile', compact('data'));
}






}

    

