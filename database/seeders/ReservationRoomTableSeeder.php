<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $reservations = range(1, 27); // reservation_id: 1〜12
        $rooms = range(1, 60); // room_id: 1〜12（1つの予約に1部屋を対応させる）

        // 両方の配列をランダム化
        shuffle($reservations);
        shuffle($rooms);

        foreach ($reservations as $index => $reservationId) {
            // 部屋IDを対応
            $roomId = $rooms[$index];

            // データを挿入
            DB::table('reservation_room')->insert([
                'reservation_id'   => $reservationId,
                'room_id'          => $roomId,
                'number_of_people' => rand(1, 4), // 宿泊者数: 1〜4
                'price'            => rand(5000, 20000) / 100, // 部屋料金: 50.00〜200.00
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
