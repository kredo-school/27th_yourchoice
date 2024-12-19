<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HotelAdminController;
use App\Http\Controllers\ReservationController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/customer/inquary', [App\Http\Controllers\CustomerController::class, 'inquiry'])->name('customers.inquary.show');

//MypageController
Route::get('/mypage/reviewlist',[MypageController::class,'reviewlist'])->name('mypage.reviewlist');
Route::get('/mypage/view',[MypageController::class,'show'])->name('mypage.show');
Route::get('/mypage/submittion',[MypageController::class,'create'])->name('mypage.create');
Route::get('/hotels/price/show',[MypageController::class,'showprice'])->name('mypage.showprice');
Route::get('/hotels/price/edit',[MypageController::class,'editprice'])->name('mypage.editprice');
Route::get('/mypage/reservation_list',[MypageController::class,'reservation_list'])->name('mypage.reservation_list');
Route::get('/mypage/reservation_detail/inprogress',[MypageController::class,'reservation_detail_inprogress'])->name('mypage.reservation_detail.inprogress');
Route::get('/mypage/reservation_detail/completed',[MypageController::class,'reservation_detail_completed'])->name('mypage.reservation_detail.completed');Route::get('/hotels/reservations/show_daily',[HotelAdminController::class,'reservation_show_daily'])->name('reservation.reservation_show_daily');
Route::get('/hotels/reservations/show_monthly',[HotelAdminController::class,'reservation_show_monthly'])->name('reservation.reservation_show_monthly');
Route::get('/hotels/reservations/edit',[HotelAdminController::class,'edit'])->name('reservation.edit');

Route::get('/mypage/profile/show',[MypageController::class,'profileShow'])->name('mypage.profileShow');
Route::get('/mypage/profile/edit',[MypageController::class,'profileEdit'])->name('mypage.profileEdit');
Route::get('/mypage/profile/password',[MypageController::class,'profilePassword'])->name('mypage.profilePassword');
Route::get('/reservations',[ReservationController::class,'reservations'])->name('reservations');
Route::get('/reservation/confirmation', [ReservationController::class, 'reserved_confirmation']);
Route::get('/reservation/detail', [ReservationController::class, 'reserved_detail']);

//HotelController
Route::get('/hotel_search', [HotelController::class, 'hotelSearch']);
Route::get('/hotel_register', [HotelController::class,'hotelRegister'])->name('hotelRegister');
Route::get('/hotel/inquary', [App\Http\Controllers\HotelController::class, 'inquary'])->name('hotels.inquary.show');


//HotelAdminContoller
Route::get('/profile/show',[HotelAdminController::class,'profileshow'])->name('profile.show');
Route::get('/profile/edit',[HotelAdminController::class,'profileedit'])->name('profile.edit');
Route::get('/profile/password',[HotelAdminController::class,'profilepassword'])->name('profile.password');
Route::get('/reservations/reserved_confirmation',[ReservationController::class,'reserved_confirmation'])->name('reserved_confirmation');
Route::get('/reviews/list',[HotelAdminController::class,'reviewlist'])->name('reviews.list');
Route::get('/reviews/show',[HotelAdminController::class,'reviewshow'])->name('reviews.show');
Route::get('/rooms/show',[HotelAdminController::class,'roomsshow'])->name('rooms.show');
Route::get('/rooms/create',[HotelAdminController::class,'roomscreate'])->name('rooms.create');
Route::get('/rooms/edit',[HotelAdminController::class,'roomsedit'])->name('rooms.edit');

//CustomerController
Route::get('/register_top', [CustomerController::class, 'register_top'])->name('register_top');
Route::get('/customer_register', [CustomerController::class,'customerRegister'])->name('customerRegister');
Route::get('/customers/hotel_detail', [HotelController::class, 'hotel_detail'])->name('hotelDetail');;
