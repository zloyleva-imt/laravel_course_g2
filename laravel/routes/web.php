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

Route::group(['prefix' => 'products', 'as' => 'products.'], function (){
    Route::get('/', 'ProductsController@index')->name('index');
    Route::get('/{product_id}/', 'ProductsController@show')->name('show')->where(['product_id' => '[0-9]+']);
    Route::get('/create','ProductsController@create')->name('create');
    Route::post('/', 'ProductsController@store')->name('store');
    Route::get('/{product_id}/edit', 'ProductsController@edit')->name('edit');
    Route::put('/{product_id}', 'ProductsController@update')->name('update');
    Route::delete('/{product_id}', 'ProductsController@destroy')->name('destroy');
});

Route::get('/contacts/{any?}', 'ContactsController');

Route::resource('news', 'NewsController');
Route::resource('users', 'UsersController');