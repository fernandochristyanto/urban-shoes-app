<?php
if (App::environment('production')) {
    URL::forceScheme('https');
}
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
Route::group(['namespace' => 'Auth'], function(){
    Route::get('/logout', 'AuthController@logout')->name('logout');

    Route::group(['middleware' => 'guest:web'], function(){
        Route::get('/login','AuthController@login')->name('login');
        Route::post('/login','AuthController@doLogin')->name('dologin');
        Route::get('/register', 'AuthController@register')->name('register');
        Route::post('/register', 'AuthController@doRegister')->name('doregister');
    });
});

Route::get("/",     'UserController@home')->name('home');
Route::get("/news",     'UserController@news')->name('news');
Route::get("/discover",     'UserController@discover')->name('discover');

Route::group(['prefix' => 'search'], function() {
    Route::get("/",     'UserController@search')->name('search');
    Route::get("/q",     'ShoeController@query')->name('search.query');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get("/requestNewItem",  'AdminController@requestNewItem')->name('admin.admin-panel.requestNewItem');
    Route::get("/pendingItems",    'AdminController@pendingItems')->name('admin.admin-panel.pendingItems');
    Route::get("/completedItems",  'AdminController@completedItems')->name('admin.admin-panel.completedItems');
    Route::get("/shoeRequests",  'AdminController@shoeRequests')->name('admin.admin-panel.shoeRequests');
});

Route::group(['prefix' => 'ScrapRequest'], function(){
    Route::post('/store', 'ScrapRequestController@store')->name('scraprequest.store');
    Route::get('/requestsTable', 'ScrapRequestController@getRequestsTable')->name('_scraprequest.requeststable');
    Route::get("/scrapData",  'ScrapRequestController@getRequestDetailsTable')->name('_scraprequest.requestdetails');
    Route::post("/scrapData/updateScrapStatus",  'ScrapRequestController@updateScrapStatus')->name('_scraprequest.updatestatus');
    Route::post("/scrapData/updateRequestStatus",  'ScrapRequestController@updateRequestStatus')->name('_scraprequest.updaterequeststatus');
});