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
        Schema::create('reservation_room', function (Blueprint $table) {
            $table->unsignedBigInteger('reservation_id'); // 予約ID
            $table->unsignedBigInteger('room_id'); // 部屋ID
            $table->integer('number_of_people'); // 宿泊者数
            $table->decimal('price', 10, 2); // 部屋の料金
            $table->timestamps(); // 作成日・更新日のタイムスタンプ

            // 外部キー制約
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_room');
    }
};
