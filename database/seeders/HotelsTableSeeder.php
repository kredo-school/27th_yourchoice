<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Hotel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            [
                'user_id' => 1,
                'hotel_name' => 'Sunshine Hotel',
                'url' => 'https://sunshinehotel.com',
                'postal_code' => '100-0001',
                'prefecture' => 'Tokyo',
                'city' => 'Chiyoda',
                'address' => '1-1-1 Kanda',
                'access' => '5 minutes from Kanda Station',
                'description' => 'A luxury hotel located in the heart of Tokyo.',
                'image_main' => 'https://example.com/images/sunshine_main.jpg',
                'image_sub1' => 'https://example.com/images/sunshine_sub1.jpg',
                'image_sub2' => 'https://example.com/images/sunshine_sub2.jpg',
                'image_sub3' => 'https://example.com/images/sunshine_sub3.jpg',
                'image_sub4' => 'https://example.com/images/sunshine_sub4.jpg',
                'cancellation_period' => 3,
                'general_fee' => 10,
                'sameday_fee' => 20,
                'breakfast_price' => 15.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 他のホテルデータをここに追加
            [
                'user_id' => 2,
                'hotel_name' => 'Moonlight Inn',
                'url' => 'https://moonlightinn.com',
                'postal_code' => '150-0001',
                'prefecture' => 'Tokyo',
                'city' => 'Shibuya',
                'address' => '2-2-2 Dogenzaka',
                'access' => '10 minutes from Shibuya Station',
                'description' => 'A cozy inn in Shibuya.',
                'image_main' => 'images/hotel.jpg',
                'image_sub1' => 'images/hotel.jpg',
                'image_sub2' => 'images/hotel.jpg',
                'image_sub3' => 'images/hotel.jpg',
                'image_sub4' => 'images/hotel.jpg',
                'cancellation_period' => 2,
                'general_fee' => 15,
                'sameday_fee' => 25,
                'breakfast_price' => 12.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'hotel_name' => 'Star Hotel',
                'url' => 'https://starhotel.com',
                'postal_code' => '100-0002',
                'prefecture' => 'Tokyo',
                'city' => 'Chiyoda',
                'address' => '3-3-3 Marunouchi',
                'access' => '8 minutes from Tokyo Station',
                'description' => 'A business hotel near Tokyo Station.',
                'image_main' => 'images/hotel.jpg',
                'image_sub1' => 'images/hotel.jpg',
                'image_sub2' => 'images/hotel.jpg',
                'image_sub3' => 'images/hotel.jpg',
                'image_sub4' => 'images/hotel.jpg',
                'cancellation_period' => 1,
                'general_fee' => 20,
                'sameday_fee' => 30,
                'breakfast_price' => 10.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'hotel_name' => 'Galaxy Hotel',
                'url' => 'https://galaxyhotel.com',
                'postal_code' => '100-0003',
                'prefecture' => 'Tokyo',
                'city' => 'Chiyoda',
                'address' => '4-4-4 Otemachi',
                'access' => '7 minutes from Otemachi Station',
                'description' => 'A high-end hotel with a view.',
                'image_main' => 'https://example.com/images/galaxy_main.jpg',
                'image_sub1' => 'https://example.com/images/galaxy_sub1.jpg',
                'image_sub2' => 'https://example.com/images/galaxy_sub2.jpg',
                'image_sub3' => 'https://example.com/images/galaxy_sub3.jpg',
                'image_sub4' => 'https://example.com/images/galaxy_sub4.jpg',
                'cancellation_period' => 2,
                'general_fee' => 25,
                'sameday_fee' => 35,
                'breakfast_price' => 18.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'hotel_name' => 'Oceanview Resort',
                'url' => 'https://oceanviewresort.com',
                'postal_code' => '100-0004',
                'prefecture' => 'Tokyo',
                'city' => 'Chiyoda',
                'address' => '5-5-5 Kudanminami',
                'access' => '15 minutes from Kudanshita Station',
                'description' => 'A seaside resort.',
                'image_main' => 'https://example.com/images/oceanview_main.jpg',
                'image_sub1' => 'https://example.com/images/oceanview_sub1.jpg',
                'image_sub2' => 'https://example.com/images/oceanview_sub2.jpg',
                'image_sub3' => 'https://example.com/images/oceanview_sub3.jpg',
                'image_sub4' => 'https://example.com/images/oceanview_sub4.jpg',
                'cancellation_period' => 5,
                'general_fee' => 10,
                'sameday_fee' => 20,
                'breakfast_price' => 20.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'hotel_name' => 'Mountain Lodge',
                'url' => 'https://mountainlodge.com',
                'postal_code' => '100-0005',
                'prefecture' => 'Tokyo',
                'city' => 'Chiyoda',
                'address' => '6-6-6 Nagatacho',
                'access' => '10 minutes from Akasaka Station',
                'description' => 'A lodge in the mountains.',
                'image_main' => 'https://example.com/images/mountainlodge_main.jpg',
                'image_sub1' => 'https://example.com/images/mountainlodge_sub1.jpg',
                'image_sub2' => 'https://example.com/images/mountainlodge_sub2.jpg',
                'image_sub3' => 'https://example.com/images/mountainlodge_sub3.jpg',
                'image_sub4' => 'https://example.com/images/mountainlodge_sub4.jpg',
                'cancellation_period' => 3,
                'general_fee' => 15,
                'sameday_fee' => 25,
                'breakfast_price' => 17.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
