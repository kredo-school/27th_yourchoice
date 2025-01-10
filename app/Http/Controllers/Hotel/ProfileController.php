<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Category;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
  private $user;
  private $hotel;
  private $category;

  // コンストラクタでUser,Hotel,Categoryモデルをインジェクト
  public function __construct(User $user, Hotel $hotel, Category $category)
  {
    $this->user = $user;
    $this->hotel = $hotel;
    $this->category = $category;
  }


  public function show()
  {

    //ログインユーザー情報を取得
    $user = $this->user->findOrFail(Auth::id());

    //Userモデルのhotelメソッドを取得
    // $hotel = $this->user::with('hotel')->get();

    //ログインユーザーに関連するホテル情報を取得
    $hotel = $this->user::findOrFail(Auth::id())->hotel;
   

    // ホテルに関連するカテゴリー情報をタイプ別に取得
    $categories = $hotel->categories->where('type', 'category');
    $services = $hotel->categories->where('type', 'service');
    $amenities = $hotel->categories->where('type', 'amenity');
    $free_toiletries = $hotel->categories->where('type', 'free_toiletries');
    //   $categories = $hotel ? $hotel->categories->where('type', 'category') : collect();
    // $services = $hotel ? $hotel->categories->where('type', 'service') : collect();
    // $amenities = $hotel ? $hotel->categories->where('type', 'amenity') : collect();
    // $free_toiletries = $hotel ? $hotel->categories->where('type', 'free_toiletries') : collect();
    

    // $category = Hotel::with('categories')->findOrFail(Auth::id());
    // dd($category);

    // ビューにデータを渡す　compact('hotel', 'user', 'category')とは"ビューに$hotelデータと$userデータと$categoryデータを渡す"
    return view('hotels.profile.show', compact('user', 'hotel', 'categories', 'services', 'amenities', 'free_toiletries'));
  }


   public function edit()
  {
    $user = $this->user->findOrFail(Auth::id());
    return view('hotels.profile.edit')->with('user', $user);
  }

  public function update(Request $request)
  {
    // dd($request);
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
      // 'image_main'           => 'required|image',  // main画像は必須
      // 'image_sub1'           => 'nullable|image',  // サブ画像は任意
      // 'image_sub2'           => 'nullable|image',
      // 'image_sub3'           => 'nullable|image',
      // 'image_sub4'           => 'nullable|image',
      'cancellation_period'  => 'required|integer',
      'general_fee'          => 'required|integer',
      'sameday_fee'          => 'required|integer',
      'breakfast_price'      => 'required|numeric',

      'username'             => 'required|string|max:100',
      'email'                => 'required|email|unique:users,email,' . Auth::id(),
      'phone_number'         => 'required|string|max:20',
    ]);

    #2. Save the profile
    //ログインユーザー情報を取得
    $user = $this->user->findOrFail(Auth::id());
    // ログインユーザーに関連するホテル情報を取得
    $hotel = $this->user::find(Auth::id())->hotel;


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

    // // main画像の保存処理（必須）
    // if ($request->image_main) {
    //   $hotel->image_main = 'data:image.' . $request->image_main->extension() . ';base64,' . base64_encode(file_get_contents($request->image_main));
    // }

    // // サブ画像の保存処理（任意）
    // if ($request->image_sub1) {
    //   $hotel->image_sub1 = 'data:image.' . $request->image_sub1->extension() . ';base64,' . base64_encode(file_get_contents($request->image_sub1));
    // }

    // if ($request->image_sub2) {
    //   $hotel->image_sub2 = 'data:image.' . $request->image_sub2->extension() . ';base64,' . base64_encode(file_get_contents($request->image_sub2));
    // }

    // if ($request->image_sub3) {
    //   $hotel->image_sub3 = 'data:image.' . $request->image_sub3->extension() . ';base64,' . base64_encode(file_get_contents($request->image_sub3));
    // }

    // if ($request->image_sub4) {
    //   $hotel->image_sub4 = 'data:image.' . $request->image_sub4->extension() . ';base64,' . base64_encode(file_get_contents($request->image_sub4));
    // }

    // ユーザー情報を更新
    // $user->id           =  $this->user->findOrFail(Auth::user()->id);
    // $user->username     = $request->username;

    $user->email        = $request->email;
    $user->phone_number = $request->phone_number;

    // 保存
    $user->save();
    $hotel->save();



    // プロフィールページへリダイレクト
    return redirect()->route('hotel.profile.show');
  }


  public function editpass()
  {
    return view('hotels.profile.password');
  }

  public function updatepass(Request $request)
  {
    // バリデーション: パスワードが4文字以上で確認用パスワードと一致しているかをチェック/'password'= formの'password'フィールドのこと
    $request->validate([
      'password' => 'required|string|min:4|confirmed',
    ]);

    // 現在のログインユーザーを取得
    $user = Auth::user(); // Auth::user()を直接使用して現在のユーザーを取得

    // パスワードをハッシュ化して保存
    $user->password_hash = Hash::make($request->password);  // 'password' フィールドをハッシュ化して 'password_hash' カラムに保存

    // ユーザー情報を保存
    $user->save();

    // パスワード更新完了後、プロフィールページにリダイレクト
    return redirect()->route('hotel.profile.show');
  }
}
