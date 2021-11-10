<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('Restaurant.home');
});


//Restaurant route start from here
Route::get('/list','RestaurantController@list')->name('restaurant-list');
Route::get('/add','RestaurantController@add')->name('restaurant-add');
Route::post('/store','RestaurantController@store')->name('restaurant-store');
Route::get('edit/{id}','RestaurantController@edit')->name('restaurant-edit');
Route::post('update/{id}','RestaurantController@update')->name('restaurant-update');
Route::get('delete/{id}','RestaurantController@destroy')->name('restaurant-delete');
// Route::get('/register','RestaurantController@register')->name('user-register');
Route::view('/register', 'Restaurant.register');
Route::post('/user-register','RestaurantController@register')->name('user-register');
Route::view('/login','Restaurant.login');
Route::post('/user-login','RestaurantController@login')->name('user-login');

