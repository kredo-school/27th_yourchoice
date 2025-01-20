<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Hotel;
use App\Models\Room;

class ReserveController extends Controller
{
    public function edit(Request $request)
    {
        $user = Auth::user();
        $travellers = $request->input('travellers');
        $checkInDate = $request->input('checkInDate');
        $checkOutDate = $request->input('checkOutDate');
        $hotel_id = $request->input('hotel_id');
        $room_id = $request->input('room_id'); 
        $breakfast = $request->input('breakfast',0); 
        // dd($travellers,$checkInDate,$checkInDate,$hotel_id,$room_id);

    
        $hotel = DB::table('hotels')->where('id', $hotel_id)->first();
        $room = DB::table('rooms')->where('id', $room_id)->first();

    
        $hotel_name = $hotel->hotel_name;
        $room_type = $room->room_type;
        $price = $room->price;
        $breakfast_price = $hotel-> breakfast_price;
        $total_price = $breakfast ? $price+$breakfast_price : $price;

        $formattedCheckInDate = date('j, F, Y', strtotime($checkInDate));
        $formattedCheckOutDate = date('j, F, Y', strtotime($checkOutDate));

        return view('customers.reservations.reservation', compact('user','travellers', 'checkInDate', 'checkOutDate', 'room_type',
            'formattedCheckInDate',
            'formattedCheckOutDate',
            'price',
            'breakfast_price',
            'breakfast',
            'total_price',
            'hotel_id',
            'room_id', 'hotel_name'));
    }

    public function show()
    {
        return view('customers.reservations.reservation_detail');
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

public function store( $room_id,$hotel_id, Request $request)
{
    // // セッションにデータを保存
    // $request->session()->put('first_name', $request->input('first_name'));
    // $request->session()->put('last_name', $request->input('last_name'));
    // $request->session()->put('reservation_email', $request->input('reservation_email'));
    // $request->session()->put('reservation_phone', $request->input('reservation_phone'));

    // 次のページへリダイレクト

    DB::beginTransaction();
   try{
    $user_id = Auth::id();
        $travellers = $request->input('travellers');
        $checkInDate = $request->input('checkInDate');
        $checkOutDate = $request->input('checkOutDate');
        $hotel_id = $request->input('hotel_id');
        $room_id = $request->input('room_id'); 
        $breakfast = $request->has('breakfast') ? 1:0 ; 
        $requests = $request->input('requests'); 
        $card_number = $request->input('card_number');
        $payment_date = Carbon::now()->toDateString();
        if (!$hotel_id || !$room_id) {
            abort(404, 'Hotel or Room ID is missing.');
        }

        $hotel = DB::table('hotels')->where('id', $hotel_id)->first();
            $room = DB::table('rooms')->where('id', $room_id)->first();
            $price = $room->price;
            $breakfast_price = $hotel->breakfast_price;
            $total_price = $breakfast ? $price + $breakfast_price : $price;

            $payment = DB::table('payments')->insertGetId([
                'user_id' => $user_id,
                'payment_date' => $payment_date,
                'card_number' => $card_number,
                'amount' => $total_price,
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
                
            ]);

            $reservation = DB::table('reservations')->insertGetId([
                'user_id' => $user_id,
                'payment_id' => $payment,
                'check_in_date' => $checkInDate,
                'check_out_date' => $checkOutDate,
                'number_of_people' => $travellers,
                'breakfast' => $breakfast,
                'reservation_status' => 'confirmed',
                'checkin_status' => 'not done',
                'customer_request' => $requests,
                'guest_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('reservation_room')->insert([
                'reservation_id' => $reservation,
                'room_id' => $room_id,
                'number_of_people' => $travellers,
                'price' => $total_price,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

     return view('customers.reservations.reserved_confirmation');
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Reservation Confirmation Error: ' . $e->getMessage());
        return back()->withErrors(['error' => 'An error occurred while processing your reservation. Please try again.']);
    }
}

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
