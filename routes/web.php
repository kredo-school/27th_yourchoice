<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\HotelController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/mypage/reviewlist',[MypageController::class,'reviewlist'])->name('mypage.reviewlist');
Route::get('/mypage/reviewlist2',[MypageController::class,'reviewlist2'])->name('mypage.reviewlist2');
Route::get('/mypage/reservation_list',[MypageController::class,'reservation_list'])->name('mypage.reservation_list');
Route::get('/mypage/reservation_detail/inprogress',[MypageController::class,'reservation_detail_inprogress'])->name('mypage.reservation_detail.inprogress');
Route::get('/mypage/reservation_detail/completed',[MypageController::class,'reservation_detail_completed'])->name('mypage.reservation_detail.completed');

Route::get('/hotels', [HotelController::class, 'index']);
Route::get('/customers/hotel_detail', [HotelController::class, 'hotel_detail']);