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
    Schema::create('rooms', function (Blueprint $table) {
      $table->id(); // 部屋ID
      $table->unsignedInteger('room_number'); // 部屋No.
      $table->unsignedBigInteger('hotel_id'); // ホテルID（外部キー）
      $table->string('room_type', 100); // 部屋タイプ
      $table->decimal('price', 10, 2); // 価格（1泊）
      $table->unsignedInteger('capacity'); // 定員（人数）
      $table->longText('image')->nullable(); // 画像
      $table->text('remarks')->nullable();; // 備考
      $table->timestamps(); //作成・更新日時

      $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('rooms');
  }
};
