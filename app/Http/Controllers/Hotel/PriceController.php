<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RoomPriceRate;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; 

class PriceController extends Controller
{

    // レートを表示させるページに遷移する
    public function show(Request $request)
    {
        // 現在の週を指定（`current_week`がなければ今週）
        $currentWeek =  (int) $request->input('current_week', 0);

        // 基準日（今日）
        $today = now();

        // 指定された週の月曜日を取得
        $startDate = $today->startOfWeek()->addWeeks($currentWeek);

        // 指定された週の日曜日を取得
        $endDate = $startDate->copy()->endOfWeek();
        
        // 固定されたホテルID
        $hotelId = Auth::user()->hotel->id;

        // ホテルが持つ全てのルームタイプを取得（重複を排除）
        $roomTypes = Room::where('hotel_id', $hotelId)
            ->distinct()
            ->pluck('room_type')
            ->toArray();

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
        return view('hotels.price.show', compact('roomTypes', 'rates', 'dates', 'currentWeek'));
    }




    // レートを編集するページに遷移する
    public function edit(Request $request)
    {
        // 現在の週を指定（`current_week`がなければ今週）
        $currentWeek =  (int) $request->input('current_week', 0);

        // 基準日（今日）
        $today = now();

        // 指定された週の月曜日を取得
        $startDate = $today->startOfWeek()->addWeeks($currentWeek);

        // 指定された週の日曜日を取得
        $endDate = $startDate->copy()->endOfWeek();

        // 固定されたホテルID
        $hotelId = Auth::user()->hotel->id;

        // ホテルが持つ全てのルームタイプを取得（重複を排除）
        $roomTypes = Room::where('hotel_id', $hotelId)
        ->distinct()
        ->pluck('room_type')
        ->toArray();

        // ルームタイプごとにデータを取得
        $rates = RoomPriceRate::where('hotel_id', $hotelId)
            ->whereBetween('date', [$startDate, $endDate])
            ->orderBy('date')
            ->get()
            ->groupBy('room_type');


        // 日付リストの作成
        $dates = [];
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $dates[] = $date->toDateString();
        }

        return view('hotels.price.edit', compact('roomTypes', 'rates', 'dates', 'currentWeek'));

    }




    public function update(Request $request)
    {
        // バリデーション: レートが正しい形式で送信されていることを確認
        $request->validate([
            'rates.*.id' => 'nullable|exists:room_price_rates,id',
            'rates.*.room_type' => 'required|string',
            'rates.*.date' => 'required|date',
            'rates.*.rate' => 'required|numeric|min:0|max:200',
        ]);

        $hotelId = Auth::user()->hotel->id;

        // 送信されたレートをループ処理で更新
        foreach ($request->input('rates') as $rateData) {
            RoomPriceRate::updateOrCreate(
                ['id' => $rateData['id'] ?? null], // IDがあれば更新、なければ新規作成
                [
                    'room_type' => $rateData['room_type'],
                    'date' => $rateData['date'],
                    'rate' => round(abs($rateData['rate'])), // 正数かつ四捨五入
                    'hotel_id' => $hotelId, // 必要に応じて固定または動的に設定
                ]
            );
        }
            // 編集対象の週を取得
            $currentWeek = $request->input('current_week', 0);

        // 更新完了後にリダイレクト
        return redirect()->route('hotel.price.show', ['current_week' => $currentWeek])->with('success', 'Prices updated successfully.');
    }
    
}
