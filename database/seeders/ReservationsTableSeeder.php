<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;

class ReservationsTableSeeder extends Seeder
{
    public function run()
    {
        $statuses = ['confirmed', 'cancelled'];
        $checkinStatuses = ['done', 'not done'];
        $requests = ['Can I get a room with a view?', 'No special requests', 'Near the elevator, please'];

        $reservationId = 1;

        // user_id: 1, 3, 5 のみ予約を作成
        for ($userId = 1; $userId <= 5; $userId += 2) {
            for ($i = 1; $i <= 4; $i++) { // 各ユーザーに4つの予約を作成
                DB::table('reservations')->insert([
                    'id'                => $reservationId,
                    'user_id'           => $userId,
                    'payment_id'        => $reservationId, // 仮の支払いID（予約IDと同じに設定）
                    'check_in_date'     => now()->addDays(rand(1, 15))->format('Y-m-d'),
                    'check_out_date'    => now()->addDays(rand(16, 30))->format('Y-m-d'),
                    'number_of_people'  => rand(1, 4),
                    'breakfast'         => rand(0, 1),
                    'reservation_status'=> $statuses[array_rand($statuses)], // confirmed または cancelled
                    'checkin_status'    => $checkinStatuses[array_rand($checkinStatuses)], // done または not done
                    'customer_request'  => $requests[array_rand($requests)],
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]);

                $reservationId++;
            }
        }
    }
}

