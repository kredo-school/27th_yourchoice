<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelAdminController extends Controller
{
  //
  public function profileshow()
  {
    return view('hotels.profile.show');
  }

  public function profileedit()
  {
    return view('hotels.profile.edit');
  }

  public function roomsshow()
  {
    return view('hotels.rooms.show');
  }

  public function roomscreate()
  {
    return view('hotels.rooms.create');
  }

  public function roomsedit()
  {
    return view('hotels.rooms.edit');
  }

    public function reservation_show_daily()
    {
        return view('hotels.reservations.show_daily');
    }

    public function reservation_show_monthly()
    {
        return view('hotels.reservations.show_monthly');
    }

    public function edit()
    {
        return view('hotels.reservations.edit');
    }




  // BE memo RoomList Rina
  // private $room;

  // public function __construct(Room $room)
  // {
  //   $this->room = $room;
  // }

  // public function index()
  // {
  //   $all_rooms = $this->room->get();
  //   return view('rooms.show')->with('rooms', $all_rooms);
  // }

  // //roomsフォルダのshowページにpostされたデータが保存される
  // public function store(Request $request)
  // {
  //   #1. Validate all form data
  //   $request->validate([
  //     'room_number' => 'required|min:1|max:50|unique:rooms,number',
  //     'room_type' => 'required',
  //     'room_price' => 'required|min:1|max:30000',
  //     'room_image' => '',
  //     'room_remerks' => 'min:1|max:1000',
  //   ]);
  //   #2. Save the room
  //   $this->room->number  = $request->room->number;
  //   $this->room->type    = $request->room->type;
  //   $this->room->price   = $request->room->price;
  //   $this->room->image   = $request->room->image;
  //   $this->room->remerks = $request->room->remerks;

  //   $this->room->save();
  //   #3. Go back
  //   return redirect()->back();
  // }
}
