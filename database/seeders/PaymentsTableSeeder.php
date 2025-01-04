<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            [
                'id' => 1,
                'payment_date' => '2024-11-08',
                'amount' => 100,
                'payment_method' => 'credit_card', // 支払い方法（credit_card, paypal, bank_transfer）
                'status' => 'completed',           // 支払い状態（pending, completed, failed）
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'payment_date' => '2024-11-09',
                'amount' => 150,
                'payment_method' => 'paypal',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'payment_date' => '2024-11-10',
                'amount' => 200,
                'payment_method' => 'bank_transfer',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'payment_date' => '2024-11-11',
                'amount' => 50,
                'payment_method' => 'credit_card',
                'status' => 'failed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 19,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 20,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 21,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 22,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 23,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 24,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 25,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 26,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 27,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 28,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 29,
                'payment_date' => '2024-11-12',
                'amount' => 120,
                'payment_method' => 'paypal',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
