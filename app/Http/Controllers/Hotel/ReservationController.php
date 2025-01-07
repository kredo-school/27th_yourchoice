<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\ReservationRoom;
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

        $reservations = Reservation::with(['reservationRoom.room' => function ($query) use ($hotelId) {
            $query->where('hotel_id', $hotelId); // hotel_id が $hotelId の部屋のみ
        }, 'user', 'payment'])
        ->whereDate('check_in_date', '<=', $date)
        ->whereDate('check_out_date', '>=', $nextDate)
        ->get();

        // 部屋ごとの予約状況を作成
        $roomStatus = $rooms->map(function ($room) use ($reservations) {
            $reservationRoom = $reservations
                ->flatMap->reservationRoom
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

    public function edit(Request $request, $id)
    {
        if ($id === 'new') {
            // 新規予約の場合
            $date = $request->query('date');
            $roomId = $request->query('room_id');
            // Room モデルから room_number を取得
            $room = Room::find($roomId);
    
            return view('hotels.reservations.edit', [
                'reservation' => null,
                'date' => $date,
                'room_id' => $roomId,
                'room_number' => $room->room_number,
            ]);
        }
    
        // 既存予約の編集
        $reservation = Reservation::find($id);
    
        if (!$reservation) {
            abort(404, 'Reservation not found');
        }

        $rooms = $reservation->reservationRoom->map(function ($reservationRoom) {
            return $reservationRoom->room;
        });
    
        return view('hotels.reservations.edit', compact('reservation', 'rooms'));
    }
    

    public function show_monthly()
    {
        return view('hotels.reservations.show_monthly');
    }


    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
            'customer_request' => 'nullable|string|max:255',
            'room_id' => 'required|integer|exists:rooms,id',
        ]);

        // 新しい予約を作成
        $reservation = Reservation::create([
            'check_in_date' => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'customer_request' => $validated['customer_request'] ?? null,
            // 必要に応じて他のカラムを追加
        ]);

        // ReservationRoom を作成して中間テーブルに保存
        ReservationRoom::create([
            'reservation_id' => $reservation->id,
            'room_id' => $validated['room_id'],
        ]);

        return redirect()->route('hotel.reservation.show_daily', ['date' => $request->input('date')])
        ->with('success', 'Reservation updated successfully.');
    }

    public function update(Request $request, $id)
    {
        // 対象の予約を取得
        $reservation = Reservation::findOrFail($id);
    
        // バリデーション
        $validated = $request->validate([
            'customer_request' => 'nullable|string|max:255'
        ]);
    
        // 予約を更新
        $reservation->update([
            'customer_request' => $validated['customer_request'] ?? null

        ]);
    
        return redirect()->route('hotel.reservation.show_daily', ['date' => $request->input('date')])
        ->with('success', 'Reservation updated successfully.');
    }


    public function getCalendarEvents(Request $request)
    {
        $hotelId = 1; // ホテルIDを指定

        // ホテルに関連する全ての部屋を取得
        $rooms = Room::where('hotel_id', $hotelId)->get();

        // 指定期間の予約を取得（必要なら期間をリクエストから指定）
        $reservations = Reservation::with(['reservationRoom.room' => function ($query) use ($hotelId) {
                $query->where('hotel_id', $hotelId);
            }])
            ->whereBetween('check_in_date', [$request->start, $request->end])
            ->orWhereBetween('check_out_date', [$request->start, $request->end])
            ->get();

        // 日ごとの空き部屋数を計算
        $events = [];
        $period = new \DatePeriod(
            new \DateTime($request->start),
            new \DateInterval('P1D'),
            (new \DateTime($request->end))->modify('+1 day')
        );

        foreach ($period as $date) {
            $dateStr = $date->format('Y-m-d');

            // その日の予約された部屋IDを取得
            $reservedRoomIds = $reservations
                ->filter(function ($reservation) use ($dateStr) {
                    return $dateStr >= $reservation->check_in_date && $dateStr <= $reservation->check_out_date;
                })
                ->flatMap(function ($reservation) {
                    return $reservation->reservationRoom->pluck('room_id');
                })
                ->unique();

            // 空き部屋数を計算
            $availableRooms = $rooms->count() - $reservedRoomIds->count();

            // イベントデータを作成
            if ($availableRooms == 0) {
                $events[] = [
                    'title' => "-----",
                    'start' => $dateStr,
                ];
            } elseif ($availableRooms == 1) {
                $events[] = [
                    'title' => "{$availableRooms} room",
                    'start' => $dateStr,
                ];
            } else {
                $events[] = [
                    'title' => "{$availableRooms} rooms",
                    'start' => $dateStr,
                ];
            }
        }

        return response()->json($events);
    }


    


    
    
}
