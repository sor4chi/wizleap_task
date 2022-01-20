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


Route::get('/post', 'PostsController@index');
Route::post('/post/items/', 'PostsController@items');
Route::post('/post/store_item', 'PostsController@store_item');
Route::post('/post/edit_item', 'PostsController@edit_item');
Route::post('/post/update_item_order', 'PostsController@update_item_order');
Route::post('/post/delete_item', 'PostsController@delete_item');
Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');
