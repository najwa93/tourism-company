<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Models\Admin\City\City;
use App\Models\Admin\Country\Country;
use App\Models\Admin\Offer\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getCities($id)
    {
        $cities = City::where('country_id', $id)->pluck('name', 'id');

        return json_encode($cities);
        // return $city;
        //  return view('welcome',compact('countries'));
    }

    public function getDestCities($id)
    {
        $cities = City::where('country_id', $id)->pluck('name', 'id');

        return json_encode($cities);
        // return $city;
        //  return view('welcome',compact('countries'));
    }


    //show destination flight & source flight & hotel
    public function showOfferDetails(Request $request)
    {
        $cities = City::where('id', $request->input('city'))
        ->get();

        return $cities;
        // return $city;
        //  return view('welcome',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all()->pluck('name', 'id');
        return view('Admin.OffersManagement.Add',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $offer = new Offer();
        $offer->source_city_id = $request->input('city');
        $offer->source_country_id = $request->input('country');
        $offer->destination_city_id = $request->input('destcity');
        $offer->destination_country_id = $request->input('destcountry');
        $offer->city_id = $request->city;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
