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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ユーザーID（外部キー）
            $table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade'); // ホテルID（外部キー）
            $table->tinyInteger('rating')->unsigned()->checkBetween(1, 5); // 評価 ★1~5
            $table->text('comment')->nullable(); // コメント
            $table->longText('image')->nullable(); // ホテルの画像
            $table->timestamp('created_at')->useCurrent(); // レビュー日時
            $table->boolean('is_hidden')->default(false); // 表示状態
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
