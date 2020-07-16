<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Models\Admin\City\City;
use App\Models\Admin\Country\Country;
use App\Models\Admin\Flight\Flight;
use App\Models\Admin\Offer\Offer;
use function Couchbase\defaultDecoder;
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

    public function completeOffer(Request $request)
    {
        $s_city = $request->input('city');
        $dest_city = $request->input('destcity');

        $source_city = City::where('id',$s_city)->first();
        $destination_city = City::where('id',$dest_city)->first();
        //return [$source_city,$destination_city];
        // search for cities that have name the same is source city name
        //$search_cities = City::where('name','LIKE','%'.$s_city->name.'%')->get();
        $search_flights = Flight::where([['source_city_id',$source_city->id],['destination_city_id',$destination_city->id]])
            ->with('source_city')
            ->with('destination_city')
            ->with('flight_company')
        ->get();

        /*$search_flights = Flight::where('source_city_id',$source_city->id)
        ->where('destination_city_id',$destination_city->id)
            ->get();*/
        //dd($search_flights);

        if (count($search_flights)>0){
            $data = [];
            $allData = [];
            foreach ($search_flights as $search_flight){
                $data['flight_id'] = $search_flight['id'];
                $data['date'] = $search_flight['date'];
                $data['updated_time'] = $search_flight['updated_time'];
                $data['first_class_seats_count'] = $search_flight['first_class_seats_count'];
                $data['economy_seats_count'] = $search_flight['economy_seats_count'];
                $data['economy_ticket_price'] = $search_flight['economy_ticket_price'];
                $data['first_class_ticket_price'] = $search_flight['first_class_ticket_price'];
                $data['source_city'] = $search_flight['source_city']->name;
                $data['destination_city'] = $search_flight['destination_city']->name;
                $data['flight_company'] = $search_flight['flight_company']->name;
                array_push($allData, $data);
            }
            return view('Admin.OffersManagement.AddOfferDetails',compact(['allData']));
        }else{
            echo "<h1>No Results</h1>";
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     /*   $source_country = $request->input('country');
        $source_city = $request->input('city');
        $s_city = City::where('id',$source_city)->first();
        $q_city = City::where('name','LIKE','%'.$s_city->name.'%')->get();
       // dd($q_city);
        if (count($q_city)>0){
            return view('Admin.OffersManagement.Add',compact('q_city'));
        }

        $dest_city = $request->input('destcity');
        dd($source_city);*/


        //return view('Admin.OffersManagement.Add',compact('q_city'));
      /* $offer = new Offer();
        $offer->source_city_id = $request->input('city');
        $offer->source_country_id = $request->input('country');
        $offer->destination_city_id = $request->input('destcity');
        $offer->destination_country_id = $request->input('destcountry');
       $offer->city_id = $request->city;
        $offer->save();*/

        //return redirect()->back();
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
