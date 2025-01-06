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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // レビューID
            $table->unsignedBigInteger('user_id'); // ユーザーID
            $table->unsignedBigInteger('hotel_id'); // ホテルID
            $table->unsignedBigInteger('reservation_id'); // 予約ID
            $table->integer('rating'); // 評価
            $table->text('comment'); // コメント
            $table->longText('image1')->nullable(); // ホテルの画像
            $table->longText('image2')->nullable(); // ホテルの画像
            $table->longText('image3')->nullable(); // ホテルの画像
            $table->timestamps(); // created_at, updated_at
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
