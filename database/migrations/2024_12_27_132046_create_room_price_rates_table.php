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
        Schema::create('room_price_rates', function (Blueprint $table) {
            $table->id(); // 自動増分ID
            $table->unsignedBigInteger('hotel_id'); // ホテルID（外部キー）
            $table->string('room_type', 100); // ルームタイプ
            $table->decimal('rate', 8, 2); // レート（小数点を含む金額）
            $table->date('date'); // 日付
            $table->timestamps(); // 作成日時と更新日時

            $table->foreign('hotel_id')->references('id')->on('hotels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_price_rates');
    }
};
