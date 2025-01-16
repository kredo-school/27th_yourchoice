<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HotelAdmin;
use App\Models\UserCategory;
use App\Models\Hotel;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

  private $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }


  public function top()
  {
    return view('auth.register_top');
  }

    public function create_customer()
    {
        return view('auth.customer_register', ['role_id' => 1]);

    }

    // public function update(Request $request)
  // {
  //   #1. Validate all form data
  // $request->validate([
  //   'hotel_name'           => 'required|string|max:255',
  //   'url'                  => 'nullable|url',
  //   'postal_code'          => 'required|string|max:10',
  //   'prefecture'           => 'required|string|max:10',
  //   'city'                 => 'required|string|max:100',
  //   'address'              => 'required|string|max:100',
  //   'access'               => 'nullable|string|max:255',
  //   'description'          => 'nullable|string',
  //   'image_main'           => 'required|image',  // main画像は必須
  //   'image_sub1'           => 'nullable|image',  // サブ画像は任意
  //   'image_sub2'           => 'nullable|image',
  //   'image_sub3'           => 'nullable|image',
  //   'image_sub4'           => 'nullable|image',
  //   'cancellation_period'  => 'required|integer',
  //   'general_fee'          => 'required|integer',
  //   'sameday_fee'          => 'required|integer',
  //   'breakfast_price'      => 'required|numeric',
  //   'username'             => 'required|string|max:100',
  //   'email'                => 'required|email|unique:users,email,' . Auth::id(),
  //   'phone_number'         => 'required|string|max:20',
  //   // 'password' => 'nullable|min:8|confirmed', // パスワードの確認フィールドを追加する場合
  // ]);


  public function create_hotel()
  {
    return view('auth.hotel_register', ['role_id' => 2]);
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  //protected function validator(array $data)
  // {
  //     return Validator::make($data, [
  //         'role_id' => ['required', 'integer', 'in:1, 2'],
  //         'first_name' => ['string', 'max:100'],
  //         'last_name' => ['string', 'max:100'],
  //         'username' => ['required', 'string', 'max:100'],
  //         'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
  //         'phone_number' => ['required', 'numeric', 'max:20'],
  //         'password_hash' => ['required', 'string', 'min:4', 'confirmed'],
  //     ]);
  // }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\User
   */
  public function create(Request $request)
  {
    try {
      $user =  User::create([
        'role_id' => $request->input('role_id', 1),
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'username' => $request->input('username'),
        'email' => $request->input('email'),
        'phone_number' => $request->input('phone_number'),
        'password_hash' => Hash::make($request->input('password_hash')),
      ]);

      $categories = $request->input('categories');

      foreach ($categories as $category_id) {
        UserCategory::create([
          'user_id' => $user->id,
          'category_id' => $category_id,
        ]);
      }

        Auth::login($user);

      // Redirect to a specific page
      return redirect()->route('customer.profile.show')->with('success', 'Registration successful!');
    } catch (\Exception $e) {
      Log::error('Failed: ' . $e->getMessage());
      return redirect()->back()->withErrors(['error' => 'Failed']);
    }
  }

  public function create_admin(Request $request)
  {
    try {
      $user =  User::create([
        'role_id' => $request->input('role_id', 2),
        //'first_name' => $request->input('first_name'),
        //'last_name' => $request->input('last_name'),
        'username' => $request->input('username'),
        'email' => $request->input('email'),
        'phone_number' => $request->input('phone_number'),
        'password_hash' => Hash::make($request->input('password_hash')),
      ]);

      //   ユーザーエントリー後にホテル作成 (空の値を挿入)
      Hotel::create([
        'user_id' => $user->id, // ユーザーに紐づけ
        'hotel_name' => '', // 必須項目も空欄でOK
        'url' => '',
        'postal_code' => '',
        'prefecture' => '',
        'city' => '',
        'street_address' => '',
        'address' => '',
        'access' => '',
        'description' => '',
        'image_main' => '',
        'image_sub1' => '',
        'image_sub2' => '',
        'image_sub3' => '',
        'image_sub4' => '',
        'cancellation_period' => 0,
        'general_fee' => 0,
        'sameday_fee' => 0,
        'breakfast_price' => 0,

      ]);


        
        Auth::login($user);

      // Redirect to a specific page
      return redirect()->route('hotel.profile.show')->with('success', 'Registration successful!');
    } catch (\Exception $e) {
      Log::error('Failed: ' . $e->getMessage());
      return redirect()->back()->withErrors(['error' => 'Failed']);
    }
  }

  /**
   * Redirect users to specific dashboards based on their role.
   *
   * @return string
   */
  // After registration, you can redirect users to specific dashboards based on their role:
  protected function redirectTo()
  {
    $user = Auth::user()->id;
    if ($user->role_id == 1) {
      return '/customers/reservations/reservation';
    }

    if ($user->role_id == 2) {
      return '/hotels/profile/show';
    }
  }
}
