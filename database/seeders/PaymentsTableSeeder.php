<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert([
            [
                'payment_date' => now(),
                'amount' => 100.00,
                'payment_method' => 'credit_card',
                'status' => 'completed',
            ],
            [
                'payment_date' => now(),
                'amount' => 50.50,
                'payment_method' => 'paypal',
                'status' => 'pending',
            ],
            [
                'payment_date' => now(),
                'amount' => 200.00,
                'payment_method' => 'bank_transfer',
                'status' => 'failed',
            ],
        ]);
    }
}