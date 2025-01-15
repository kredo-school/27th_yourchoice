<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // サンプルデータの挿入
         DB::table('hotel_category')->insert([
            [
                'hotel_id' => 1,
                'category_id' => 2,
            ],
            [
                'hotel_id' => 1,
                'category_id' => 3,
            ],
            [
                'hotel_id' => 2,
                'category_id' => 1,
            ],
            [
                'hotel_id' => 2,
                'category_id' => 4,
            ],
            [
                'hotel_id' => 3,
                'category_id' => 4,
            ],
            [
                'hotel_id' => 3,
                'category_id' => 2,
            ],
            [
                'hotel_id' => 3,
                'category_id' => 1,
            ],
            [
                'hotel_id' => 4,
                'category_id' => 2,
            ],
            [
                'hotel_id' => 4,
                'category_id' => 3,
            ],
            [
                'hotel_id' => 4,
                'category_id' => 4,
            ],
            [
                'hotel_id' => 5,
                'category_id' => 4,
            ],
            [
                'hotel_id' => 6,
                'category_id' => 5,
            ],
            [
                'hotel_id' => 2,
                'category_id' => 14,
            ],
            [
                'hotel_id' => 2,
                'category_id' => 15,
            ],
            [
                'hotel_id' => 2,
                'category_id' => 16,
            ],
            [
                'hotel_id' => 2,
                'category_id' => 17,
            ],
        ]);
    }
}
