<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Room;

use App\models\Booking;

use App\models\Gallery;

use App\Models\RoomImage;
use App\Models\Feature;


use App\Models\TypeMassage;
use App\Models\TypeRoom;

use App\Models\BookingMassage;
use App\Models\Contact;
use App\Notifications\SendEmailNotification;
use Carbon\Carbon;

use Notification;


class AdminController extends Controller
{
    public function index()
    {

        $novosClientes = User::where('created_at', '>=', Carbon::now()->subDays(30))
                            ->where('usertype', '!=', 'admin')
                            ->count();
        
        // Percentual de novos clientes em relação ao total
        $totalClientes = User::where('usertype', '!=', 'admin')->count();
        $percentualClientes = $totalClientes > 0 ? ($novosClientes / $totalClientes) * 100 : 0;
        
        // Reservas de quarto pendentes
        $reservasQuarto = Booking::where('status', 'waiting')
                                ->orderBy('created_at', 'desc')
                                ->count();
        
        // Percentual de reservas pendentes em relação ao total de reservas do mês atual
        $totalReservasQuartoMes = Booking::whereMonth('created_at', Carbon::now()->month)
                                        ->whereYear('created_at', Carbon::now()->year)
                                        ->count();
        $percentualReservasQuarto = $totalReservasQuartoMes > 0 ? ($reservasQuarto / $totalReservasQuartoMes) * 100 : 0;
        
        // Reservas de massagem pendentes
        $reservasMassagem = BookingMassage::where('status', 'waiting')
                                        ->orderBy('created_at', 'desc')
                                        ->count();
        
        // Percentual de reservas de massagem pendentes em relação ao total de reservas do mês atual
        $totalReservasMassagemMes = BookingMassage::whereMonth('created_at', Carbon::now()->month)
                                                ->whereYear('created_at', Carbon::now()->year)
                                                ->count();
        $percentualReservasMassagem = $totalReservasMassagemMes > 0 ? ($reservasMassagem / $totalReservasMassagemMes) * 100 : 0;
        
        // Mensagens recentes (últimas 5)
        $mensagens = Contact::orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();
        
        return view('admin.index', compact(
            'novosClientes', 
            'percentualClientes',
            'reservasQuarto', 
            'percentualReservasQuarto',
            'reservasMassagem', 
            'percentualReservasMassagem',
            'mensagens'
        ));
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                $room = Room::all();
                $gallery = Gallery::all();
                return view('home.index', compact('room', 'gallery'));
            }

            if ($usertype == 'admin') {
                return view('admin.index');
            }

            return redirect()->back();
        }
    }

    public function home()
    {
        $room = Room::with('typeRoom')->get();

        $massages = Typemassage::all();
        $gallery = Gallery::all();

        return view('home.index', compact('room', 'gallery', 'massages'));
    }

    public function create_room()
    {
        $features = Feature::all();
        $typeRooms = TypeRoom::all();

        return view('admin.create_room', compact('features', 'typeRooms'));
    }

    public function add_room(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'price' => 'required|numeric',
            'type_room_id' => 'required|exists:type_room,id',
            'images.*' => 'image',
        ]);

        $room = new Room;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->type_room_id = $request->type_room_id;
        $room->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move('room', $imageName);

                RoomImage::create([
                    'room_id' => $room->id,
                    'image' => $imageName,
                ]);
            }
        }

        if ($request->has('features')) {
            $room->features()->sync($request->features);
        }

        return redirect()->back()->with('success', 'Quarto adicionado com sucesso.');
    }

    public function view_room()
    {
        $data = Room::with('typeRoom')->get();
        return view('admin.view_room', compact('data'));
    }

    public function room_delete($id)
    {
        $room = Room::findOrFail($id);

        // Deletar imagens associadas
        foreach ($room->images as $image) {
            $path = public_path('room/' . $image->image);
            if (file_exists($path)) {
                unlink($path);
            }
            $image->delete();
        }

        $room->features()->detach(); // Remover relacionamento com features

        $room->delete();

        return redirect()->back()->with('success', 'Quarto removido com sucesso.');
    }

    public function room_update($id)
    {
        $data = Room::findOrFail($id);
        $features = Feature::all();
        $typeRooms = TypeRoom::all();

        return view('admin.update_room', compact('data', 'features', 'typeRooms'));
    }

    public function edit_room(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
            'price' => 'required|numeric',
            'type_room_id' => 'required|exists:type_room,id',
            'images.*' => 'image',
        ]);

        $room = Room::findOrFail($id);
        $room->description = $request->description;
        $room->price = $request->price;
        $room->type_room_id = $request->type_room_id;
        $room->save();

        // Apagar imagens antigas
        foreach ($room->images as $oldImage) {
            $imagePath = public_path('room/' . $oldImage->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $oldImage->delete();
        }

        // Adicionar novas imagens
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move('room', $imageName);

                RoomImage::create([
                    'room_id' => $room->id,
                    'image' => $imageName,
                ]);
            }
        }

        // Atualizar features
        $room->features()->sync($request->input('features', []));

        return redirect()->back()->with('success', 'O quarto foi atualizado com sucesso.');
    }



