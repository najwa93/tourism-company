<?php

namespace App\Http\Controllers\Web\OfferReservation;

use App\Models\Admin\City\City;
use App\Models\Admin\Flight\Flight;
use App\Models\Admin\Hotel\Hotel;
use App\Models\Admin\Offer\Offer;
use App\Models\User\OfferReservation\OfferReservation;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OfferReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only' => ['offerDetails']]);
    }
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
    public function create()
    {
        //
    }

    // search flights function
    public function searchOffers(Request $request)
    {

        $dest_city = $request->input('dest_city');
        //return $dest_city;
        /*$offers = Offer::with('flight.destination_city.country')
            ->with('hotel')
            ->get();*/

        $offers = Offer::whereHas('flight.destination_city', function ($query) use ($dest_city) {
            $query->where('name', 'like', '%' . $dest_city . '%');
        })
            ->get();
       // return $offers;
        $data = [];
        $offer_data = [];
        foreach ($offers as $offer) {
                $flight = Flight::where('id',$offer->flight_id)->first();
                $data['offer_id'] = $offer->id;
                $data['flight_id'] = $flight->id;
                $data['country'] = $flight->destination_city->country->name;
                $data['destination_city'] = $flight->destination_city->name;
                $data['date'] = $flight->date;
                array_push($offer_data, $data);
        }
        //return $offer_data;
        return view('Web.Search.Offer.searchOffer', compact('offer_data'));
    }

    // offer details
    public function offerDetails(Request $request, $offerId, $flightId)
    {
        $offer = Offer::where('id',$offerId)->first();
        $flight = Flight::where('id',$flightId)->first();
        $returned_flight = Flight::where('id',$offer->returned_flight_id)->first();
        $hotel = Hotel::where('id',$offer->hotel_id)->first();
        //return $returned_flight;
        //return $offer_data;
        return view('Web.Search.Offer.searchOfferDetails', compact('offer','flight','returned_flight','hotel'));
    }

    public function offerReservation($offerId,$flightId){
        if (Auth::user()){
            $user = Auth::user();
            $offer = Offer::where('id',$offerId)->first();
            return view('Web.Search.Offer.completeReservation',compact('user','offer'));
        }else{
            return redirect()->intended('offerDetails');
        }
    }

    public function completeOfferReservation(Request $request,$offerId,$flightId){
        //$user = Auth::user();
        $offer = Offer::where('id',$offerId)->first();
        $flight = Flight::where('id',$flightId)->first();

        $offerReservation = new OfferReservation();
        $offerReservation->user_id = Auth::user()->id;
        $offerReservation->offer_id = $offer->id;
        $offerReservation->date = $flight->date;
        $offerReservation->time = $flight->time;
        $offerReservation->save();

        return redirect()->back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
