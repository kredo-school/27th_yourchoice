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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();  // 自動インクリメントのID（主キー）
            $table->unsignedBigInteger('user_id'); // 顧客ID（外部キー）
            $table->text('message'); // メッセージ
            $table->timestamp('sent_at')->default(DB::raw('CURRENT_TIMESTAMP')); // 送信日時（デフォルト: 現在の日時）
            $table->timestamp('updated_at')->nullable(); // 更新日時（NULL可能）

            // 外部キー制約（Usersテーブルのuser_idを参照）
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
