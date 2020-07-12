<?php

namespace App\Http\Controllers\Admin\City;

use App\Models\City\City;
use App\Models\City\CityImage;
use App\Models\Country\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\Location;
use PHPUnit\Framework\Constraint\Count;

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

    // get cities with related country
    public function getCity($country_id)
    {
        $country = Country::findOrfail($country_id);

        return view('Admin.CityManagement.Add', compact('country'));
    }

    // get cities wuth related country
    public function storeCity(Request $request, $country_id)
    {
        $country = Country::findOrfail($country_id);
        $city = new City();
        $city->name = $request->input('cityname');
        $city->description = $request->input('aboutcity');
        $city->city_location = $request->input('location');
        $city->country_id = $country->id;
        $city->save();
        // Save multiple photos in the database
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $imgName = $image->getClientOriginalName();
                // $imgSize = $image->getClientSize();
                $imgPath = $image->storeAs('cities', $imgName, 'images');
                $image = new CityImage();
                $image->img_path = $imgPath;
                $image->city_id = $city->id;
                $image->save();
            }
        }

        return redirect()->route('Countries.show', $country->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($city_id)
    {
        $city = City::findOrfail($city_id);
        $cityImgs = CityImage::where('city_id', $city->id)
            ->get();

        return view('Admin.CityManagement.Update', compact(['city', 'cityImgs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $city_id)
    {
        $city = City::findOrfail($city_id);
        $country = Country::where('id', $city->country_id)->first();
        $cityImgs = CityImage::where('city_id', $city->id)
            ->get();
        $city->name = $request->input('cityname');
        $city->description = $request->input('aboutcity');
        $city->city_location = $request->input('location');
        $city->save();



        // Save multiple photos in the database
        if ($request->hasFile('images')) {
            foreach ($cityImgs as $cityImage) {
                unlink(public_path('/images/' . $cityImage->img_path));
                $cityImage->delete();
            }
            foreach ($request->images as $image) {
                $imgName = $image->getClientOriginalName();
                // $imgSize = $image->getClientSize();
                $imgPath = $image->storeAs('hotels', $imgName, 'images');
                $image = new CityImage();
                $image->img_path = $imgPath;
                $image->city_id = $city->id;
                $image->save();
            }

        }

        return redirect()->route('Countries.show', $country->id);
    }

    public function storeLocation(Request $request)
    {
        //abort_unless(\Gate::allows('company_create'), 403);
        $location = Location::create($request->all());
       // return redirect()->route('admin.companies.index');
    }

    public function delete($city_id){
        $city = City::findOrfail($city_id);
        $cityImgs = CityImage::where('city_id',$city_id)
            ->get();
        return view('Admin.CityManagement.Delete',compact('city','cityImgs'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($city_id)
    {
        $city = City::findOrfail($city_id);
        $country = Country::where('id', $city->country_id)->first();
        $cityImgs = CityImage::where('city_id',$city_id)
            ->get();
        foreach ($cityImgs as $cityImage) {
            unlink(public_path('/images/' . $cityImage->img_path));
            $cityImage->delete();
        }
        $city->delete();

        return redirect()->route('Countries.show', $country->id);
    }
}
