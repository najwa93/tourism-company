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
    Route::get('/getCities/{id}','Admin\Hotel\HotelController@getCities' );

    //Hotels Controller
    Route::resource('Hotels', 'Admin\Hotel\HotelController');
    Route::prefix('Hotels')->group(function () {
        Route::resource('Rooms', 'Admin\Hotel\RoomController');
        Route::get('getRoom/{Hotel}', 'Admin\Hotel\RoomController@getRoom')->name('GetRoom.create');
        Route::post('storeRoom/{Hotel}', 'Admin\Hotel\RoomController@storeRoom')->name('StoreRoom.store');
    });

   //Flights Controller
    Route::resource('Flights', 'Admin\Flight\FlightController');
    Route::get('Flights/{flight}/delete', 'Admin\Flight\FlightController@delete')->name('Flights.delete');
    Route::prefix('Flights')->group(function () {
        Route::resource('FlightCompany', 'Admin\Flight\FlightCompanyController');
        Route::get('FlightCompany/{flightCompany}/delete', 'Admin\Flight\FlightCompanyController@delete')->name('FlightCompany.delete');
    });

    //Offers Controller
    Route::resource('Offers', 'Admin\Offer\OfferController');
    Route::get('/getCities/{id}','Admin\Offer\OfferController@getCities' );
    Route::get('/getDestCities/{id}','Admin\Offer\OfferController@getDestCities' );
    Route::get('showOfferDetails','Admin\Offer\OfferController@showOfferDetails' )->name('showOfferDetails');
    Route::post('/completeOffer','Admin\Offer\OfferController@completeOffer' )->name('completeOffer');
    Route::get('Offers/{offer}/delete', 'Admin\Offer\OfferController@delete')->name('Offers.delete');
});

//Route::get('/','Admin\CountryController\TestController@index' );
//Route::get('/getCities/{id}','Admin\CountryController\TestController@getStates' );
