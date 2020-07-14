<?php

namespace App\Http\Controllers\Admin\Flight;

use App\Models\Admin\City\City;
use App\Models\Admin\Flight\Flight;
use App\Models\Admin\Flight\FlightCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flightCompanies = FlightCompany::all();

        $flights = Flight::with('source_city')
            ->with('destination_city')
            ->with('flight_company')
            ->get();

        $data = [];
        $allData = [];
        foreach ($flights as $flight) {
            $data['flight_id'] = $flight['id'];
            $data['date'] = $flight['date'];
            $data['time'] = $flight['time'];
            $data['first_class_seats_count'] = $flight['first_class_seats_count'];
            $data['economy_seats_count'] = $flight['economy_seats_count'];
            $data['economy_ticket_price'] = $flight['economy_ticket_price'];
            $data['first_class_ticket_price'] = $flight['first_class_ticket_price'];
            $data['source_city'] = $flight['source_city']->name;
            $data['destination_city'] = $flight['destination_city']->name;
            $data['flight_company'] = $flight['flight_company']->name;
            array_push($allData, $data);
        }


        return view('Admin.FlightsManagement.FlightManagement.Index',compact(['flightCompanies','allData']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all()->pluck('name','id');
        $flightCompanies = FlightCompany::all()->pluck('name','id');
        return view('Admin.FlightsManagement.FlightManagement.Add',compact(['cities','flightCompanies']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flight = new Flight();
        $flight->source_city_id = $request->input('source_city');
        $flight->destination_city_id = $request->input('dist_city');
        $flight->flight_company_id = $request->input('flight_company');
        $flight->economy_seats_count = $request->input('economy_seats_count');
        $flight->first_class_seats_count = $request->input('first_class_seats_count');
        $flight->flight_duration = $request->input('duration');
        $flight->date = $request->input('date');
        $time = $request->input('time');
        $converted_time = date("h:ia", strtotime($time));
        $flight->time =$converted_time;
        $flight->economy_ticket_price = $request->input('economy_ticket_price');
        $flight->first_class_ticket_price = $request->input('first_class_ticket_price');

        $flight->save();

         return redirect()->route('Flights.index');

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
    public function edit($flight_id)
    {
        $flight = Flight::findOrfail($flight_id);
        return view('Admin.FlightsManagement.FlightManagement.Update',compact(['flight']));
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
