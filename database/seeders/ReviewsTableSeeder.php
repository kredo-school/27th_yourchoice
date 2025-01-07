<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            // パターン1
            [
                'user_id'            => 1,
                'hotel_id'           => 1,
                'reservation_id'     => 1, 
                'rating'    => 3,
                'comment'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium animi atque delectus, voluptas
                             incidunt qui facere ipsam harum et labore hic minus tempore quaerat itaque eos fugit porro corrupti ad.
                             Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium animi atque delectus, voluptas
                             incidunt qui facere ipsam harum et labore hic minus tempore quaerat itaque eos fugit porro corrupti ad.' , 
                'image1'    => null,
                'image2'    => null, 
                'image3'    => null, 
                'created_at'        => now(), // 作成日時
                'updated_at'        => now(), // 更新日時
            ],
            [
                'user_id'            => 2,
                'hotel_id'           => 2,
                'reservation_id'     => 2, 
                'rating'    => 2,
                'comment'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium animi atque delectus, voluptas
                             incidunt qui facere ipsam harum et labore hic minus tempore quaerat itaque eos fugit porro corrupti ad.
                             Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium animi atque delectus, voluptas
                             incidunt qui facere ipsam harum et labore hic minus tempore quaerat itaque eos fugit porro corrupti ad.' , 
                'image1'    => null,
                'image2'    => null, 
                'image3'    => null, 
                'created_at'        => now(), // 作成日時
                'updated_at'        => now(), // 更新日時
            ],
            [
                'user_id'            => 2,
                'hotel_id'           => 2,
                'reservation_id'     => 3, 
                'rating'    => 3,
                'comment'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium animi atque delectus, voluptas
                             incidunt qui facere ipsam harum et labore hic minus tempore quaerat itaque eos fugit porro corrupti ad.
                             Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium animi atque delectus, voluptas
                             incidunt qui facere ipsam harum et labore hic minus tempore quaerat itaque eos fugit porro corrupti ad.' , 
                'image1'    => null,
                'image2'    => null, 
                'image3'    => null, 
                'created_at'        => now(), // 作成日時
                'updated_at'        => now(), // 更新日時
            ],
        ]);



        
    }
}
