<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function show_daily(Request $request)
    {
        $date = $request->query('date', now()->toDateString()); // デフォルトは現在の日付
        $rooms = Room::all(); // 全ての部屋を取得

        // 指定日の予約を取得
        $nextDate = Carbon::parse($date)->addDay(); // 指定日付の翌日を取得

        $reservations = Reservation::with('reservationRooms.room', 'user', 'payment')
            ->whereDate('check_in_date', '<=', $date)
            ->whereDate('check_out_date', '>=', $nextDate) // check_out_dateを前日に設定
            ->get();

        // 部屋ごとの予約状況を作成
        $roomStatus = $rooms->map(function ($room) use ($reservations) {
            $reservationRoom = $reservations
                ->flatMap->reservationRooms
                ->firstWhere('room_id', $room->id);

            return [
                'room' => $room,
                'reservation' => $reservationRoom && isset($reservationRoom->reservation) ? $reservationRoom->reservation : null,
                'details' => $reservationRoom
            ];
        });

        // ビューにデータを渡す
        return view('hotels.reservations.show_daily', [
            'roomStatus' => $roomStatus,
            'date' => $date
        ]);


    }

    public function updateCheckinStatus(Request $request, $id)
    {
        $request->validate([
            'checkin_status' => 'required|string|in:done,not done', 
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->checkin_status = $request->input('checkin_status');
        $reservation->save();

        return redirect()->back()->with('success', 'Check-in status updated successfully.');
    }

    public function edit()
    {
        return view('hotels.reservations.edit');
    }

    public function show_monthly()
    {
        return view('hotels.reservations.show_monthly');
    }

    public function store()
    {
        return redirect()->route('hotel.reservation.show_daily');
    }


    
    
}
