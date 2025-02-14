<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id');
            $table->string('card_number', 20)->nullable();
            $table->date('payment_date'); // 支払い日
            $table->decimal('amount', 10, 2); // 金額（小数点以下2桁まで）
            $table->enum('payment_method', ['credit_card', 'paypal', 'bank_transfer']); // 支払い方法
            $table->enum('status', ['pending', 'completed', 'failed']); // 支払いのステータス
            $table->timestamps(); // created_at, updated_at
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
