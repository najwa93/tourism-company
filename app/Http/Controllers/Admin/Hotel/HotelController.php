<?php

namespace App\Http\Controllers\Admin\Hotel;

use App\Models\Admin\Hotel\Hotel;
use App\Models\Admin\Hotel\HotelImage;
use App\Models\City\City;
use App\Models\Country\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::with('city')
            ->with('country')
            ->get();
        $data = [];
        $allData = [];
        foreach ($hotels as $hotel){
            $data['hotel_id'] = $hotel['id'];
            $data['hotel'] = $hotel['name'];
            $data['city'] = $hotel['city']->name;
            $data['country'] = $hotel['country']->name;
            array_push($allData,$data);
        }
            //return $allData;
        return view('Admin.HotelsManagement.Index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all()->pluck('name','id');
        //return $countries;

        return view('Admin.HotelsManagement.Add',compact('countries'));
    }

    public function getCities($id)
    {
        $cities= City::where('country_id',$id)->pluck('name','id');

        return json_encode($cities);
        // return $city;
        //  return view('welcome',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $hotel = new Hotel();
        $hotel->name = $request->input('name');
        $hotel->country_id = $request->country;
        $hotel->city_id = $request->city;
        $hotel->stars = $request->input('stars');
        $hotel->details = $request->input('abouthotel');
        $hotel->email = $request->input('email');
        $hotel->phone_number = $request->input('phone');
        $hotel->location = $request->input('location');
        $hotel->save();

        // Save multiple photos in the database
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $imgName = $image->getClientOriginalName();
                // $imgSize = $image->getClientSize();
                $imgPath = $image->storeAs('hotels', $imgName, 'images');
                $image = new HotelImage();
                $image->img_path = $imgPath;
                $image->hotel_id = $hotel->id;
                $image->save();
            }
        }

        return redirect()->back();
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
    public function edit($hotel_id)
    {
        $hotel = Hotel::findOrfail($hotel_id);
        $hotelImgs = HotelImage::where('hotel_id',$hotel->id)
            ->get();
        $country = Country::findOrfail($hotel->country_id);
        $countries = Country::all()->pluck('name','id');

        $cities = City::where('country_id',$country->id)
            ->get();
        $hotelImgs = HotelImage::where('hotel_id', $hotel->id)
            ->get();
        return view('Admin.HotelsManagement.Update',compact(['hotel','countries','cities','hotelImgs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $hotel_id)
    {
        $hotel = Hotel::findOrfail($hotel_id);

        $hotelImages = HotelImage::where('hotel_id',$hotel_id)->get();
        $hotel->name = $request->input('name');
        $hotel->country_id = $request->country;
        $hotel->city_id = $request->city;
        $hotel->stars = $request->input('stars');
        $hotel->details = $request->input('abouthotel');
        $hotel->email = $request->input('email');
        $hotel->phone_number = $request->input('phone');
        $hotel->location = $request->input('location');
        $hotel->save();


        // Save multiple photos in the database
        if ($request->hasFile('images')) {
           // $hotel->hotelImage()->detach();
            foreach ($hotelImages as $hotelImage){
                unlink(public_path('/images/'.$hotelImage->img_path));
                $hotelImage->delete();
            }
            foreach ($request->images as $image) {
                $imgName = $image->getClientOriginalName();
                // $imgSize = $image->getClientSize();
                $imgPath = $image->storeAs('hotels', $imgName, 'images');
                $image = new HotelImage();
                $image->img_path = $imgPath;
                $image->hotel_id = $hotel->id;
                $image->save();
            }

        }
        $hotel->update($request->all());


        return redirect()->route('Hotels.index');
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
