<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Hotel;
use App\Models\HotelCategory;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

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

    //ログインユーザーに関連するホテル情報を取得
    $hotel = $this->user::findOrFail(Auth::id())->hotel;

    // ホテルに関連するカテゴリー情報をタイプ別に取得
    $categories = $hotel->categories->where('type', 'category');
    $services = $hotel->categories->where('type', 'service');
    $amenities = $hotel->categories->where('type', 'amenity');
    $free_toiletries = $hotel->categories->where('type', 'free_toiletries');

    // ビューにデータを渡す
    return view('hotels.profile.show', compact('user', 'hotel', 'categories', 'services', 'amenities', 'free_toiletries'));
  }

  public function edit()
  {
    $user = $this->user->findOrFail(Auth::id());

    // // カテゴリーをタイプごとにグループ化
    // $categories = $this->category::all()->groupBy('type');
    // // このhotelが選択しているカテゴリーnameを取得
    // $selected_categories = $user->categories->pluck('name')->toArray();

    return view('hotels.profile.edit', compact('user'));
  }

  public function update(Request $request)
  {
    // try {
    // dd($request);
    #1. Validate all form data
    $request->validate([
      'hotel_name'           => 'required|string|max:255',
      'url'                  => 'nullable|url',
      'postal_code'          => 'required|string|max:10',
      'prefecture'           => 'required|string|max:10',
      'city'                 => 'required|string|max:100',
      'street_address'       => 'required|string|max:100',
      'access'               => 'required|string|max:255',
      'description'          => 'required|string',
      'image_main'           => 'required|mimes:jpeg,png,jpg,gif|max:2048',  // main画像は必須
      'image_sub1'           => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',  // sub画像は任意
      'image_sub2'           => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
      'image_sub3'           => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
      'image_sub4'           => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
      'cancellation_period'  => 'required|integer|max:100',
      'general_fee'          => 'required|integer|max:100',
      'sameday_fee'          => 'required|integer|max:100',
      'breakfast_price'      => 'required_if:categories.0,9|numeric|min:0',

      'email'                => 'email',
      'phone_number'         => 'string|max:20',
    ]);

    #2. Save the profile
    //ログインユーザー情報を取得
    $user = $this->user->findOrFail(Auth::id());
    // ログインユーザーに関連するホテル情報を取得
    $hotel = $this->user::find(Auth::id())->hotel;

    // ホテル情報を更新
    $hotel->hotel_name          = $request->hotel_name;
    $hotel->url                 = $request->input('url') ?: null;
    $hotel->postal_code         = $request->postal_code;
    $hotel->prefecture          = $request->prefecture;
    $hotel->city                = $request->city;
    $hotel->street_address      = $request->street_address;
    $address                    = $request->prefecture . $request->city . $request->street_address; //住所を連結
    $hotel->address             = $address; // 連結された住所を保存
    $hotel->access              = $request->access;
    $hotel->description         = $request->description;
    $hotel->cancellation_period = $request->cancellation_period;
    $hotel->general_fee         = $request->general_fee;
    $hotel->sameday_fee         = $request->sameday_fee;
    $hotel->breakfast_price     = $request->breakfast_price;

    //画像の更新
    if ($request->hasFile('image_main')) {
      // 新しい画像がアップロードされた場合
      $image_main = $request->file('image_main');
      $base64Image = 'data:image/' . $image_main->getClientOriginalExtension() . ';base64,' . base64_encode(file_get_contents($image_main));
      $hotel->image_main = $base64Image; // 新しい画像を保存
    } elseif ($request->input('delete_image_main') == 'true') {
      // 画像削除のリクエストがあった場合
      $hotel->image_main = null; // 画像を削除（nullを設定）
    }  // 新しい画像がアップロードされていない場合、既存の画像をそのまま使用

    if ($request->hasFile('image_sub1')) {
      $image_sub1 = $request->file('image_sub1');
      $base64Image = 'data:image/' . $image_sub1->getClientOriginalExtension() . ';base64,' . base64_encode(file_get_contents($image_sub1));
      $hotel->image_sub1 = $base64Image;
    } elseif ($request->input('delete_image_sub1') == 'true') {
      $hotel->image_sub1 = null;
    }
    if ($request->hasFile('image_sub2')) {
      $image_sub2 = $request->file('image_sub2');
      $base64Image = 'data:image/' . $image_sub2->getClientOriginalExtension() . ';base64,' . base64_encode(file_get_contents($image_sub2));
      $hotel->image_sub2 = $base64Image;
    } elseif ($request->input('delete_image_sub2') == 'true') {
      $hotel->image_sub2 = null;
    }
    if ($request->hasFile('image_sub3')) {
      $image_sub3 = $request->file('image_sub3');
      $base64Image = 'data:image/' . $image_sub3->getClientOriginalExtension() . ';base64,' . base64_encode(file_get_contents($image_sub3));
      $hotel->image_sub3 = $base64Image;
    } elseif ($request->input('delete_image_sub3') == 'true') {
      $hotel->image_sub3 = null;
    }
    if ($request->hasFile('image_sub4')) {
      $image_sub4 = $request->file('image_sub4');
      $base64Image = 'data:image/' . $image_sub4->getClientOriginalExtension() . ';base64,' . base64_encode(file_get_contents($image_sub4));
      $hotel->image_sub4 = $base64Image;
    } elseif ($request->input('delete_image_sub4') == 'true') {
      $hotel->image_sub4 = null;
    }

    //ユーザー情報の更新
    $user->email        = $request->email;
    $user->phone_number = $request->phone_number;

    // 既存のカテゴリー関連データを削除(重複を削除)
    \DB::table('hotel_category')->where('hotel_id', $hotel->id)->delete();

    // 保存
    $user->save();
    $hotel->save();

    // チェックされたカテゴリの ID を取得
    $categories = $request->input('categories', []); // カテゴリが送信されない場合は空配列を使用
    // 中間テーブルにデータを挿入
    foreach ($categories as $category_id) {
      HotelCategory::create([
        'hotel_id' => $hotel->id,
        'category_id' => $category_id,
      ]);
    }
    // プロフィールページへリダイレクト
    return redirect()->route('hotel.profile.show');
    // } catch (\Exception $e) {
    //   Log::error('Failed: ' . $e->getMessage());
    //   return redirect()->back()->withErrors(['error' => 'Failed']);
    // }
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