//Massagem
public function create_type_massage()
{
    
    return view('admin.create_type_massage');
}

public function add_type_massage(Request $request)
{
   $massage =  new typeMassage;
   
    $massage->massage_title = $request->massage_title;
    $massage->description =$request->description;
    $massage->price = $request->price;
    $image=$request->image;

    if($image)
    {
        $imagename=time().'.'.$image->getCLientOriginalExtension();

        $request->image->move('Type_massage',$imagename);
        $massage->image=$imagename;
    }

    $massage->save();

    return redirect()->back();
   

    
  
}

//ver massagens
public function view_massages()
    {
        $massages = TypeMassage::all();
        return view('admin.view_massages', compact('massages'));
    }

    public function edit_massage($id)
    {
        $massage = TypeMassage::findOrFail($id);
        return view('admin.update_massage', compact('massage'));
    }

    public function update_massage(Request $request, $id)
    {
        $massage = TypeMassage::findOrFail($id);

        $massage->massage_title = $request->massage_title;
        $massage->description = $request->description;
        $massage->price = $request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('Type_massage', $imageName);
            $massage->image = $imageName;
        }

        $massage->save();

        return redirect()->back()->with('success', 'A massagem foi atualizada com sucesso.');
    }

    public function delete_massage($id)
    {
        $massage = TypeMassage::findOrFail($id);

        if ($massage->image) {
            $imagePath = public_path('Type_massage/' . $massage->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $massage->delete();

        return redirect()->back()->with('success', 'A massagem foi apagada com sucesso.');

    }


   public function bookings()
{
    $rooms = Room::with(['images', 'typeRoom'])->get(); // 👈 CORRIGIDO AQUI
    $data = Booking::all();
    return view('admin.booking', compact('data', 'rooms')); // 👈 Adicionei 'rooms' se você usa na view
}

    public function delete_booking($id)
    {
        $data = Booking::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function approve_book($id)
    {
        $booking = Booking::find($id);

        $booking->status= 'aprovado';

        $booking->save();

        return redirect()->back();
    }

    public function reject_book($id)
    {
        $booking = Booking::find($id);

        $booking->status= 'rejeitado';

        $booking->save();

        return redirect()->back();
    }
    public function massageBookings()
    {
        $massagesBookings = BookingMassage::with('typeMassage')->orderBy('date', 'desc')->get();
    return view('admin.massageBookings', compact('massagesBookings'));
    }
    public function view_gallery()
    {
        $gallery = Gallery::all();
        return view('admin.gallery', compact('gallery'));
    }

    public function upload_gallery(Request $request)
    {
        $data = new Gallery;

        $image = $request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('gallery',$imagename);

            $data->image = $imagename;

            $data->save();

            return redirect()->back();
        }

     
    }

    public function delete_gallery($id)
    {
        $data = Gallery::find($id);

        $data->delete();

        return redirect()->back();
    }
    public function all_messages()
    {
        $data = Contact::all();

        return view('admin.all_message',compact('data'));
    }
    public function send_email($id)
    {
        $data = Contact::find($id);
        return view('admin.send_email',compact('data'));
    }
    public function email(Request $request,$id)
    {
        $data = Contact::find($id);

        $details = [

            'greeting' => $request->greeting,

            'body' => $request->body,

            'endline' => $request->endline,


        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back();
    }
}
