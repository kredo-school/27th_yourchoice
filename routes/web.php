<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HotelAdminController;

Auth::routes();

// カスタマー側

Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {

  // ログイン不要ページ
    Route::get('/top/list',[App\Http\Controllers\Customer\TopController::class,'list'])->name('top.list');
    Route::get('/top/search',[App\Http\Controllers\Customer\TopController::class,'search'])->name('top.search');

    Route::get('/top/show',[App\Http\Controllers\Customer\TopController::class,'show'])->name('top.show');


  // ログインが必要ページ
  // Route::group(['middleware' => 'auth'], function () {
      Route::get('/reserve/edit',[App\Http\Controllers\Customer\ReserveController::class,'edit'])->name('reserve.edit');
      Route::get('/reserve/show',[App\Http\Controllers\Customer\ReserveController::class,'show'])->name('reserve.show');
      Route::get('/reserve/confirmation',[App\Http\Controllers\Customer\ReserveController::class,'confirmation'])->name('reserve.confirmation');

      Route::get('/profile/show',[App\Http\Controllers\Customer\ProfileController::class,'show'])->name('profile.show');
      Route::get('/profile/edit',[App\Http\Controllers\Customer\ProfileController::class,'edit'])->name('profile.edit');
      Route::get('/profile/editpass',[App\Http\Controllers\Customer\ProfileController::class,'editpass'])->name('profile.editpass');

      Route::get('/reservation/reservationlist',[App\Http\Controllers\Customer\ReservationController::class,'reservationlist'])->name('reservation.reservationlist');
      Route::get('/reservation/show',[App\Http\Controllers\Customer\ReservationController::class,'show'])->name('reservation.show');

      Route::get('/review/list',[App\Http\Controllers\Customer\ReviewController::class,'list'])->name('review.list');
      Route::get('/review/show',[App\Http\Controllers\Customer\ReviewController::class,'show'])->name('review.show');
      Route::get('/review/create',[App\Http\Controllers\Customer\ReviewController::class,'create'])->name('review.create');

      Route::get('/inquary/show',[App\Http\Controllers\Customer\InquaryController::class,'show'])->name('inquary.show');

  // });

});

// ホテル側
// Route::group(['prefix' => 'hotel', 'as' => 'hotel.', 'middleware' => 'auth'], function () {
Route::group(['prefix' => 'hotel', 'as' => 'hotel.'], function () {

    Route::get('/inquary/show',[App\Http\Controllers\Hotel\InquaryController::class,'show'])->name('inquary.show');

    Route::get('/profile/show',[App\Http\Controllers\Hotel\ProfileController::class,'show'])->name('profile.show');
    Route::get('/profile/edit',[App\Http\Controllers\Hotel\ProfileController::class,'edit'])->name('profile.edit');
    Route::get('/profile/editpass',[App\Http\Controllers\Hotel\ProfileController::class,'editpass'])->name('profile.editpass');

    Route::get('/room/show',[App\Http\Controllers\Hotel\RoomController::class,'show'])->name('room.show');
    Route::get('/room/create',[App\Http\Controllers\Hotel\RoomController::class,'create'])->name('room.create');
    Route::get('/room/edit',[App\Http\Controllers\Hotel\RoomController::class,'edit'])->name('room.edit');

    Route::get('/price/show',[App\Http\Controllers\Hotel\PriceController::class,'show'])->name('price.show');
    Route::get('/price/edit',[App\Http\Controllers\Hotel\PriceController::class,'edit'])->name('price.edit');

    Route::get('/reservation/show_daily',[App\Http\Controllers\Hotel\ReservationController::class,'show_daily'])->name('reservation.show_daily');
    Route::get('/reservation/edit',[App\Http\Controllers\Hotel\ReservationController::class,'edit'])->name('reservation.edit');
    Route::get('/reservation/show_monthly',[App\Http\Controllers\Hotel\ReservationController::class,'show_monthly'])->name('reservation.show_monthly');

    Route::get('/review/list',[App\Http\Controllers\Hotel\ReviewController::class,'list'])->name('review.list');
    Route::get('/review/show',[App\Http\Controllers\Hotel\ReviewController::class,'show'])->name('review.show');

});


Route::get('/register/top',[App\Http\Controllers\RegisterController::class,'top'])->name('register.top');
Route::get('/register/create_customer',[App\Http\Controllers\RegisterController::class,'create_customer'])->name('register.create_customer');
Route::get('/register/create_hotel',[App\Http\Controllers\RegisterController::class,'create_hotel'])->name('register.create_hotel');

// Route::get('/register', [CustomerController::class, 'register'])->name('register');

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// //MypageController
// Route::get('/mypage/reviewlist',[MypageController::class,'reviewlist'])->name('mypage.reviewlist');
// Route::get('/mypage/view',[MypageController::class,'show'])->name('mypage.show');
// Route::get('/mypage/submittion',[MypageController::class,'create'])->name('mypage.create');
// Route::get('/hotels/price/show',[MypageController::class,'showprice'])->name('mypage.showprice');
// Route::get('/hotels/price/edit',[MypageController::class,'editprice'])->name('mypage.editprice');
// Route::get('/mypage/reservation_list',[MypageController::class,'reservation_list'])->name('mypage.reservation_list');
// Route::get('/mypage/reservation_detail/inprogress',[MypageController::class,'reservation_detail_inprogress'])->name('mypage.reservation_detail.inprogress');
// Route::get('/mypage/reservation_detail/completed',[MypageController::class,'reservation_detail_completed'])->name('mypage.reservation_detail.completed');Route::get('/hotels/reservations/show_daily',[HotelAdminController::class,'reservation_show_daily'])->name('reservation.reservation_show_daily');
// Route::get('/hotels/reservations/show_monthly',[HotelAdminController::class,'reservation_show_monthly'])->name('reservation.reservation_show_monthly');
// Route::get('/hotels/reservations/edit',[HotelAdminController::class,'edit'])->name('reservation.edit');

// Route::get('/mypage/profile/show',[MypageController::class,'profileShow'])->name('mypage.profileShow');
// Route::get('/mypage/profile/edit',[MypageController::class,'profileEdit'])->name('mypage.profileEdit');
// Route::get('/mypage/profile/password',[MypageController::class,'profilePassword'])->name('mypage.profilePassword');

// //HotelController
// Route::get('/hotels', [HotelController::class, 'index']);
// Route::get('/hotel_register', [HotelController::class,'hotelRegister'])->name('hotelRegister');

// //HotelAdminContoller
// Route::get('/profile/show',[HotelAdminController::class,'profileshow'])->name('profile.show');
// Route::get('/profile/edit',[HotelAdminController::class,'profileedit'])->name('profile.edit');
// Route::get('/reviews/list',[HotelAdminController::class,'reviewlist'])->name('reviews.list');
// Route::get('/reviews/show',[HotelAdminController::class,'reviewshow'])->name('reviews.show');
// Route::get('/rooms/show',[HotelAdminController::class,'roomsshow'])->name('rooms.show');
// Route::get('/rooms/create',[HotelAdminController::class,'roomscreate'])->name('rooms.create');
// Route::get('/rooms/edit',[HotelAdminController::class,'roomsedit'])->name('rooms.edit');


// //CustomerController
// Route::get('/register_top', [CustomerController::class, 'register_top'])->name('register_top');
// Route::get('/customer_register', [CustomerController::class,'customerRegister'])->name('customerRegister');
// Route::get('/customers/hotel_detail', [HotelController::class, 'hotel_detail']);