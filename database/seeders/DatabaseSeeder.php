<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Hotel;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
                // 各Seederを実行（順序に注意）
                $this->call([
                    UsersTableSeeder::class,         // ユーザー情報
                    HotelsTableSeeder::class,        // ホテル情報
                    CategoriesTableSeeder::class,    // カテゴリー情報
                    PaymentsTableSeeder::class,      // 支払い情報
                    ReservationsTableSeeder::class,  // 予約情報
                    HotelCategoryTableSeeder::class, // ホテルとカテゴリーの関連付け
                    RoomsTableSeeder::class,         // 部屋情報
                    ReservationRoomTableSeeder::class,         // 部屋情報
                    ReviewsTableSeeder::class,       // レビュー情報
                    RoomPriceRatesTableSeeder::class,       // 料金レート
                ]);
        
    }
}
