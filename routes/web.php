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
    Route::get("/requestNewItem",  'AdminController@requestNewItem')->name('admin.admin-panel.requestNewItem');
    Route::get("/pendingItems",    'AdminController@pendingItems')->name('admin.admin-panel.pendingItems');
    Route::get("/completedItems",  'AdminController@completedItems')->name('admin.admin-panel.completedItems');
});