<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Room;

use App\models\Booking;

use App\models\Gallery;

use App\Models\RoomImage;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;

            

            if($usertype =='user')
            {
                $room = Room::all();

                $gallery = Gallery::all();

                return view('home.index',compact('room','gallery'));
            }
            if($usertype =='admin')
            {
                return view('admin.index');
            }else{

                return redirect()->back();
            }
        }
    }
    public function home()
    {
        $room = Room::all();

        $gallery = Gallery::all();
        
        return view('home.index',compact('room','gallery'));

        
    }

    public function create_room()
    {
        $features = \App\Models\Feature::all(); // Importa todas as características
        return view('admin.create_room', compact('features'));
    }
    
    public function add_room(Request $request)
    {
        $data = new Room;
    
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->room_type = $request->type;
        
        $data->save();
    
        // Salvar as imagens
        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagename = time().'_'.$image->getClientOriginalName();
                $image->move('room', $imagename);
    
                $roomImage = new RoomImage;
                $roomImage->room_id = $data->id;
                $roomImage->image = $imagename;
                $roomImage->save();
            }
        }
    
        // Associar features
        if ($request->has('features')) {
            $data->features()->sync($request->features); // aqui espera array de IDs
        }
    
        return redirect()->back();
    }
    
    public function view_room()
    {
        $data = Room::all();

        return view('admin.view_room',compact('data'));
    }

    public function room_delete($id)
    {
        $data = Room::find($id);

        $data->delete();

        return redirect()->back();
    }
    public function room_update($id)
{
    $data = Room::find($id);
    $features = \App\Models\Feature::all();
    return view('admin.update_room', compact('data', 'features'));
}


    public function edit_room(Request $request , $id)
{
    $data = Room::find($id);

    $data->room_title = $request->title;
    $data->description = $request->description;
    $data->price = $request->price;
    $data->wifi = $request->wifi;
    $data->room_type = $request->type;

    $image=$request->image;
    if($image)
    {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('room', $imagename);
        $data->image = $imagename;
    }

    $data->save();

    // Atualizar os features
    if ($request->has('features')) {
        $data->features()->sync($request->features); // substitui os antigos pelos novos
    }

    return redirect()->back();
}

    public function bookings()
    {
        $rooms = Room::with('images')->get();
        $data=Booking::all();
        return view('admin.booking',compact('data'));
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
}
