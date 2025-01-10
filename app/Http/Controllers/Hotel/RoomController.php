<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
  public function __construct(Room $room)
  {

    $this->room = $room;

  }

  public function show()
  {
    $hotelId = Auth::user()->hotel->id;

    $rooms = $this->room->where('hotel_id', $hotelId)->get();
    
    return view('hotels.rooms.show')->with('rooms',$rooms);
  }

  public function create()
  {
    return view('hotels.rooms.create');
  }

  public function store(Request $request)
  {
    $hotelId = Auth::user()->hotel->id;

        // バリデーション
        $validated = $request->validate([
          'room_number' => [
            'required',
            'integer',
            Rule::unique('rooms')->where('hotel_id', Auth::user()->hotel->id),],
          'room_type' => 'required|string|max:100',
          'room_price' => 'required|numeric|min:0',
          'capacity' => 'required|integer|min:1',
          'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

          'room_remarks' => 'nullable|string|max:255',
      ]);

      // 部屋の登録
      $room = new Room();
      $room->room_number = $validated['room_number'];
      $room->room_type = $validated['room_type'];
      $room->price = $validated['room_price'];
      $room->capacity = $validated['capacity'];

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $base64Image = 'data:image/' . $image->getClientOriginalExtension() . ';base64,' . base64_encode(file_get_contents($image));
        $room->image = $base64Image;
    }
    
      $room->remarks = $validated['room_remarks'];
      $room->hotel_id = $hotelId; // 例としてホテルIDを固定値1に設定
      $room->save();

      return redirect()->route('hotel.room.show')->with('success', 'Room registered successfully!');

  }

  public function edit($id)
  {
      // 指定されたIDの部屋を取得
      $room = Room::findOrFail($id);

      // ビューに部屋情報を渡す
      return view('hotels.rooms.edit')->with('room',$room);
  }

  public function update(Request $request, $id)
{
    // バリデーション
    $validated = $request->validate([
      'room_number' => [
        'required',
        'integer',
        Rule::unique('rooms')->where('hotel_id', Auth::user()->hotel->id)->ignore($id),],
      'room_type' => 'required|string|max:100',
      'room_price' => 'required|numeric|min:0',
      'capacity' => 'required|integer|min:1',
      'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

      'room_remarks' => 'nullable|string|max:255',
  ]);

    // 対象の部屋を取得
    $room = Room::findOrFail($id);

    // 入力データを更新
    $room->room_number = $validated['room_number'];
    $room->room_type = $validated['room_type'];
    $room->price = $validated['room_price'];
    $room->capacity = $validated['capacity'];
    $room->remarks = $validated['room_remarks'];

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $base64Image = 'data:image/' . $image->getClientOriginalExtension() . ';base64,' . base64_encode(file_get_contents($image));
      $room->image = $base64Image;
  }
    $room->save(); // 更新を保存

    return redirect()->route('hotel.room.show')->with('success', 'Room updated successfully!');
}




  public function destroy($id)
  {
    $this->room->destroy($id);

    return redirect()->route('hotel.room.show');

  }
}
