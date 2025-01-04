<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Reservation; // Reservation モデルをインポート
use App\Models\Payment; // Payment モデルをインポート
use App\Models\Hotel; // Hotel モデルをインポート

use Illuminate\Support\Facades\Log;
Log::info('Enter  customer/ReservationController ');

class ReservationController extends Controller
{
    private  $reservation;
    private  $payment;
    private  $hotel;

    public function __construct(Reservation $reservation,  Payment $payment, Hotel $hotel)
    {
        $this->reservation = $reservation;
        $this->payment = $payment;
        $this->hotel = $hotel;
    }

    //@Miu---------------------------------------------------------
    public function show($id)
    {
        // 指定した予約情報を取得
        $reservation = $this->reservation->findOrFail($id);

        //Amount
        $payment = $this->payment->findOrFail($id);

        // RoomTypeを取得
        $roomTypes = $reservation->reservationRoom->map(function ($reservationRoom) {
            return $reservationRoom->room->room_type;
        })->unique()->implode(', '); // カンマ区切りで表示
        
        // RoomsからHotelIDを取得
        $hotelIds = $reservation->reservationRoom->map(function ($reservationRoom) {
            return $reservationRoom->room->hotel_id;
        })->unique()->implode(', '); // カンマ区切りで表示

        //Picture&location
        $hotel = $this->hotel->findOrFail($hotelIds);
  
        // ビューにデータを渡して表示(渡す変数が多いためcompactを使用 )
        return view('customers.mypage.reservation-detail.show', compact('reservation','payment','hotel','roomTypes'));
    }

    public function reservationlist()
    {
        return view('customers.mypage.reservation_list');
                // ログイン中のユーザーの予約を取得
        //$reservations = Reservation::where('user_id', auth()->id())->paginate(10);
        $reservations = Reservation::paginate(10);// Test

            // 取得したデータをビューに渡す
            // return view('customer.reservation_list', compact('reservations'));
    return view('customers.mypage.reservation_list', compact('reservations'));
    }

    //@Miu-------------------------------------------------------End//

}
