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


Route::prefix('Web')->group(function () {
    Route::resource('Users', 'Web\WebController');
});


Route::prefix('Admin')->group(function () {
    Route::resource('index', 'Admin\AdminController');
    Route::resource('Countries', 'Admin\CountryController\CountryController');
});
