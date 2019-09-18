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
    if(Auth::check()){
        return view('home');
    }
    return view('auth.login');
});

// Route::get('admin', function () {
//     return view('admin_template');
// });

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/varifay-code', '\App\Http\Controllers\Auth\ForgotPasswordController@validateCode');
Route::get('/code-form/{user_id}', '\App\Http\Controllers\Auth\ForgotPasswordController@codeForm');
Route::post('/update-pass', '\App\Http\Controllers\Auth\ForgotPasswordController@updatePass');
Route::group(['middleware'=>'auto-check-permission'],function(){
    Route::resource('governorate','GovernorateController');
    Route::resource('city','CityController');
    Route::resource('category','CategoryController');
    Route::resource('article','ArticleController');
    Route::resource('client','ClientController');
    Route::resource('role','RoleController');
    Route::resource('user','UserController');
    Route::resource('contact','ContactController');
    Route::resource('config','ConfigController');
});

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@index')->name('home');