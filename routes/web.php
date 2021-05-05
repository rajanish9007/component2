<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers;

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
Route::get('create', 'App\Http\Controllers\ShopController@create');
Route::post('insert', 'App\Http\Controllers\ShopController@store')->name('store');
Route::get('index', 'App\Http\Controllers\ShopController@index')->name('index');
Route::get('show/{id}', 'App\Http\Controllers\ShopController@show')->name('showproduct');
Route::put('update/{id}', 'App\Http\Controllers\ShopController@update')->name('update');
Route::get('delete/{id}', 'App\Http\Controllers\ShopController@destroy')->name('delete');



