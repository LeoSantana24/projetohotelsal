<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\TypeMassage;
use App\Models\Contact;
use App\Models\TypeRoom;


class HomeController extends Controller
{

    public function index()
{
    $rooms = Room::with(['typeRoom', 'images'])->get();
    return view('home.index', compact('rooms'));
}

    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details', compact('room'));
    }

    public function contact()
    {
       
        return view('home.contact');
    }

     public function checkout()
    {
       
        return view('home.checkout');
    }
    



    public function sendcontact(Request $request)
    {

        $contact = new Contact;

        $contact->name = $request->name;

        $contact->email = $request->email;

        $contact->phone = $request->phone;

        $contact->message = $request->message;

        $contact->save();


        return redirect()->back()->with('message','Message Sent Successfully');
    }

    public function gallery()
    {
        return view('home.gallery');
    }
    public function about()
    {
        return view('home.about');
    }
    

   
    public function massagens()
    {
        $massages = TypeMassage::all();
        return view('home.massagens',compact('massages'));
    }

   public function test() 
{
    $rooms = Room::with(['images', 'typeRoom'])->get(); 
    return view('home.test', compact('rooms'));
}


    

}
