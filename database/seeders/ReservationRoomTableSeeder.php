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

            DB::table('reservation_room')->insert([
                [
                    'reservation_id'   => 1,
                    'room_id'          => 2,
                    'number_of_people' => 1, 
                    'price'            => 100.00, // 部屋料金: 50.00〜200.00
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ],
                [
                    'reservation_id'   => 2,
                    'room_id'          => 1,
                    'number_of_people' => 1, 
                    'price'            => 120.00, // 部屋料金: 50.00〜200.00
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ],
                [
                    'reservation_id'   => 3,
                    'room_id'          => 3,
                    'number_of_people' => 2, 
                    'price'            => 100.00, // 部屋料金: 50.00〜200.00
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ],
                [
                    'reservation_id'   => 3,
                    'room_id'          => 4,
                    'number_of_people' => 2, 
                    'price'            => 100.00, // 部屋料金: 50.00〜200.00
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ],
                [
                    'reservation_id'   => 3,
                    'room_id'          => 4,
                    'number_of_people' => 2, 
                    'price'            => 100.00, // 部屋料金: 50.00〜200.00
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ],
                [
                    'reservation_id'   => 4,
                    'room_id'          => 5,
                    'number_of_people' => 1, 
                    'price'            => 130.00, // 部屋料金: 50.00〜200.00
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ],
                [
                    'reservation_id'   => 5,
                    'room_id'          => 6,
                    'number_of_people' => 2, 
                    'price'            => 150.00, // 部屋料金: 50.00〜200.00
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ],
            ]);
        }
    }

