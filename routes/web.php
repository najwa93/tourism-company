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




Route::prefix('Web')->group(function () {
    Route::resource('Users', 'Web\WebController');
});


Route::prefix('Admin')->group(function () {
    Route::resource('Main', 'Admin\AdminController');

    //Countries Controller
    Route::resource('Countries', 'Admin\CountryController\CountryController');
    Route::get('Countries/{Country}/delete', 'Admin\CountryController\CountryController@delete')->name('Countries.delete');

    //Cities Controller
    Route::resource('Cities', 'Admin\City\CityController');
    Route::get('getCity/{Country}', 'Admin\City\CityController@getCity')->name('GetCity.create');
    Route::post('storeCity/{Country}', 'Admin\City\CityController@storeCity')->name('StoreCity.store');
    Route::get('Cities/{City}/delete', 'Admin\City\CityController@delete')->name('Cities.delete');
    //Hotels Controller
    Route::resource('Hotels', 'Admin\Hotel\HotelController');
    Route::get('/getCities/{id}','Admin\Hotel\HotelController@getCities' );

    //Images Controller
    Route::resource('Images', 'Admin\Hotel\HotelController');
});

//Route::get('/','Admin\CountryController\TestController@index' );
//Route::get('/getCities/{id}','Admin\CountryController\TestController@getStates' );
