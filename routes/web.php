<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HotelAdminController;
// use App\Http\Controllers\ReservationController;
use App\Http\Controllers\customer\ReservationController;
use App\Http\Middleware\CheckRole;

Auth::routes();


// カスタマー側

Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {

  // ログイン不要ページ
    Route::get('/top/list',[App\Http\Controllers\Customer\TopController::class,'list'])->name('top.list');
    Route::post('/top/search',[App\Http\Controllers\Customer\TopController::class,'search'])->name('top.search');

    Route::get('/top/show/{id}',[App\Http\Controllers\Customer\TopController::class,'show'])->name('top.show');


  // ログインが必要ページ
  Route::group(['middleware' => 'customer'], function () {
      Route::get('/reserve/edit',[App\Http\Controllers\Customer\ReserveController::class,'edit'])->name('reserve.edit');
      Route::get('/reserve/show',[App\Http\Controllers\Customer\ReserveController::class,'show'])->name('reserve.show');
      Route::get('/reserve/confirmation',[App\Http\Controllers\Customer\ReserveController::class,'confirmation'])->name('reserve.confirmation');

      Route::get('/profile/show',[App\Http\Controllers\Customer\ProfileController::class,'show'])->name('profile.show');
      Route::get('/profile/edit',[App\Http\Controllers\Customer\ProfileController::class,'edit'])->name('profile.edit');
      Route::get('/profile/editpass',[App\Http\Controllers\Customer\ProfileController::class,'editpass'])->name('profile.editpass');

      Route::get('/reservation/reservationlist',[ReservationController::class,'index'])->middleware('auth')->name('reservation.reservationlist'); 
      Route::get('/reservation/{reservationid}/show', [ReservationController::class, 'show'])->name('reservation.show');
      Route::delete('/reservation/{reservationid}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
      
      Route::get('/review/list',[App\Http\Controllers\Customer\ReviewController::class,'list'])->name('review.list');
      Route::get('/review/show/{id}',[App\Http\Controllers\Customer\ReviewController::class,'show'])->name('review.show');
      Route::get('/review/create/{id}',[App\Http\Controllers\Customer\ReviewController::class,'create'])->name('review.create');
      Route::post('/review/store',[App\Http\Controllers\Customer\ReviewController::class,'store'])->name('review.store');

      Route::get('/inquary/show',[App\Http\Controllers\Customer\InquaryController::class,'show'])->name('inquary.show');

  });

});

