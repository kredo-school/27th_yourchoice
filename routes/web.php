<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelAdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReservationController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register_top', [App\Http\Controllers\HomeController::class, 'register'])->name('register_top');
Route::get('/mypage/reviewlist',[MypageController::class,'reviewlist'])->name('mypage.reviewlist');
Route::get('/mypage/reviewlist2',[MypageController::class,'reviewlist2'])->name('mypage.reviewlist2');
Route::get('/mypage/profile/show',[MypageController::class,'profileShow'])->name('mypage.profileShow');
Route::get('/mypage/profile/edit',[MypageController::class,'profileEdit'])->name('mypage.profileEdit');
Route::get('/mypage/profile/password',[MypageController::class,'profilePassword'])->name('mypage.profilePassword');
Route::get('/reservations',[ReservationController::class,'reservations'])->name('reservations');
Route::get('/reservation/confirmation', [ReservationController::class, 'reserved_confirmation']);
Route::get('/reservation/detail', [ReservationController::class, 'reserved_detail']);


Route::get('/hotels', [HotelController::class, 'index']);


Route::get('/profile/show',[HotelAdminController::class,'profileshow'])->name('profile.show');
Route::get('/profile/edit',[HotelAdminController::class,'profileedit'])->name('profile.edit');
Route::get('/reservations/reserved_confirmation',[ReservationController::class,'reserved_confirmation'])->name('reserved_confirmation');