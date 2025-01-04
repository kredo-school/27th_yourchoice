<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservations')->insert([
            // パターン1
            [
                'user_id'           => 1,
                'payment_id'        => 1,
                'check_in_date'     => '2025-02-01', // チェックイン日
                'check_out_date'    => '2025-02-02', // チェックアウト日
                'number_of_people'  => 1, // 予約人数
                'breakfast'         => 0, // 朝食なし
                'reservation_status'=> 'confirmed', // 予約状態（確認済み）
                'checkin_status'    => 'not done', // チェックイン状態（未対応）
                'customer_request'  => 'I hate beans!', // 顧客リクエスト
                'created_at'        => now(), // 作成日時
                'updated_at'        => now(), // 更新日時
            ],
            // パターン2
            [
                'user_id'           => 2,
                'payment_id'        => 2,
                'check_in_date'     => '2025-02-03',
                'check_out_date'    => '2025-02-04',
                'number_of_people'  => 2,
                'breakfast'         => 1, // 朝食あり
                'reservation_status'=> 'confirmed',
                'checkin_status'    => 'not done',
                'customer_request'  => 'I cannot eat raw fish.',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            // パターン3
            [
                'user_id'           => 3,
                'payment_id'        => 3,
                'check_in_date'     => '2025-02-10',
                'check_out_date'    => '2025-02-12',
                'number_of_people'  => 4,
                'breakfast'         => 1, // 朝食あり
                'reservation_status'=> 'cancelled', // 予約キャンセル
                'checkin_status'    => 'done', // チェックイン済み
                'customer_request'  => 'I need a late check-out.',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            // パターン4
            [
                'user_id'           => 4,
                'payment_id'        => 4,
                'check_in_date'     => '2025-03-01',
                'check_out_date'    => '2025-03-02',
                'number_of_people'  => 5,
                'breakfast'         => 0, // 朝食なし
                'reservation_status'=> 'confirmed',
                'checkin_status'    => 'not done',
                'customer_request'  => 'Please provide extra towels.',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            // パターン5
            [
                'user_id'           => 5,
                'payment_id'        => 5,
                'check_in_date'     => '2024-12-24',
                'check_out_date'    => '2024-12-25',
                'number_of_people'  => 10,
                'breakfast'         => 1, // 朝食あり
                'reservation_status'=> 'confirmed',
                'checkin_status'    => 'done', // チェックイン済み
                'customer_request'  => 'Can I get a room with a view?',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
        
    }
}