// ホテル側
Route::group(['prefix' => 'hotel', 'as' => 'hotel.', 'middleware' => 'hotel'], function () {
// Route::group(['prefix' => 'hotel', 'as' => 'hotel.'], function () {

    Route::get('/inquary/show', [App\Http\Controllers\Hotel\InquaryController::class, 'show'])->name('inquary.show');

    Route::get('/profile/show', [App\Http\Controllers\Hotel\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [App\Http\Controllers\Hotel\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [App\Http\Controllers\Hotel\ProfileController::class, 'update'])->name('profile.update'); 
    Route::get('/profile/editpass', [App\Http\Controllers\Hotel\ProfileController::class, 'editpass'])->name('profile.editpass');
    Route::post('/profile/updatepass', [App\Http\Controllers\Hotel\ProfileController::class, 'updatepass'])->name('profile.updatepass'); 

    Route::get('/room/show', [App\Http\Controllers\Hotel\RoomController::class, 'show'])->name('room.show');
    Route::get('/room/create', [App\Http\Controllers\Hotel\RoomController::class, 'create'])->name('room.create');
    Route::get('/room/{id}/edit', [App\Http\Controllers\Hotel\RoomController::class, 'edit'])->name('room.edit');
    Route::put('/room/{id}/update',[App\Http\Controllers\Hotel\RoomController::class,'update'])->name('room.update');
    Route::post('/room/store',[App\Http\Controllers\Hotel\RoomController::class,'store'])->name('room.store');
    Route::delete('/room/{id}/destroy', [App\Http\Controllers\Hotel\RoomController::class, 'destroy'])->name('room.destroy');

    Route::get('/price/show',[App\Http\Controllers\Hotel\PriceController::class,'show'])->name('price.show');
    Route::get('/price/edit',[App\Http\Controllers\Hotel\PriceController::class,'edit'])->name('price.edit');
    Route::post('/price/update',[App\Http\Controllers\Hotel\PriceController::class,'update'])->name('price.update');

    Route::get('/reservation/show_monthly',[App\Http\Controllers\Hotel\ReservationController::class,'show_monthly'])->name('reservation.show_monthly');
    Route::get('/reservation/show_daily',[App\Http\Controllers\Hotel\ReservationController::class,'show_daily'])->name('reservation.show_daily');
    Route::put('/hotel/reservation/{id}/update-checkin-status', [App\Http\Controllers\Hotel\ReservationController::class, 'updateCheckinStatus'])->name('reservation.updateCheckinStatus');
    Route::get('/reservation/{id}/edit',[App\Http\Controllers\Hotel\ReservationController::class,'edit'])->where('id', 'new|\d+') // 'new' または数字を許可
    ->name('reservation.edit');
    Route::post('/reservation/store_block',[App\Http\Controllers\Hotel\ReservationController::class,'store_block'])->name('reservation.store_block');
    Route::post('/reservation/store_guest',[App\Http\Controllers\Hotel\ReservationController::class,'store_guest'])->name('reservation.store_guest');
    Route::put('/reservation/{id}/cancel', [App\Http\Controllers\Hotel\ReservationController::class, 'cancel'])->name('reservation.cancel');

    Route::put('/reservation/update/{id}',[App\Http\Controllers\Hotel\ReservationController::class,'update'])->name('reservation.update');
    Route::get('/api/hotel/reservations/calendar', [App\Http\Controllers\Hotel\ReservationController::class, 'getCalendarEvents']);



    Route::get('/review/list',[App\Http\Controllers\Hotel\ReviewController::class,'list'])->name('review.list');
    Route::get('/review/show/{id}',[App\Http\Controllers\Hotel\ReviewController::class,'show'])->name('review.show');

});


Route::get('/register/top',[App\Http\Controllers\RegisterController::class,'top'])->name('register.top');
Route::get('/register/create_customer',[App\Http\Controllers\RegisterController::class,'create_customer'])->name('register.create_customer');
Route::get('/register/create_hotel',[App\Http\Controllers\RegisterController::class,'create_hotel'])->name('register.create_hotel');

// Route::get('/register', [CustomerController::class, 'register'])->name('register');
Route::get('/register/create_customer/signup',[App\Http\Controllers\RegisterController::class,'create'])->name('register.create');
Route::get('/register/create_customer/hotel_signup',[App\Http\Controllers\RegisterController::class,'create_admin'])->name('register.create_admin');
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
// Route::get('/reservations',[ReservationController::class,'reservations'])->name('reservations');
// Route::get('/reservation/confirmation', [ReservationController::class, 'reserved_confirmation']);
// Route::get('/reservation/detail', [ReservationController::class, 'reserved_detail']);

// //HotelController
// Route::get('/hotel_search', [HotelController::class, 'hotelSearch']);
// Route::get('/hotel_register', [HotelController::class,'hotelRegister'])->name('hotelRegister');
// Route::get('/hotel/inquary', [App\Http\Controllers\HotelController::class, 'inquary'])->name('hotels.inquary.show');


// //HotelAdminContoller
// Route::get('/profile/show',[HotelAdminController::class,'profileshow'])->name('profile.show');
// Route::get('/profile/edit',[HotelAdminController::class,'profileedit'])->name('profile.edit');
// Route::get('/profile/password',[HotelAdminController::class,'profilepassword'])->name('profile.password');
// Route::get('/reservations/reserved_confirmation',[ReservationController::class,'reserved_confirmation'])->name('reserved_confirmation');
// Route::get('/reviews/list',[HotelAdminController::class,'reviewlist'])->name('reviews.list');
// Route::get('/reviews/show',[HotelAdminController::class,'reviewshow'])->name('reviews.show');
// Route::get('/rooms/show',[HotelAdminController::class,'roomsshow'])->name('rooms.show');
// Route::get('/rooms/create',[HotelAdminController::class,'roomscreate'])->name('rooms.create');
// Route::get('/rooms/edit',[HotelAdminController::class,'roomsedit'])->name('rooms.edit');

// //CustomerController
// Route::get('/register_top', [CustomerController::class, 'register_top'])->name('register_top');
// Route::get('/customer_register', [CustomerController::class,'customerRegister'])->name('customerRegister');
// Route::get('/customers/hotel_detail', [HotelController::class, 'hotel_detail'])->name('hotelDetail');;
