<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 部屋タイプのリスト
        $roomTypes = ['Single', 'Double', 'Suite', 'Deluxe', 'Family', 'Twin'];

        // 各ホテルごとに部屋を作成
        for ($hotelId = 1; $hotelId <= 6; $hotelId++) {
            for ($roomNumber = 1; $roomNumber <= 10; $roomNumber++) {
                DB::table('rooms')->insert([
                    'room_number' => $roomNumber,
                    'hotel_id' => $hotelId,
                    'room_type' => $roomTypes[array_rand($roomTypes)], // ランダムな部屋タイプ
                    'price' => rand(5000, 20000) / 100, // 価格をランダムに設定（50.00 ~ 200.00）
                    'capacity' => rand(1, 5), // 定員（1~5人）
                    'image' => 'https://via.placeholder.com/150?text=Room+' . $roomNumber, // 仮の画像URL
                    'remarks' => Str::random(20), // ランダムな備考
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

