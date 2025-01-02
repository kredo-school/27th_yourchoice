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
                'id' => '1',
                'type' => 'category',
                'name' => 'Wheelchair and Senior',
            ],
            [
                'id' => '2',
                'type' => 'category',
                'name' => 'Pregnancy',
            ],
            [
                'id' => '3',
                'type' => 'category',
                'name' => 'Family',
            ],
            [
                'id' => '4',
                'type' => 'category',
                'name' => 'Visual and Hearing Impaired',
            ],
            [
                'id' => '5',
                'type' => 'category',
                'name' => 'Religious',
            ],
            [
                'id' => '6',
                'type' => 'category',
                'name' => 'English Friendly',
            ],
        ]);
    }
}
