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
        // // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //usersTable
        $this->call([
            UsersTableSeeder::class,
        ]);

        //hotelsTable
        $this->call([
            HotelsTableSeeder::class,
        ]);

        //CategoriesTable
        $this->call([
            CategoriesTableSeeder::class,
        ]);
    }
}
