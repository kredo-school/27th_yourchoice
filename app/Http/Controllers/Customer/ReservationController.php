<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function reservationlist()
    {
        return view('customers.mypage.reservation_list');
    }

    public function show()
    {
        return view('customers.mypage.reservation-detail.inprogress');
    }


    // // 予約削除処理
    // public function destroy($id)
    // {
    //     $reservation = auth()->user()->reservations()->find($id);
    //     if ($reservation) {
    //         $reservation->delete();
    //         return redirect()->route('customers.mypage.reservation_list')->with('success', 'Reservation deleted successfully.');
    //     }

    //     return redirect()->back()->with('error', 'Reservation not found.');
    // }

      // 予約Cancel処理
      public function cancel($reservationid)
      {
          $reservation = auth()->user()->reservations()->find($reservationid);
          if ($reservationid) {

            //reservation_statusをCancelに書き換え
            $reservation->update([
                'reservation_status' => 'cancelled'
            ]);

        
        // 予約一覧ページにリダイレクト
        return redirect()
            ->route('customer.reservation.reservationlist')
            ->with('success', 'Reservation has been cancelled successfully.');
                
          }
  
          return redirect()->back()->with('error', 'Reservation not found.');
      }

    // 予約一覧ページを表示
    public function reservationlist()
    {
        $user = auth()->user();
    
        if (!$user) {
            abort(403, 'You need login');
        }

     // ユーザーの予約を取得し、関連するホテルデータをロード
     $reservations = $user->reservation()
     ->with(['reservationRoom.room.hotel.categories','payment'])->paginate(10);
    // 支払い情報を関連付けから取得
     return view('customers.mypage.reservation_list', compact('reservations'));
    }
    
    // 他のメソッドで共通処理を行うためのヘルパー
    private function getHotelByReservation($reservation)
    {
        $hotelIds = $reservation->reservationRoom->map(function ($reservationRoom) {
            return $reservationRoom->room->hotel_id;
        })->unique();

        return $this->hotel->findOrFail($hotelIds->first());
    }
}
