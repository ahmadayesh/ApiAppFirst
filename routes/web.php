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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Auth', 'prefix' => 'register'], function () {
    Route::get('/admin', 'RegisterController@showAdminRegisterForm');
    Route::get('/blogger', 'RegisterController@showBloggerRegisterForm');
    Route::post('/admin', 'RegisterController@createAdmin');
    Route::post('/blogger', 'RegisterController@createBlogger');
});


Route::group(['namespace' => 'Auth', 'prefix' => 'login'], function () {

    Route::get('/admin', 'LoginController@showAdminLoginForm');
    Route::get('/blogger', 'LoginController@showBloggerLoginForm');
    Route::post('/admin', 'LoginController@adminLogin');
    Route::post('/blogger', 'LoginController@bloggerLogin');
});
Route::get('/details', 'UsersController@getDetailsUser');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin')->middleware('auth:admin');
Route::view('/blogger', 'blogger')->middleware('auth:blogger');



Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/blogger', 'blogger');

















/* Product Route */
Route::group(['prefix' => 'product', 'middleware' => ['auth']], function () {
    Route::get('/all', 'ProductController@index');
    Route::get('/{id}', 'ProductController@show');
    Route::get('Remove/{id}', 'ProductController@destroy');
    Route::get('add/{id}/{name}/{description}/{userId}', 'ProductController@store');
    Route::get('ByUser/{id?}', 'UsersController@ProductByUser');
});
/* End Product Route */


/* User Route */
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/all', 'UsersController@index');
    Route::get('/{id}', 'UsersController@show');
    Route::get('Remove/{id}', 'UsersController@destroy');
    Route::get('add/{id}/{name}/{email}/{Password}', 'UsersController@store');
});
/* End User Route */



/* Auth Route  */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
/* End Auth Route  */



