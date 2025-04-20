<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details', compact('room'));
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function gallery()
    {
        return view('home.gallery');
    }

   
    public function massagens()
    {
        return view('home.massagens');
    }

    public function test()
    {
        $rooms = Room::with('images')->get(); 
        return view('home.test', compact('rooms'));
    }

    

}
