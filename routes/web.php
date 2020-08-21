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

Auth::routes();

//User Routes
Route::resource('home_page','Web\WebController' );
Route::prefix('Web')->group(function () {
    Route::resource('Users', 'Web\WebController');
    Route::get('editUserProfile', 'Web\WebController@editUserProfile')->name('editUserProfile');
    Route::post('updateUserProfile', 'Web\WebController@updateUserProfile')->name('updateUserProfile');
    //hotel reservation
    Route::get('searchHotels', 'Web\WebController@searchHotels')->name('searchHotels');
    Route::get('hotelDetails/{hotel}/{room}', 'Web\WebController@hotelDetails')->name('hotelDetails');
    Route::get('reserveHotel/{hotel}/{room}', 'Web\WebController@hotelReservation')->name('hotelReservation');
    Route::post('completeHotelReservation/{hotel}/{room}', 'Web\WebController@completeHotelReservation')->name('completeHotelReservation');

    //flight reservation
    Route::get('searchFlights', 'Web\FlightReservation\FlightReservationController@searchFlights')->name('searchFlights');
    Route::get('flightDetails/{flight}', 'Web\FlightReservation\FlightReservationController@flightDetails')->name('flightDetails');
    Route::post('completeFlightReservation/{flight}', 'Web\FlightReservation\FlightReservationController@completeFlightReservation')->name('completeFlightReservation');

    //Offer reservation
    Route::get('searchOffers', 'Web\OfferReservation\OfferReservationController@searchOffers')->name('searchOffers');
    Route::get('offerDetails/{offer}/{flight}', 'Web\OfferReservation\OfferReservationController@offerDetails')->name('offerDetails');
    Route::get('reserveOffer/{offer}/{flight}', 'Web\OfferReservation\OfferReservationController@offerReservation')->name('offerReservation');
    Route::post('completeOfferReservation/{offer}/{flight}', 'Web\OfferReservation\OfferReservationController@completeOfferReservation')->name('completeOfferReservation');

    Route::get('showUserReservations', 'Web\WebController@showUserReservations')->name('showUserReservations');
    Route::get('deleteHotelReservations/{reservation}', 'Web\WebController@deleteHotelReservation')->name('deleteHotelReservation');
    Route::get('deleteFlightReservations/{reservation}', 'Web\WebController@deleteFlightReservation')->name('deleteFlightReservation');


});

// Admin Routes
Route::prefix('Admin')->group(function () {
    Route::resource('Main', 'Admin\AdminController');

    //Countries Management
    Route::resource('Countries', 'Admin\CountryController\CountryController');
    //Route::post('Countries', 'Admin\CountryController\CountryController');
    Route::get('Countries/{Country}/delete', 'Admin\CountryController\CountryController@delete')->name('Countries.delete');

    //Cities Management
    Route::resource('Cities', 'Admin\City\CityController');
    Route::get('getCity/{Country}', 'Admin\City\CityController@getCity')->name('GetCity.create');
    Route::post('storeCity/{Country}', 'Admin\City\CityController@storeCity')->name('StoreCity.store');
    Route::get('Cities/{City}/delete', 'Admin\City\CityController@delete')->name('Cities.delete');
    Route::get('Hotel/getCities/{id}','Admin\Hotel\HotelController@getCities' );

    //Hotels Management
    Route::resource('Hotels', 'Admin\Hotel\HotelController');
    Route::prefix('Hotels')->group(function () {
        Route::resource('Rooms', 'Admin\Hotel\RoomController');
        Route::get('getRoom/{Hotel}', 'Admin\Hotel\RoomController@getRoom')->name('GetRoom.create');
        Route::post('storeRoom/{Hotel}', 'Admin\Hotel\RoomController@storeRoom')->name('StoreRoom.store');
    });

    //FlightsManagement
    Route::resource('Flights', 'Admin\Flight\FlightController');
    Route::get('Flights/{flight}/delete', 'Admin\Flight\FlightController@delete')->name('Flights.delete');
    Route::prefix('Flights')->group(function () {
        Route::resource('FlightCompany', 'Admin\Flight\FlightCompanyController');
        Route::get('FlightCompany/{flightCompany}/delete', 'Admin\Flight\FlightCompanyController@delete')->name('FlightCompany.delete');
    });

    //Offers Management
    Route::resource('Offers', 'Admin\Offer\OfferController');
    Route::get('/getCities/{id}','Admin\Offer\OfferController@getCities' );
    Route::get('/getDestCities/{id}','Admin\Offer\OfferController@getDestCities' );
    Route::get('showOfferDetails','Admin\Offer\OfferController@showOfferDetails' )->name('showOfferDetails');
    Route::post('/completeOffer','Admin\Offer\OfferController@completeOffer' )->name('completeOffer');
    Route::get('Offers/{offer}/delete', 'Admin\Offer\OfferController@delete')->name('Offers.delete');

    //User Management
    Route::resource('Users', 'Admin\User\UserController');
});


//Route::get('/getCities/{id}','Admin\CountryController\TestController@getStates' );
//Route::get('/home', 'HomeController@index')->name('home');
