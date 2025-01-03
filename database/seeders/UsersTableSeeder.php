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
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'username' => 'janesmith',
                'email' => 'janesmith@example.com',
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
                'first_name' => 'Bob',
                'last_name' => 'Brown',
                'username' => 'bobbrown',
                'email' => 'bobbrown@example.com',
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
        ]);
    }
}
