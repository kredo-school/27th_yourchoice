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
      [
        'id' => '7',
        'type' => 'service',
        'name' => 'Parking availability',
      ],
      [
        'id' => '8',
        'type' => 'service',
        'name' => 'Luggage storage service',
      ],
      [
        'id' => '9',
        'type' => 'service',
        'name' => 'Breakfast',
      ],
      [
        'id' => '10',
        'type' => 'amenity',
        'name' => 'Wi-Fi',
      ],
      [
        'id' => '11',
        'type' => 'amenity',
        'name' => 'Air conditioning',
      ],
      [
        'id' => '12',
        'type' => 'amenity',
        'name' => 'TV',
      ],
      [
        'id' => '13',
        'type' => 'amenity',
        'name' => 'Dryer',
      ],
      [
        'id' => '14',
        'type' => 'free_toiletries',
        'name' => 'Shampoo',
      ],
      [
        'id' => '15',
        'type' => 'free_toiletries',
        'name' => 'Conditioner',
      ],
      [
        'id' => '16',
        'type' => 'free_toiletries',
        'name' => 'Body wash',
      ],
      [
        'id' => '17',
        'type' => 'free_toiletries',
        'name' => 'Toothbrush&paste',
      ],
    ]);
  }
}
