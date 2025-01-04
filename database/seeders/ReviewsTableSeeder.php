<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        $images = [
            'https://via.placeholder.com/150?text=Image1',
            'https://via.placeholder.com/150?text=Image2',
            'https://via.placeholder.com/150?text=Image3',
        ];

        for ($reservationId = 1; $reservationId <= 10; $reservationId++) {
            $userId = ($reservationId % 2 === 0) ? 3 : (($reservationId % 3 === 0) ? 5 : 1); // user_id: 1, 3, 5
            $hotelId = ($reservationId % 6) + 1; // hotel_id: 1~6

            DB::table('reviews')->insert([
                'user_id'   => $userId,
                'hotel_id'  => $hotelId,
                'reservation_id' => $reservationId,
                'rating'    => rand(1, 5),
                'comment'   => 'This is a sample review for reservation #' . $reservationId,
                'image1'    => $images[array_rand($images)],
                'image2'    => rand(0, 1) ? $images[array_rand($images)] : null,
                'image3'    => rand(0, 1) ? $images[array_rand($images)] : null,
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);
        }
    }
}

