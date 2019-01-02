<?php
if (App::environment('production')) {
    URL::forceScheme('https');
}
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

Route::group(['namespace' => 'Api'], function(){
    Route::group(['prefix' => 'scraprequest'], function(){
        Route::get('/', 'ScrapRequestApiController@get')->name('api.scraprequest.get');
        Route::post('/', 'ScrapRequestApiController@store')->name('api.scraprequest.store');
    });

    Route::group(['prefix' => 'shop'], function(){
        Route::get('/', 'ShopApiController@get')->name('api.shop.get');
    });
});