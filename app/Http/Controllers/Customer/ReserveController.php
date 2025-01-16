<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class ReserveController extends Controller
{
    private $user;
    public function edit()
    {
        $user = $this->user->findOrFail(Auth::id());
        return view('customers.reservations.reservation',compact('user'));
    }

    // public function show()
    // {
    //     $user = $this->user->findOrFail(Auth::id());
        
    //     return view('customers.reservations.reservation_detail', compact('user'));
    // }

    

public function show()
{
    $user = $this->user->findOrFail(Auth::id());
    $model = new reservation(); // モデルを正しくインスタンス化
    $record = $model->findOrFail($id);
    return view('customers.reserve.show', compact('record','user'));
}


    public function __construct(User $user)
  {
    $this->user = $user;
   
  }


    public function store(Request $request) // バリデーション 
    { 
        try
        {
            $request->validate([ 
            'first_name' => 'required|string|max:255', 
            'last_name' => 'required|string|max:255', 
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'check_in_date' => 'required|date', 
            'check_out_date' => 'required|date|after:check_in_date', 
            'room_type' => 'required|string', 
            'payment_method' => 'required|string' 
            ]);


            // 予約データの保存
            $reservation = new Reservation(); 
            $reservation->guest_name = $request->guest_name; 
            $reservation->email = $request->email; 
            $reservation->phone = $request->phone;
            $reservation->check_in_date = $request->check_in_date; 
            $reservation->check_out_date = $request->check_out_date; 
            $reservation->room_type = $request->room_type; 
            $reservation->payment_method = $request->payment_method; $reservation->save(); 

            // 予約完了ページへのリダイレクト 
            return redirect()->route('customer.reserve.confirmation');
        
        } catch (\Exception $e) {
            Log::error('Failed: ' . $e->getMessage());
            return redirect()->route('customer.profile.show')->withErrors(['error' => 'Failed']);
        }

        $reservation = Reservation::create([
    'user_id' => $request->input('user_id'), // ユーザーID
    'payment_id' => $paymentId, // 支払い情報の関連付け
    'check_in_date' => $request->input('check_in_date'), // チェックイン日
    'check_out_date' => $request->input('check_out_date'), // チェックアウト日
    'number_of_people' => $request->input('number_of_people'), // 宿泊人数
    'reservation_status' => 'pending', // 初期ステータス
]);

$reservationId = $reservation->id; // 生成されたIDを取得


$rooms = $request->input('rooms'); // 部屋情報（配列形式）
foreach ($rooms as $room) {
    ReservationRoom::create([
        'reservation_id' => $reservationId, // 予約情報の関連付け
        'room_id' => $room['room_id'], // 部屋ID
        'room_type' => $room['room_type'], // 部屋タイプ
        'price' => $room['price'], // 部屋料金
    ]);
}

    }

    public function confirmation()
    {
        return view('customers.reservations.reserved_confirmation');
    }

    public function postReservation(Request $request)
{
    // データをバリデーション
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
    ]);

    // 次のページにデータを渡す
    return view('customers.reservations.reserve.show', [
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
    ]);
}

public function showReservationDetail(Request $request)
{   
    // 例: POSTリクエストから値を取得
    $first_name = $request->input('first_name');

    // 値を確認
    dd($first_name);

    // Bladeに値を渡す
    return view('reservation_detail', [
        'first_name' => $first_name, // Bladeに値を渡す
    ]);
}


public function showReservationForm()
{
    $first_name = 'John'; // 任意の値をセット

    return view('reservation', compact('first_name'));
}

public function storeReservationData(Request $request)
{
    $validated = $request->validate([
        'first-name' => 'required|string|max:255',
    ]);

    // セッションに保存
    $request->session()->put('first_name', $validated['first-name']);

    return redirect()->route('reservation_detail'); // 次のページにリダイレクト
}

// public function store(Request $request)
// {
//     // セッションにデータを保存
//     $request->session()->put('first_name', $request->input('first_name'));
//     $request->session()->put('last_name', $request->input('last_name'));
//     $request->session()->put('reservation_email', $request->input('reservation_email'));
//     $request->session()->put('reservation_phone', $request->input('reservation_phone'));

//     // 次のページへリダイレクト
//     return redirect()->route('customer.reserve.show');
// }

public function reserveShow(Request $request)
{
    // セッションデータを取得
    $data = [
        'first_name' => $request->session()->get('first_name'),
        'last_name' => $request->session()->get('last_name'),
        'reservation_email' => $request->session()->get('reservation_email'),
        'reservation_phone' => $request->session()->get('reservation_phone'),
    ];

    return view('customer.reserve', $data);
}



// public function createReservation(Request $request)
// {
//     try {
//         // バリデーション & データ保存
//         $validated = $request->validate([
//             'first_name' => 'required|string|max:255',
//             'last_name' => 'required|string|max:255',
//             'email' => 'required|email|max:255',
//             'phone' => 'required|string|max:20',
//             'check_in_date' => 'required|date',
//             'check_out_date' => 'required|date|after:check_in_date',
//             'room_type' => 'required|string',
//             'payment_method' => 'required|string',
//         ]);

//         $reservation = \App\Models\Reservation::create([
//             'guest_name' => $validated['first_name'] . ' ' . $validated['last_name'],
//             'email' => $validated['email'],
//             'phone' => $validated['phone'],
//             'check_in_date' => $validated['check_in_date'],
//             'check_out_date' => $validated['check_out_date'],
//             'room_type' => $validated['room_type'],
//             'payment_method' => $validated['payment_method'],
//         ]);

//         Log::info('Reservation created successfully:', $reservation->toArray()); // 保存した内容をログに記録

//         return redirect()->route('customer.reserve.confirmation')->with('success', 'Reservation successful!');
//     } catch (\Exception $e) {
//         Log::error('Reservation creation failed: ' . $e->getMessage());
//         return redirect()->route('customer.reserve.show')->withErrors(['error' => 'Failed to create reservation.']);
//     }
// }




    
}
