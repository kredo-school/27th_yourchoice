<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Hotel;


class RoomController extends Controller
{
  public function __construct(Room $room)
  {

    $this->room = $room;

  }

  public function show()
  {
    $rooms = $this->room->where('hotel_id', 1)->get();
    
    return view('hotels.rooms.show')->with('rooms',$rooms);
  }

  public function create()
  {
    return view('hotels.rooms.create');
  }

  public function store(Request $request)
  {
        // バリデーション
        $validated = $request->validate([
          'room_number' => 'required|integer|unique:rooms,room_number',
          'room_type' => 'required|string|max:100',
          'room_price' => 'required|numeric|min:0',
          'capacity' => 'required|integer|min:1',
          'images' => 'nullable|array',
          'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 各画像の検証
          'room_remarks' => 'nullable|string|max:255',
      ]);

      // 画像の保存処理
      $imagePaths = [];
      if ($request->has('images')) {
          foreach ($request->file('images') as $image) {
              $path = $image->store('uploads/rooms', 'public'); // 画像を保存
              $imagePaths[] = $path;
          }
      }

      // 部屋の登録
      $room = new Room();
      $room->room_number = $validated['room_number'];
      $room->room_type = $validated['room_type'];
      $room->price = $validated['room_price'];
      $room->capacity = $validated['capacity'];
      $room->image = implode(',', $imagePaths); // カンマ区切りで画像パスを保存
      $room->remarks = $validated['room_remarks'];
      $room->hotel_id = 1; // 例としてホテルIDを固定値1に設定
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
        'room_number' => 'required|integer|unique:rooms,room_number,' . $id . ',room_id', // 同じ番号を許容
        'room_type' => 'required|string|max:5000',
        'room_price' => 'required|numeric|min:0',
        'capacity' => 'required|integer|min:1',
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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

    // 画像の保存処理
    if ($request->has('images')) {
        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            $path = $image->store('uploads/rooms', 'public');
            $imagePaths[] = $path;
        }
        $room->image = implode(',', $imagePaths); // 新しい画像を上書き保存
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
