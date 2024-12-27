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
        Schema::create('room_price_rate', function (Blueprint $table) {
            $table->id(); // 自動増分ID
            $table->enum('room_type', ['SINGLE', 'DOUBLE', 'TWIN']); // ルームタイプ
            $table->decimal('rate', 8, 2); // レート（小数点を含む金額）
            $table->date('date'); // 日付
            $table->timestamps(); // 作成日時と更新日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_price_rate');
    }
};
