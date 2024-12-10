<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelAdminController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/mypage/reviewlist',[MypageController::class,'reviewlist'])->name('mypage.reviewlist');
Route::get('/mypage/reviewlist2',[MypageController::class,'reviewlist2'])->name('mypage.reviewlist2');


Route::get('/hotels', [HotelController::class, 'index']);


Route::get('/profile/show',[HotelAdminController::class,'profileshow'])->name('profile.show');
Route::get('/profile/edit',[HotelAdminController::class,'profileedit'])->name('profile.edit');