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
  public function reviewlist()
  {
      return view('hotels.reviews.list');
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
  //     'room_number'  => 'required|min:1|max:50|unique:rooms,number',
  //     'room_type'    => 'required',
  //     'room_price'   => 'required|min:1|max:30000',
  //     'room_image'   => '',
  //     'room_remarks' => 'min:1|max:1000',
  //   ]);

  //   #2. Save the room
  //   $this->room->number  = $request->room->number;
  //   $this->room->type    = $request->room->type;
  //   $this->room->price   = $request->room->price;
  //   $this->room->image   = $request->room->image;
  //   $this->room->remarks = $request->room->remarks;

  //   $this->room->save();
  //   #3. Go back
  //   return redirect()->back();
  // }

//   public function show($id)
//   {
//     $room = $this->room->findOrFail($id);

//     return view('hotels.rooms.show')
//       ->with('room', $room);
//   }

//   public function update(Request $request, $id)
//   {
//     #1. Validate the data from the form
//     $request->validate([
//       'room_number'  => 'required|min:1|max:50|unique:rooms,number',
//       'room_type'    => 'required',
//       'room_price'   => 'required|min:1|max:30000',
//       'room_image'   => '',
//       'room_remarks' => 'min:1|max:1000',
//     ]);

//     #2. Update the post
//     $room              = $this->room->findOrFail($id);
//     $room->number  = $request->room->number;
//     $room->type    = $request->room->type;
//     $room->price   = $request->room->price;
//     $room->image   = $request->room->image;
//     $room->remarks = $request->room->remarks;

//     //If there is a new image
//     if ($request->image) {
//       $room->image = 'data:image.' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
//     }
//       $room->save()
// }



 // BE memo profile Rina
  // private $room;

  // public function __construct(Room $room)
  // {
  //   $this->room = $room;
  // }


















}