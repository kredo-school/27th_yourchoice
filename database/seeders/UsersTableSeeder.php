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
        'username' => 'Johndoe',
        'email' => 'johndoe@example.com',
        'phone_number' => '1234567890',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 2,
        'first_name' => '',
        'last_name' => '',
        'username' => 'Janesmith',
        'email' => 'janesmith@example.com',
        'phone_number' => '0987654321',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 1,
        'first_name' => 'Alice',
        'last_name' => 'Johnson',
        'username' => 'Alicejohnson',
        'email' => 'alicejohnson@example.com',
        'phone_number' => '1122334455',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 2,
        'first_name' => '',
        'last_name' => '',
        'username' => 'Bobbrown',
        'email' => 'bobbrown@example.com',
        'phone_number' => '2233445566',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 1,
        'first_name' => 'Charlie',
        'last_name' => 'Davis',
        'username' => 'Charliedavis',
        'email' => 'charliedavis@example.com',
        'phone_number' => '3344556677',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 2,
        'first_name' => '',
        'last_name' => '',
        'username' => 'Milycarter',
        'email' => 'milycarter@example.com',
        'phone_number' => '3344556677',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 2,
        'first_name' => '',
        'last_name' => '',
        'username' => 'Sophiawilliams',
        'email' => 'sophiawilliams@example.com',
        'phone_number' => '3344556677',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 2,
        'first_name' => '',
        'last_name' => '',
        'username' => 'Danielbrown',
        'email' => 'danielbrown@example.com',
        'phone_number' => '3344556677',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],
      [
        'role_id' => 2,
        'first_name' => '',
        'last_name' => '',
        'username' => 'Jamesanderson',
        'email' => 'jamesanderson@example.com',
        'phone_number' => '3344556677',
        'password_hash' => Hash::make('password'),
        'created_at' => now(),
      ],

    ]);
  }
}
