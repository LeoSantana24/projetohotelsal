<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Room;

use App\models\Booking;

use App\models\Gallery;

use App\Models\RoomImage;

use App\Models\TypeMassage;

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
        $massages = Typemassage::all();


        $gallery = Gallery::all();
        
        return view('home.index',compact('room','gallery','massages'));

        
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
    
        return redirect()->back()->with('success', 'Quarto adicionado com sucesso.');
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

        return redirect()->back()->with('success', 'Quarto removido com sucesso.');
    }
    public function room_update($id)
{
    $data = Room::find($id);
    $features = \App\Models\Feature::all();
    return view('admin.update_room', compact('data', 'features'));
}


    public function edit_room(Request $request, $id)
{
    $data = Room::find($id);

    $data->room_title = $request->title;
    $data->description = $request->description;
    $data->price = $request->price;
    $data->room_type = $request->type;

    $data->save();

    // Remover imagens antigas
    $oldImages = RoomImage::where('room_id', $id)->get();
    foreach ($oldImages as $oldImage) {
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

            // Inserir nova imagem
            RoomImage::create([
                'room_id' => $id,
                'image' => $imageName,
            ]);
        }
    }

    // Atualizar os features
    if ($request->has('features')) {
        // Atualizar os features
$data->features()->sync($request->input('features', []));


    }

    return redirect()->back()->with('success', 'O quarto foi atualizada com sucesso.');
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
