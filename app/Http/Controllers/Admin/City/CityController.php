<?php

namespace App\Http\Controllers\Admin\City;

use App\Models\City\City;
use App\Models\Country\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function create()
    {
        return view('Admin.CityManagement.Add');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /* public function store(Request $request)
    {
        $city = new City();
        $city->name = $request->input('name');
        $city->description = $request->input('description');
    }*/

    // get city wuth related country
    /*public function create($country_id)
    {
        $country = Country::findOrfail($country_id);
        return view('Admin.CityManagement.Add' , compact(' country'));
    }*/

    // get city with related country
    public function getCity($country_id)
    {
        $country = Country::findOrfail($country_id);
        return view('Admin.CityManagement.Add',compact('country'));
    }

    // get city wuth related country
    public function storeCity(Request $request,$country_id)
    {
        $country = Country::findOrfail($country_id);
        $city = new City();
        $city->name = $request->input('cityname');
        $city->description = $request->input('aboutcity');
        $city->country_id = $country->id;

        $city->save();
        return redirect()->route('Countries.show',$country->id);
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
