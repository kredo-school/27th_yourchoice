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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // 自動増分のプライマリキー
            $table->string('type', 255); // カテゴリのタイプ（例: category, service, amenity, toiletries）
            $table->string('name', 255); // カテゴリの名前（例: wheelchair, parking, wifi）
            $table->timestamps(); // 作成日・更新日のタイムスタンプ
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
