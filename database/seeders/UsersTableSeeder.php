<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('users')->insert([
      [
        'role_id' => 1,
        'first_name' => 'John',
        'last_name' => 'Doe',
        'username' => 'johndoe',
        'email' => 'johndoe@example.com',
        'phone_number' => '1234567890',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 2,
        'first_name' => '',
        'last_name' => '',
        'username' => 'Sunshine Hotel',
        'email' => 'Sunshine_Hotel@example.com',
        'phone_number' => '0987654321',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 1,
        'first_name' => 'Alice',
        'last_name' => 'Johnson',
        'username' => 'alicejohnson',
        'email' => 'alicejohnson@example.com',
        'phone_number' => '1122334455',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 2,
        'first_name' => '',
        'last_name' => '',
        'username' => 'Moonlight Inn',
        'email' => 'Moonlight_Inn@example.com',
        'phone_number' => '2233445566',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 1,
        'first_name' => 'Charlie',
        'last_name' => 'Davis',
        'username' => 'charliedavis',
        'email' => 'charliedavis@example.com',
        'phone_number' => '3344556677',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 2,
        'first_name' => '',
        'last_name' => '',
        'username' => 'Star Hotel',
        'email' => 'Star_Hotel@example.com',
        'phone_number' => '3344556677',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 2,
        'first_name' => '',
        'last_name' => '',
        'username' => 'Galaxy Hotel',
        'email' => 'Galaxy_Hotel@example.com',
        'phone_number' => '3344556677',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 2,
        'first_name' => '',
        'last_name' => '',
        'username' => 'Oceanview Resort',
        'email' => 'Oceanview_Resort@example.com',
        'phone_number' => '3344556677',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 2,
        'first_name' => '',
        'last_name' => '',
        'username' => 'Mountain Lodge',
        'email' => 'Mountain_Lodge@example.com',
        'phone_number' => '3344556677',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],

    ]);
  }
}
