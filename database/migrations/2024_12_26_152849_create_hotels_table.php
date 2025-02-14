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
    Schema::create('hotels', function (Blueprint $table) {
      $table->id(); // ホテルID
      $table->unsignedBigInteger('user_id'); // ユーザーID（外部キー）
      $table->string('hotel_name')->nullable(); // ホテル名
      $table->text('url')->nullable(); // ホテルの公式ウェブサイトURL
      $table->string('postal_code', 10)->nullable(); // 郵便番号
      $table->string('prefecture', 10)->nullable(); // 都道府県
      $table->string('city', 100)->nullable(); // 市
      $table->string('street_address', 100)->nullable(); // 市以下の住所
      $table->string('address', 100)->nullable(); // 住所全体
      $table->string('access')->nullable(); // 最寄駅までのアクセス時間
      $table->text('description')->nullable(); // ホテルの説明
      $table->longText('image_main')->nullable(); // ホテルの画像(メイン)
      $table->longText('image_sub1')->nullable(); // ホテルの画像(サブ1)
      $table->longText('image_sub2')->nullable(); // ホテルの画像(サブ2)
      $table->longText('image_sub3')->nullable(); // ホテルの画像(サブ3)
      $table->longText('image_sub4')->nullable(); // ホテルの画像(サブ4)
      $table->unsignedInteger('cancellation_period')->nullable(); //キャンセル期限
      $table->unsignedInteger('general_fee')->nullable(); // 通常キャンセル(%)
      $table->unsignedInteger('sameday_fee')->nullable(); // 当日以降キャンセル(%)
      $table->decimal('breakfast_price', 10, 2)->nullable(); // 朝食の値段
      $table->timestamps(); // 作成・更新日時

      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('hotels');
  }
};
