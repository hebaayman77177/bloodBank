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

Route::get('admin', function () {
    return view('admin_template');
});

Auth::routes();
Route::resource('governorate','GovernorateController');
Route::resource('city','CityController');
Route::resource('category','CategoryController');
Route::resource('article','ArticleController');
Route::resource('client','ClientController');
Route::resource('role','RoleController');
Route::resource('user','UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@index')->name('home');