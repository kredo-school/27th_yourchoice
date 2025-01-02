<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Hotel;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
  // public function show()
  // {
  //     return view('hotels.profile.show');
  // }

  // public function edit()
  // {
  //     return view('hotels.profile.edit');
  // }

  // public function editpass()
  // {
  //     return view('hotels.profile.password');
  // }

  private $hotel;

  // コンストラクタでHotelモデルをインジェクト
  public function __construct(Hotel $hotel)
  {
    $this->hotel = $hotel;
  }

  public function show()
  {
    // 現在のログインユーザーに関連するホテル情報を取得
    $hotel = $this->hotel->where('user_id', Auth::id())->firstOrFail();

    // ホテルに関連するユーザー情報を取得
    $user = $hotel->user;

    // ビューにデータを渡す　compact('hotel', 'user')とは"ビューに$hotelデータと$userデータを渡す"
    return view('hotel.profile.show', compact('hotel', 'user'));
  }

  public function edit()
  {
    // ログインユーザーに関連するホテル情報を取得
    $hotel = $this->hotel->where('user_id', Auth::id())->firstOrFail();
    // ホテルに関連するユーザー情報を取得
    $user = $hotel->user;
    // ビューにデータを渡す
    return view('hotel.profile.edit', compact('hotel', 'user'));
  }



  //　function内にモデルを直截注入する方法
  // public function edit2()
  // {
  //     // ログインユーザーに関連するホテルとユーザー情報を取得
  //     $hotel = Hotel::where('user_id', Auth::id())->firstOrFail();
  //     // ホテルに関連するユーザー情報を取得
  //     $user = $hotel->user;
  //       // ビューにデータを渡す
  //     return view('hotels.profile.edit', compact('hotel', 'user'));
  // }



  // public function update2(Request $request, $id)
  // {

  //     #1. Validate all form data
  //     $request->validate([
  //         'hotel_name' => 'required|string|max:255',
  //         'username' => 'required|string|max:100',
  //         'email' => 'required|email|unique:users,email,' . $id,
  //         'phone_number' => 'required|string|max:20',
  //     ]);

  //     $hotel = Hotel::findOrFail($id); //Hotel::findOrFail($id)Hotelモデルを使って、$idに該当するレコードをデータベースから検索→該当するレコードが見つかれば、そのレコードを返す→　見つからない場合は、ModelNotFoundExceptionを発生させ、Laravelが自動的に404エラーページを表示する
  //     $hotel->update($request->only([
  //         'hotel_name', 'url', 'postal_code', 'prefecture', 
  //         'city', 'address', 'access', 'description', 
  //         'image_main', 'image_sub1', 'image_sub2', 
  //         'image_sub3', 'image_sub4', 'cancellation_period',
  //         'general_fee', 'sameday_fee', 'breakfast_price'
  //     ]));

  //     $hotel->user->update($request->only([
  //         'username', 'email', 'phone_number'
  //     ]));

  //     return redirect()->route('hotelprofile.edit', $id)->with('success', 'プロフィールが正常に更新されました。');
  // }


  public function update(Request $request)
  {
    #1. Validate all form data
    $request->validate([
      'hotel_name'           => 'required|string|max:255',
      'url'                  => 'nullable|url',
      'postal_code'          => 'required|string|max:10',
      'prefecture'           => 'required|string|max:10',
      'city'                 => 'required|string|max:100',
      'address'              => 'required|string|max:100',
      'access'               => 'nullable|string|max:255',
      'description'          => 'nullable|string',
      'image_main'           => 'required|image',  // main画像は必須
      'image_sub1'           => 'nullable|image',  // サブ画像は任意
      'image_sub2'           => 'nullable|image',
      'image_sub3'           => 'nullable|image',
      'image_sub4'           => 'nullable|image',
      'cancellation_period'  => 'required|integer',
      'general_fee'          => 'required|integer',
      'sameday_fee'          => 'required|integer',
      'breakfast_price'      => 'required|numeric',
      'username'             => 'required|string|max:100',
      'email'                => 'required|email|unique:users,email,' . Auth::id(),
      'phone_number'         => 'required|string|max:20',
      // 'password' => 'nullable|min:8|confirmed', // パスワードの確認フィールドを追加する場合
    ]);

    #2. Save the profile
    // ログインユーザーのホテル情報を取得
    $hotel = $this->hotel->where('user_id', Auth::id())->findOrFail();
    //$idに該当するレコードをデータベースから検索→該当するレコードが見つかれば、そのレコードを返す→　見つからない場合は、ModelNotFoundExceptionを発生させ、Laravelが自動的に404エラーページを表示する

    // ホテル情報を更新
    $hotel->hotel_name          = $request->hotel_name;
    $hotel->url                 = $request->url;
    $hotel->postal_code         = $request->postal_code;
    $hotel->prefecture          = $request->prefecture;
    $hotel->city                = $request->city;
    $hotel->address             = $request->address;
    $hotel->access              = $request->access;
    $hotel->description         = $request->description;
    $hotel->cancellation_period = $request->cancellation_period;
    $hotel->general_fee         = $request->general_fee;
    $hotel->sameday_fee         = $request->sameday_fee;
    $hotel->breakfast_price     = $request->breakfast_price;

    // main画像の保存処理（必須）
    if ($request->image_main) {
      $hotel->image_main = 'data:image.' . $request->image_main->extension() . ';base64,' . base64_encode(file_get_contents($request->image_main));
    }

    // サブ画像の保存処理（任意）
    if ($request->image_sub1) {
      $hotel->image_sub1 = 'data:image.' . $request->image_sub1->extension() . ';base64,' . base64_encode(file_get_contents($request->image_sub1));
    }

    if ($request->image_sub2) {
      $hotel->image_sub2 = 'data:image.' . $request->image_sub2->extension() . ';base64,' . base64_encode(file_get_contents($request->image_sub2));
    }

    if ($request->image_sub3) {
      $hotel->image_sub3 = 'data:image.' . $request->image_sub3->extension() . ';base64,' . base64_encode(file_get_contents($request->image_sub3));
    }

    if ($request->image_sub4) {
      $hotel->image_sub4 = 'data:image.' . $request->image_sub4->extension() . ';base64,' . base64_encode(file_get_contents($request->image_sub4));
    }


    // 保存
    $hotel->save();


    // ユーザー情報を更新
    $user               = $hotel->user; // ホテルに関連するユーザーを取得
    $user->username     = $request->username;
    $user->email        = $request->email;
    $user->phone_number = $request->phone_number;

    // パスワードが入力されていればハッシュ化して更新
    // if ($request->password) {
    //     $user->password_hash = Hash::make($request->password);
    // }

    // 保存
    $user->save();

    // プロフィールページへリダイレクト
    return redirect()->route('hotel.profile.show', ['id' => Auth::id()]);
  }
}
