<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use App\Models\BookingMassage;

class UserController extends Controller
{
    
    public function perfil()
    {
        $user = Auth::user();
        return view('user.perfil', compact('user')); 
    }
    public function profile()
    {
        
        return view('user.profile'); 
    }
    public function editarPerfil()
{
    $user = Auth::user();
    return view('user.editarperfil', compact('user'));
}

   
    public function atualizarPerfil(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'email' => 'required|email|unique:users,email,'.$user->id,
        'phone' => 'nullable|string|max:20',
        'country' => 'nullable|string|max:100',  
    ]);

    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->country = $request->country;  
    $user->save();

    return redirect()->route('user.perfil')->with('success', 'Profile updated successfully!');
}



   public function minhasreservas()
{
    $user = Auth::user();
    
    // Consulta com fallback para email
    $reservas = Booking::with([
            'room' => function($query) {
                $query->with(['typeRoom', 'images']);
            }
        ])
        ->where(function($query) use ($user) {
            $query->where('user_id', $user->id)
                  ->orWhere('email', $user->email);
        })
        ->orderBy('start_date', 'desc')
        ->paginate(10);

    // Debug no log (verifique storage/logs/laravel.log)
    \Log::debug('Reservas do usuário', [
        'user_id' => $user->id,
        'count' => $reservas->count(),
        
    ]);

    return view('user.minhasreservas', compact('reservas', 'user'));
}

    /**
     * Exibe detalhes de uma reserva específica
     */
    public function reservadetalhes($id)
    {
        $user = Auth::user();
        
        $reserva = Booking::with(['room.typeRoom', 'room.images'])
            ->where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();
        
        return view('user.reservadetalhes', compact('reserva'));
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

    return view('user.profile', compact('data'));
}
public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }

public function minhasMassagens()
    {
        $user = Auth::user();
        
        // Consulta com fallback para email
        $reservasMassagem = BookingMassage::with('typeMassage')
            ->where(function($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->orWhere('email', $user->email);
            })
            ->orderBy('date', 'desc')
            ->orderBy('hour', 'desc')
            ->paginate(10);

        // Debug no log (verifique storage/logs/laravel.log)
        \Log::debug('Reservas de massagem do usuário', [
            'user_id' => $user->id,
            'count' => $reservasMassagem->count(),
        ]);

        return view('user.minhasmassagens', compact('reservasMassagem', 'user'));
    }

    /**
     * Cancela uma reserva de massagem
     */
    public function cancelarMassagem($id)
    {
        $user = Auth::user();
        
        $reserva = BookingMassage::where('id', $id)
            ->where(function($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->orWhere('email', $user->email);
            })
            ->firstOrFail();
        
        // Verifica se a reserva já foi aprovada
        if ($reserva->status == 'aprovado' || $reserva->status == 'confirmada') {
            return redirect()->back()->with('error', 'It is not possible to cancel a reservation that has already been approved. Please contact the property.');
        }
        
        // Atualiza o status para cancelado
        $reserva->status = 'cancelado';
        $reserva->save();
        
        return redirect()->back()->with('success', 'Massage reservation cancelled successfully.');
    }

    public function cancelarReservaQuarto($id)
{
    $user = Auth::user();

    $reserva = Booking::where('id', $id)
        ->where(function($query) use ($user) {
            $query->where('user_id', $user->id)
                  ->orWhere('email', $user->email);
        })
        ->firstOrFail();

    // Verifica se a reserva já foi aprovada ou finalizada
    if ($reserva->status == 'aprovado' || $reserva->status == 'confirmada' || $reserva->status == 'finalizada') {
        return redirect()->back()->with('error', 'Não é possível cancelar uma reserva já aprovada ou finalizada. Por favor, entre em contato com a recepção.');
    }

    // Atualiza o status da reserva para cancelado
    $reserva->status = 'cancelado';
    $reserva->save();

    return redirect()->back()->with('success', 'Room reservation successfully cancelled.');
}

}