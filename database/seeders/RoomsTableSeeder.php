<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    DB::table('rooms')->insert([
        $rooms = [
            [
                'room_number' => 101,
                'hotel_id' => 1,
                'room_type' => 'twin',
                'price' => 100.00,
                'capacity' => 2,
                'image' => 'https://via.placeholder.com/150?text=Room+1',
                'remarks' => 'eFpisszwCQrMTjjE9GHc',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 102,
                'hotel_id' => 1,
                'room_type' => 'single',
                'price' => 80.00,
                'capacity' => 1,
                'image' => 'https://via.placeholder.com/150?text=Room+2',
                'remarks' => 'mnCqWpIkGVjgEZ6S5gYG',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 101,
                'hotel_id' => 2,
                'room_type' => 'twin',
                'price' => 120.00,
                'capacity' => 2,
                'image' => 'https://via.placeholder.com/150?text=Room+3',
                'remarks' => 'DSV7PylKIL7TBZyqVc7x',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 102,
                'hotel_id' => 2,
                'room_type' => 'twin',
                'price' => 120.00,
                'capacity' => 2,
                'image' => 'https://via.placeholder.com/150?text=Room+4',
                'remarks' => 'cfzkxdD7ezVVpwfStUNL',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 103,
                'hotel_id' => 2,
                'room_type' => 'single',
                'price' => 110.00,
                'capacity' => 1,
                'image' => 'https://via.placeholder.com/150?text=Room+5',
                'remarks' => 'VE65EMmbJocORLtxstRd',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 101,
                'hotel_id' => 3,
                'room_type' => 'twin',
                'price' => 150.00,
                'capacity' => 2,
                'image' => 'https://via.placeholder.com/150?text=Room+1',
                'remarks' => 'eFpisszwCQrMTjjE9GHc',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 102,
                'hotel_id' => 3,
                'room_type' => 'single',
                'price' => 180.00,
                'capacity' => 1,
                'image' => 'https://via.placeholder.com/150?text=Room+2',
                'remarks' => 'mnCqWpIkGVjgEZ6S5gYG',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 101,
                'hotel_id' => 4,
                'room_type' => 'single',
                'price' => 150.00,
                'capacity' => 1,
                'image' => 'https://via.placeholder.com/150?text=Room+3',
                'remarks' => 'DSV7PylKIL7TBZyqVc7x',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 102,
                'hotel_id' => 4,
                'room_type' => 'twin',
                'price' => 150.00,
                'capacity' => 2,
                'image' => 'https://via.placeholder.com/150?text=Room+4',
                'remarks' => 'cfzkxdD7ezVVpwfStUNL',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 103,
                'hotel_id' => 4,
                'room_type' => 'double',
                'price' => 110.00,
                'capacity' => 2,
                'image' => 'https://via.placeholder.com/150?text=Room+5',
                'remarks' => 'VE65EMmbJocORLtxstRd',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 101,
                'hotel_id' => 5,
                'room_type' => 'twin',
                'price' => 200.00,
                'capacity' => 2,
                'image' => 'https://via.placeholder.com/150?text=Room+1',
                'remarks' => 'eFpisszwCQrMTjjE9GHc',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 102,
                'hotel_id' => 5,
                'room_type' => 'single',
                'price' => 180.00,
                'capacity' => 1,
                'image' => 'https://via.placeholder.com/150?text=Room+2',
                'remarks' => 'mnCqWpIkGVjgEZ6S5gYG',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 101,
                'hotel_id' => 6,
                'room_type' => 'single',
                'price' => 150.00,
                'capacity' => 1,
                'image' => 'https://via.placeholder.com/150?text=Room+3',
                'remarks' => 'DSV7PylKIL7TBZyqVc7x',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 102,
                'hotel_id' => 6,
                'room_type' => 'twin',
                'price' => 150.00,
                'capacity' => 2,
                'image' => 'https://via.placeholder.com/150?text=Room+4',
                'remarks' => 'cfzkxdD7ezVVpwfStUNL',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
            [
                'room_number' => 103,
                'hotel_id' => 6,
                'room_type' => 'double',
                'price' => 110.00,
                'capacity' => 2,
                'image' => 'https://via.placeholder.com/150?text=Room+5',
                'remarks' => 'VE65EMmbJocORLtxstRd',
                'created_at' => '2025-01-07 11:21:14',
                'updated_at' => '2025-01-07 11:21:14',
            ],
        ]
    ]);
        
    }
}


