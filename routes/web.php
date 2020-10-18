<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index')->name('welcome');

Auth::routes();

Route::group(['middleware' => ['auth', 'Role'], 'roles' => ['admin']], function () {
    Route::resource('/employees', 'EmployeeController');
    Route::resource('/rooms', 'RoomController');
    Route::resource('/reservations', 'ReservationController');
    Route::resource('/payments', 'PaymentController');
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');

    Route::get('search-room', 'BookingsController@searchRoom')->name('searchRoom');
    Route::post('book-room', 'BookingsController@bookRoom')->name('bookRoom');

});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart', 'CartController@store')->name('cart.store');
    Route::delete('/cart/{product}','CartController@destroy')->name('cart.destroy');
    Route::get('/empty', 'CartController@destroyCart')->name('emptyCart');
    Route::get('/paytabs_payment', 'PaymentController@PaytabsPayment')->name('paytabs');###################################
    Route::post('/paytabs_response', 'PaymentController@paymentResponse');

});

