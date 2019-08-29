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

Route::group(['prefix'=>'v1','namespace'=>'Api'],function(){

    Route::get('/governorates', 'MainController@governorates');
    Route::get('/cities', 'MainController@cities');

    Route::get('/bloodTypes', 'MainController@bloodTypes');

    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');

    

    // Route::post('/settings', 'AuthController@settings');

    Route::group(['middleware'=>'auth:api'],function(){

        Route::post('clientEdit', 'MainController@clientEdit');
        Route::get('can-donate', 'MainController@canDonate');

        Route::post('/register-token', 'AuthController@registerToken');

        Route::get('reset-pass', 'MainController@resetPass');       
        Route::post('confirm-pass', 'MainController@confirmPass');

        Route::get('/article', 'MainController@article');
        Route::get('/articles', 'MainController@articles');

        Route::get('/categories', 'MainController@categories');
        Route::get('/fav-articles', 'MainController@favArticles');
        Route::post('/tog-article', 'MainController@togArticle');
        Route::get('/is-fav', 'MainController@isFav');

        Route::post('/contact-us', 'MainController@contactUs');

        Route::post('/notification-settings', 'MainController@notificationSettings');
        Route::get('/notifications{id?}', 'MainController@notifications');
        Route::get('/notificationOpen{id?}', 'MainController@notificationOpen');

        Route::get('donation-get', 'MainController@donationGet');
        Route::post('donation-add', 'MainController@donationAdd');
        Route::post('donation-edit', 'MainController@donationEdit');
        Route::get('num-unreaded-donation', 'MainController@numUnreadedDonation');


    });

});