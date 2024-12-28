<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // 予約ID（主キー）
            $table->unsignedBigInteger('user_id'); // ユーザーID（外部キー）
            $table->unsignedBigInteger('payment_id'); // 支払いID（外部キー）
            $table->date('check_in_date'); // チェックイン日
            $table->date('check_out_date'); // チェックアウト日
            $table->integer('number_of_people'); // 予約人数
            $table->boolean('breakfast'); // 朝食有無（0: 無し、1: 有り）
            $table->enum('reservation_status', ['confirmed', 'cancelled'])->default('confirmed'); // 予約状態
            $table->enum('checkin_status', ['done', 'not done'])->default('not done'); // チェックイン状態
            $table->string('customer_request', 255)->nullable(); // 顧客リクエスト
            $table->timestamps(); // 作成日と更新日

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
