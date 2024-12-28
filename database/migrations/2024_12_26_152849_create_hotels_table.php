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
      $table->string('hotel_name'); // ホテル名
      $table->string('email')->unique(); // メール
      $table->text('url'); // ホテルの公式ウェブサイトURL
      $table->string('postal_code', 10); // 郵便番号
      $table->string('prefecture', 10); // 都道府県
      $table->string('city', 100); // 市
      $table->string('address', 100); // 市以下の住所
      $table->string('phone_number', 20); // 電話番号
      $table->string('access'); // 最寄駅までのアクセス時間
      $table->text('description'); // ホテルの説明
      $table->longText('image_main'); // ホテルの画像(メイン)
      $table->longText('image_sub1')->nullable(); // ホテルの画像(サブ1)
      $table->longText('image_sub2')->nullable(); // ホテルの画像(サブ2)
      $table->longText('image_sub3')->nullable(); // ホテルの画像(サブ3)
      $table->longText('image_sub4')->nullable(); // ホテルの画像(サブ4)
      $table->unsignedInteger('cancellation_period'); //キャンセル期限
      $table->unsignedInteger('general_fee'); // 通常キャンセル(%)
      $table->unsignedInteger('sameday_fee'); // 当日以降キャンセル(%)
      $table->decimal('breakfast_price', 10, 2); // 朝食の値段
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
