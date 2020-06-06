<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth', 'namespace' => 'Api\Auth'], function () {
    Route::post('Register', 'RegisterController@register');
    Route::post('login', 'LoginController@login');
});


Route::group(['prefix' => 'user', 'middleware' => ['auth:api']], function () {
    Route::get('show/information', 'UsersController@ShowMyDetails');
});

Route::group(['prefix' => 'admin'], function () {


    Route::get('show/all/user', 'UsersController@index');
    Route::get('show/all/product', 'ProductController@index');
    Route::get('/details', 'UsersController@getDetailsAdmins');
    Route::get('/show/user/by/{id}', 'UsersController@show');
    Route::delete('/destroy/user/by/{id}', 'UsersController@destroy');
    Route::get('/get/all/product', 'ProductController@index');
    Route::get('/get/product/{id}', 'ProductController@show');
    Route::get('/get/product/{id}', 'ProductController@show');
    Route::delete('/delete/product/{id}', 'ProductController@destroy');
    Route::post('/add/product', 'ProductController@store');
    Route::post('/store/product/{id}', 'ProductController@update');
    Route::post('/add/order', 'OrderController@store');
    Route::get('/get/orders', 'OrderController@index');
    Route::get('/get/my/orders', 'OrderController@myOrders');
    Route::delete('/trash/order/{id}', 'OrderController@destroy');


});
