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

        // hotel_id が 1 の部屋のみ取得
        $hotelId = 1;
        $rooms = Room::where('hotel_id', $hotelId)->get();

        // 指定日の予約を取得
        $nextDate = Carbon::parse($date)->addDay(); // 指定日付の翌日を取得

        $reservations = Reservation::with(['reservationRooms.room' => function ($query) use ($hotelId) {
            $query->where('hotel_id', $hotelId); // hotel_id が $hotelId の部屋のみ
        }, 'user', 'payment'])
        ->whereDate('check_in_date', '<=', $date)
        ->whereDate('check_out_date', '>=', $nextDate)
        ->get();

        // 部屋ごとの予約状況を作成
        $roomStatus = $rooms->map(function ($room) use ($reservations) {
            $reservationRoom = $reservations
                ->flatMap->reservationRooms
                ->firstWhere('room_id', $room->id);

            return [
                'room' => $room,
                'reservation' => $reservationRoom && isset($reservationRoom->reservation) ? $reservationRoom->reservation : null,
                'details' => $reservationRoom,
                'payment_status' => isset($reservationRoom->reservation->payment) 
                ? $reservationRoom->reservation->payment->status 
                : 'pending',
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

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);

        return view('hotels.reservations.edit', compact('reservation'));
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
