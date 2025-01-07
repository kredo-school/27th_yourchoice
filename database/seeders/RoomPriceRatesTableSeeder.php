<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoomPriceRatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    DB::table('room_price_rates')->insert([
        [
            'hotel_id'     => 1,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 1,
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2,
            'room_type'    => 'single',
            'rate'     => 100.00, 
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 3,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 3, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 4, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 5,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 5, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 6, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-01', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 1,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 1,
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2,
            'room_type'    => 'single',
            'rate'     => 100.00, 
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 3,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 3, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 4, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 5,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 5, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 6, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-02', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 1,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 1,
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2,
            'room_type'    => 'single',
            'rate'     => 100.00, 
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 3,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 3, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 4, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 5,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 5, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 6, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-03', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 1,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 1,
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2,
            'room_type'    => 'single',
            'rate'     => 100.00, 
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 3,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 3, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 4, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 5,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 5, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 6, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-04', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 1,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 1,
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2,
            'room_type'    => 'single',
            'rate'     => 100.00, 
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 3,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 3, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 4, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 5,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 5, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 6, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-05', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 1,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 1,
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2,
            'room_type'    => 'single',
            'rate'     => 100.00, 
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 3,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 3, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 4, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 5,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 5, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 6, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-06', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 1,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 1,
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2,
            'room_type'    => 'single',
            'rate'     => 100.00, 
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 2, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 3,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 3, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 4, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 4, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 5,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 5, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6,
            'room_type'    => 'single', 
            'rate'     => 100.00,
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ],
        [
            'hotel_id'     => 6, 
            'room_type'    => 'twin', 
            'rate'     => 100.00,
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
        [
            'hotel_id'     => 6, 
            'room_type'    => 'double', 
            'rate'     => 100.00,
            'date'    => '2025-02-07', 
            'created_at'   => now(), // 作成日時
            'updated_at'   => now(), // 更新日時
        ], 
    ]);
        
    }
}


