<?php
// BE: Created by miu 
namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Reservation; // Reservation モデルをインポート
use App\Models\Payment; // Payment モデルをインポート
use App\Models\Hotel; // Hotel モデルをインポート

use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    private $reservation;
    private $payment;
    private $hotel;

    public function __construct(Reservation $reservation, Payment $payment, Hotel $hotel)
    {
        $this->reservation = $reservation;
        $this->payment = $payment;
        $this->hotel = $hotel;
    }

    // ログインしているユーザーの予約一覧を表示
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            abort(403, 'You need login');
        }

        $reservations = $user->reservation ?? collect();

        return view('customers.mypage.reservation_list', compact('reservations'));
    }

    // 予約詳細ページを表示
    public function show($id)
    {
        $reservation = $this->reservation->findOrFail($id);

        // 支払い情報を関連付けから取得
        $payment = $reservation->payment;

        // RoomType を取得
        $roomTypes = $reservation->reservationRoom->map(fn($room) => $room->room->room_type)
            ->unique()
            ->implode(', ');

        // ホテル情報を取得
        $hotel = $this->getHotelByReservation($reservation);

        if (!$hotel) {
            abort(404, 'Not found hotel informations');
        }
        // ビューにデータを渡して表示
        return view('customers.mypage.reservation-detail.show', compact('reservation', 'payment', 'hotel', 'roomTypes'));
    }


    // 予約削除処理
    public function destroy($id)
    {
        $reservation = auth()->user()->reservations()->find($id);
        if ($reservation) {
            $reservation->delete();
            return redirect()->route('customers.mypage.reservation_list')->with('success', 'Reservation deleted successfully.');
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
