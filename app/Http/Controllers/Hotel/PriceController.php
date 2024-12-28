<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RoomPriceRate;
use Carbon\Carbon;

class PriceController extends Controller
{
    public function show()
    {
        // 固定されたホテルID
        $hotelId = 1;

        // 現在の開発条件に基づき12/2から1週間のデータを取得
        $startDate = Carbon::create(2024, 12, 2); // 開始日
        $endDate = $startDate->copy()->addDays(6); // 1週間後

        // 特定のホテルのルームタイプごとに日付をキーにしたレートデータを取得
        $rates = RoomPriceRate::where('hotel_id', $hotelId)
            ->whereBetween('date', [$startDate, $endDate])
            ->orderBy('date')
            ->get()
            ->groupBy('room_type');

        // 1週間の日付を配列として準備
        $dates = [];
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $dates[] = $date->toDateString();
        }

        // ビューにデータを渡す
        return view('hotels.price.show', compact('rates', 'dates'));
    }




    public function edit()
    {
        return view('hotels.price.edit');
    }

    public function update()
    {
        return redirect()->route('hotel.price.show');
    }
    
}
