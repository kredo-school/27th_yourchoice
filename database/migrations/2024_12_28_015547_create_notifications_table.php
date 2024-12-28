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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // 通知ID（自動インクリメントの主キー）
            $table->unsignedBigInteger('user_id'); // 通知先顧客ID
            $table->enum('type', ['reservation', 'cancellation', 'review'])->notNull(); // 種類
            $table->string('message', 500)->notNull(); // メッセージ（最大500文字）
            $table->boolean('is_read')->default(false); // 既読フラグ（デフォルト: 未読）
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // 作成日時（デフォルト: 現在時刻）
            $table->timestamp('updated_at')->nullable(); // 更新日時（NULL許可）

            // 外部キー制約（Usersテーブルのidを参照）
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
