<?php

namespace Database\Seeders;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'type' => 'category',
                'name' => 'Wheelchair and Senior',
            ],
            [
                'type' => 'category',
                'name' => 'Pregnancy',
            ],
            [
                'type' => 'category',
                'name' => 'Family',
            ],
            [
                'type' => 'category',
                'name' => 'Visual and Hearing Impaired',
            ],
            [
                'type' => 'category',
                'name' => 'Religious',
            ],
            [
                'type' => 'category',
                'name' => 'English Friendly',
            ],
        ]);
    }
}
