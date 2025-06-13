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
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $startDate = Carbon::parse($request->start_date)->toDateString();
        $endDate = Carbon::parse($request->end_date)->toDateString();

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

        if ($request->input('action') === 'Add to cart' || $request->input('action') === 'checkout') {
    $cart = session()->get('cart', []);
    $newStart = Carbon::parse($request->start_date)->format('Y-m-d');
    $newEnd = Carbon::parse($request->end_date)->format('Y-m-d');

    // Verificar conflitos com o carrinho
    foreach ($cart as $item) {
        if ($item['room_id'] == $id) {
            $existingStart = Carbon::parse($item['start_date'])->format('Y-m-d');
            $existingEnd = Carbon::parse($item['end_date'])->format('Y-m-d');

            if ($newStart < $existingEnd && $newEnd > $existingStart) {
                return redirect()->back()->with('error', 'This room is already in your cart for overlapping dates.');
            }
        }
    }

    // Verificar conflitos com reservas no banco de dados
    $conflictingBooking = Booking::where('room_id', $id)
        ->where('start_date', '<', $newEnd)
        ->where('end_date', '>', $newStart)
        ->exists();

    if ($conflictingBooking) {
        return redirect()->back()->with('error', 'This room is already booked in the selected period.');
    }

    // Se não houver conflito, adiciona ao carrinho
    $cartItem = [
        'room_id' => $id,
        'start_date' => $newStart,
        'end_date' => $newEnd,
        'number_adults' => $request->number_adults,
        'number_children' => $request->number_children,
        'price' => $request->price,
        'baby_crib' => $request->has('baby_crib'),
    ] + $userData;

    $cart[] = $cartItem;
    session()->put('cart', $cart);

    return redirect()->back()->with('message', 'Reservation added to cart!');
}


        // Verifica conflito com reservas existentes no banco
        $conflictingBooking = Booking::where('room_id', $id)
            ->where('start_date', '<', $endDate)
            ->where('end_date', '>', $startDate)
            ->exists();

        if ($conflictingBooking) {
            return redirect()->back()->with('error', 'This room is already booked during the selected dates.');
        }

        // Reserva direta (sem carrinho)
        Booking::create([
            'room_id' => $id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'number_adults' => $request->number_adults,
            'number_children' => $request->number_children,
        ] + $userData);
        
 
        return redirect()->back()->with('message', 'Reservation successful! Check your email.');
   
        
    }
    

    public function removeFromCart($index)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$index])) {
            unset($cart[$index]);
            $cart = array_values($cart);
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

    public function add_massage_booking(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'date' => 'required|date|after_or_equal:today',
            'hour' => 'required|date_format:H:i',
            'duration' => 'required|string|in:30min,60min,90min',
        ]);

        $massage = TypeMassage::findOrFail($id);

        $isBooked = BookingsMassage::where('type_massage_id', $id)
            ->where('date', $request->date)
            ->where('hour', $request->hour)
            ->exists();

        if ($isBooked) {
            $formattedDate = date('d/m/Y', strtotime($request->date));
            return redirect()->back()->with('message', "There is already a reservation for this time on $formattedDate at {$request->hour}. Please choose another time.");
        }

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
                $startDate = Carbon::parse($item['start_date'])->toDateString();
                $endDate = Carbon::parse($item['end_date'])->toDateString();

                $conflictingBooking = Booking::where('room_id', $item['room_id'])
                    ->where('start_date', '<', $endDate)
                    ->where('end_date', '>', $startDate)
                    ->exists();

                if ($conflictingBooking) {
                    DB::rollBack();
                    return redirect()->back()->with('error', "Room {$item['room_id']} is already booked from {$startDate} to {$endDate}.");
                }

                $bookingData = [
                    'room_id' => $item['room_id'],
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'number_adults' => $item['number_adults'],
                    'number_children' => $item['number_children'],
                    'baby_crib' => !empty($item['baby_crib']),
                    'name' => $item['name'] ?? null,
                    'email' => $item['email'] ?? null,
                    'phone' => $item['phone'] ?? null,
                ];

                if (isset($item['user_id'])) {
                    $bookingData['user_id'] = $item['user_id'];
                }

                Booking::create($bookingData);
            }

            DB::commit();
            session()->forget('cart');
              Notification::route('mail', $item['email'])->notify(new SendEmailNotification([
    'greeting' => 'Hello ' . $item['name'] . '!',
    'body' => 'Your reservation was successful from ' . $startDate . ' to ' . $endDate . '.',
    'endline' => 'Thank you for choosing our hotel!'
]));

            return redirect()->back()->with('success', 'Reservation completed successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error completing reservation: ' . $e->getMessage());
        }
    }

    public function showprofile()
    {
        $user = Auth::user();

        $data = Booking::where(function($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->orWhere('email', $user->email);
            })
            ->orderBy('start_date', 'desc')
            ->get();

        return view('home.profile', compact('data'));
    }
}
