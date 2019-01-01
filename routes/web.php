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

Route::group(['prefix' => 'admin'], function(){
    Route::get("/home",     'AdminController@home')->name('admin.home');
    Route::get("/news",     'AdminController@news')->name('admin.news');
    Route::get("/requestNewItem",  'AdminController@requestNewItem')->name('admin.admin-panel.requestNewItem');
    Route::get("/pendingItems",    'AdminController@pendingItems')->name('admin.admin-panel.pendingItems');
    Route::get("/completedItems",  'AdminController@completedItems')->name('admin.admin-panel.completedItems');
    Route::get("/shoeRequests",  'AdminController@shoeRequests')->name('admin.admin-panel.shoeRequests');
});

Route::group(['prefix' => 'ScrapRequest'], function(){
    Route::post('/store', 'ScrapRequestController@store')->name('scraprequest.store');
    Route::get('/requestsTable', 'ScrapRequestController@getRequestsTable')->name('_scraprequest.requeststable');
});

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function(){
    Route::group(['prefix' => 'scraprequest'], function(){
        Route::get('/', 'ScrapRequestApiController@get')->name('api.scraprequest.get');
    });

    Route::group(['prefix' => 'shop'], function(){
        Route::get('/', 'ShopApiController@get')->name('api.shop.get');
    });
});