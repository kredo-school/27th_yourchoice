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
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->string('hotel_name');//laravelのstringはvarcher(255)と同じ
      $table->string('email')->unique();
      $table->text('url'); // URLは長くなる可能性があるためtext
      $table->string('postal_code');
      $table->string('prefecture');
      $table->string('city');
      $table->string('address');
      $table->string('phone_number');
      $table->string('access');
      $table->text('description');
      $table->longText('image_main');
      $table->longText('image_sub1')->nullable();
      $table->longText('image_sub2')->nullable();
      $table->longText('image_sub3')->nullable();
      $table->longText('image_sub4')->nullable();
      $table->unsignedInteger('cancellation_period'); // 正の整数のみ許可
      $table->unsignedInteger('general_fee'); // 正の整数のみ許可
      $table->unsignedInteger('sameday_fee'); // 正の整数のみ許可
      $table->decimal('breakfast_price', 10, 2);
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users');
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
