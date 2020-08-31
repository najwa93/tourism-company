<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Models\Admin\City\City;
use App\Models\Admin\Country\Country;
use App\Models\Admin\Flight\Flight;
use App\Models\Admin\Flight\FlightDegree;
use App\Models\Admin\Hotel\Hotel;
use App\Models\Admin\Hotel\HotelRoom;
use App\Models\Admin\Offer\Offer;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('Role:Admin,Offer_Manager');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::with('flight.source_city')
            ->with('flight.destination_city')
            ->get();

        //return $offers;
        $data = [];
        $allData = [];
        foreach ($offers->toArray() as $offer) {
            $data['offer_id'] = $offer['id'];
            $data['source_city'] = $offer['flight']['source_city']['name'];
            $data['destination_city'] = $offer['flight']['destination_city']['name'];
            array_push($allData, $data);
        }

        return view('Admin.OffersManagement.Index',compact('allData'));
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

    }


    //show destination flight & source flight & hotel
    public function showOfferDetails(Request $request)
    {
        $cities = City::where('id', $request->input('city'))
        ->get();

        return $cities;

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
        $this->validate($request, [
            'city' => 'required',
            'country' => 'required',
            'destcity' => 'required',
            'destcountry' => 'required',
        ]);
        $flightDegrees = FlightDegree::all();
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
           // return $search_flights;
        $return_search_flights = Flight::where([['source_city_id',$destination_city->id],['destination_city_id',$source_city->id]])
            ->with('source_city')
            ->with('destination_city')
            ->with('flight_company')
            ->get();

        $hotels = Hotel::where('city_id',$destination_city->id)
            ->with(['hotel_room' =>function($query){
                $query->where('is_available',1);
            }])
            ->with('city')
            ->get();

       // return $hotels;
        $hotelData = [];
        $allHotelData = [];
        foreach ($hotels as $hotel) {
             $hotelData ['hotel_id'] = $hotel['id'];
             $hotelData ['hotel'] = $hotel['name'];
             $hotelData ['city'] = $hotel['city']->name;
             $hotelData ['country'] = $hotel['country']->name;
            foreach ($hotel['hotel_room'] as $value) {
                 $hotelData['hotel_room_id'] = $value->id;
                 $hotelData['hotel_room'] = $value->name;
                 $hotelData['customers_count'] = $value->customers_count;
                 $hotelData['details'] = $value->details;
                 $hotelData['night_price'] = $value->night_price;
                 $hotelData['hotel_room_type'] = $value->room_type->name;
                array_push($allHotelData,  $hotelData);
            }
           // return $allHotelData;
           // array_push($allHotelData,  $hotelData );
        }


        //return all flight for return journey
        $returnedData = [];
        $allReturnedData = [];
        foreach ($return_search_flights as $search_flight){
            $returnedData['flight_id'] = $search_flight['id'];
            $returnedData['date'] = $search_flight['date'];
            $returnedData['updated_time'] = $search_flight['updated_time'];
            $returnedData['first_class_seats_count'] = $search_flight['first_class_seats_count'];
            $returnedData['economy_seats_count'] = $search_flight['economy_seats_count'];
            $returnedData['economy_ticket_price'] = $search_flight['economy_ticket_price'];
            $returnedData['first_class_ticket_price'] = $search_flight['first_class_ticket_price'];
            $returnedData['source_city'] = $search_flight['source_city']->name;
            $returnedData['destination_city'] = $search_flight['destination_city']->name;
            $returnedData['flight_company'] = $search_flight['flight_company']->name;
            array_push($allReturnedData, $returnedData);
        }
        /*$search_flights = Flight::where('source_city_id',$source_city->id)
        ->where('destination_city_id',$destination_city->id)
            ->get();*/
        //dd($search_flights);

        //return all flight for going flight

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

            //return $allData;
            return view('Admin.OffersManagement.AddOfferDetails',compact(['allData','allReturnedData','allHotelData','flightDegrees']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'seats_count' => 'required',
            'flight_degree' => 'required',
            'customers_count' => 'required',
            'flight' => 'required',
            'returned_flight' => 'required',
            'room' => 'required',
            'price' => 'required'
        ]);
        $offer = new Offer();
        $offer->customers_count = $request->input('customers_count');
        $offer->seats_number = $request->input('seats_count');
        $offer->flight_degree_id = $request->input('flight_degree');
        $offer->offer_duration = $request->input('offer_duration');
        $offer->details = $request->input('offer_duration');
        $offer->price = $request->input('price');
       // $offer->flight_status = $request->input('flight_degree');
        $flightVal =  $request->input('flight');
        $offer->flight_id = $flightVal;
        $returnedFlightVal =  $request->input('returned_flight');
        $offer->returned_flight_id = $returnedFlightVal;
        $roomId =  $request->input('room');
       // $room = HotelRoom::where('id',$roomId)->first();
        $offer->room_id = $roomId;
        //$offer->status = $request->input('flight') == 'true' ? 1 : 0;
        $offer->save();

        return redirect()->route('Offers.index')->with('success','تم إنشاء عرض سياحي جديد بنجاح');
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
    public function edit($offer_id)
    {
        $flightDegrees = FlightDegree::all();
        $editedOffer = Offer::findOrfail($offer_id);
        $offer = Offer::where('id',$offer_id)
            ->with('flight.flight_company')
            ->with('flight.source_city')
            ->with('flight.destination_city')
            ->with('returned_flight.flight_company')
            ->with('returned_flight.source_city')
            ->with('returned_flight.destination_city')
           // ->with('hotel.hotel_room.room_type')
           // ->with('hotel.city')
           // ->with('hotel.country')
            ->with('room.hotel')
                ->get();
     // return $offer;
        $data = [];
        $allData = [];
        foreach ($offer as $value){
            $data['offer_id'] = $value['id'];
            $data['status'] = $value['status'];
            $data['customers_count'] = $value['customers_count'];
            $data['seats_number'] = $value['seats_number'];
            $data['price'] = $value['price'];
            $data['offer_duration'] = $value['offer_duration'];
            $data['details'] = $value['details'];

            // flight details
            $data['flight_id'] = $value['flight']['id'];
            $data['flight_source_city'] = $value['flight']['source_city']['name'];
            $data['flight_destination_city'] = $value['flight']['destination_city']['name'];
            $data['flight_date'] = $value['flight']['date'];
            $data['flight_time'] = $value['flight']['time'];
            $data['flight_company'] = $value['flight']['flight_company']['name'];
            $data['flight_economy_seats_count'] = $value['flight']['economy_seats_count'];
            $data['flight_first_class_seats_count'] = $value['flight']['first_class_seats_count'];
            $data['flight_economy_ticket_price'] = $value['flight']['economy_ticket_price'];
            $data['flight_first_class_ticket_price'] = $value['flight']['first_class_ticket_price'];


            // return flight details
            $data['returned_flight_id'] = $value['returned_flight']['id'];
            $data['returned_flight_source_city'] = $value['returned_flight']['source_city']['name'];
            $data['returned_flight_destination_city'] = $value['returned_flight']['destination_city']['name'];
            $data['returned_flight_date'] = $value['returned_flight']['date'];
            $data['returned_flight_time'] = $value['returned_flight']['time'];
            $data['returned_flight_company'] = $value['returned_flight']['flight_company']['name'];
            $data['returned_flight_economy_seats_count'] = $value['returned_flight']['economy_seats_count'];
            $data['returned_flight_first_class_seats_count'] = $value['returned_flight']['first_class_seats_count'];
            $data['returned_flight_economy_ticket_price'] = $value['returned_flight']['economy_ticket_price'];
            $data['returned_flight_first_class_ticket_price'] = $value['returned_flight']['first_class_ticket_price'];

          //  return $value['room']['hotel'];
            // hotel
            $data['hotel_id'] = $value['room']['hotel']['id'];
            //return $data;
            $data['hotel_name'] = $value['room']['hotel']['name'];
            $data['hotel_city'] = $value['room']['hotel']['city']['name'];
            $data['hotel_country'] = $value['room']['hotel']['country']['name'];
            $data['hotelRoom_id'] = $value['room']['id'];
            $data['hotelRoom_name'] = $value['room']['name'];
            $data['hotelRoom_customers_count'] = $value['room']['customers_count'];
            $data['hotelRoom_night_price'] = $value['room']['night_price'];
            $data['hotelRoom_type'] = $value['room']->room_type->name;
            /*foreach ($value['hotel']['hotel_room'] as $hotelRoom) {
                $data['hotelRoom_name'] = $hotelRoom['name'];
                $data['hotelRoom_customers_count'] = $hotelRoom['customers_count'];
                $data['hotelRoom_night_price'] = $hotelRoom['night_price'];
                $data['hotelRoom_type'] = $hotelRoom['room_type']['name'];

            }*/
            array_push($allData,$data);
        }
       //return $allData;

        return view('Admin.OffersManagement.Update',compact('editedOffer','allData','flightDegrees'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $offer_id)
    {
        $this->validate($request, [
            //'flight' => 'required',
            //'returned_flight' => 'required',
            'seats_count' => 'required',
            'flight_degree' => 'required',
            'customers_count' => 'required',
          //  'room' => 'required'
           'price' => 'required'
        ]);
        $editedOffer = Offer::findOrfail($offer_id);
        $editedOffer->customers_count = $request->input('customers_count');
        $editedOffer->seats_number = $request->input('seats_count');
        $editedOffer->flight_degree_id = $request->input('flight_degree');
        $editedOffer->offer_duration = $request->input('offer_duration');
        $editedOffer->details = $request->input('offer_duration');
        $editedOffer->price = $request->input('price');

        $editedOffer->save();

        return redirect()->route('Offers.index')->with('success','تم تعديل العرض بنجاح');
    }

    public function delete($offer_id){
        $flightDegrees = FlightDegree::all();
        $editedOffer = Offer::findOrfail($offer_id);
        $offer = Offer::where('id',$offer_id)
            ->with('flight.flight_company')
            ->with('flight.source_city')
            ->with('flight.destination_city')
            ->with('returned_flight.flight_company')
            ->with('returned_flight.source_city')
            ->with('returned_flight.destination_city')
            //->with('hotel.hotel_room.room_type')
          //  ->with('hotel.city')
           // ->with('hotel.country')
          ->with('room.hotel')
            ->get();
        // return $offer;
        $data = [];
        $allData = [];
        foreach ($offer as $value){
            $data['offer_id'] = $value['id'];
            $data['status'] = $value['status'];
            $data['customers_count'] = $value['customers_count'];
            $data['seats_number'] = $value['seats_number'];
            $data['price'] = $value['price'];
            $data['offer_duration'] = $value['offer_duration'];
            $data['details'] = $value['details'];

            // flight details
            $data['flight_id'] = $value['flight']['id'];
            $data['flight_source_city'] = $value['flight']['source_city']['name'];
            $data['flight_destination_city'] = $value['flight']['destination_city']['name'];
            $data['flight_date'] = $value['flight']['date'];
            $data['flight_time'] = $value['flight']['time'];
            $data['flight_company'] = $value['flight']['flight_company']['name'];
            $data['flight_economy_seats_count'] = $value['flight']['economy_seats_count'];
            $data['flight_first_class_seats_count'] = $value['flight']['first_class_seats_count'];
            $data['flight_economy_ticket_price'] = $value['flight']['economy_ticket_price'];
            $data['flight_first_class_ticket_price'] = $value['flight']['first_class_ticket_price'];


            // return flight details
            $data['returned_flight_id'] = $value['returned_flight']['id'];
            $data['returned_flight_source_city'] = $value['returned_flight']['source_city']['name'];
            $data['returned_flight_destination_city'] = $value['returned_flight']['destination_city']['name'];
            $data['returned_flight_date'] = $value['returned_flight']['date'];
            $data['returned_flight_time'] = $value['returned_flight']['time'];
            $data['returned_flight_company'] = $value['returned_flight']['flight_company']['name'];
            $data['returned_flight_economy_seats_count'] = $value['returned_flight']['economy_seats_count'];
            $data['returned_flight_first_class_seats_count'] = $value['returned_flight']['first_class_seats_count'];
            $data['returned_flight_economy_ticket_price'] = $value['returned_flight']['economy_ticket_price'];
            $data['returned_flight_first_class_ticket_price'] = $value['returned_flight']['first_class_ticket_price'];

            // hotel
            $data['hotel_id'] = $value['room']['hotel']['id'];
            //return $data;
            $data['hotel_name'] = $value['room']['hotel']['name'];
            $data['hotel_city'] = $value['room']['hotel']['city']['name'];
            $data['hotel_country'] = $value['room']['hotel']['country']['name'];
            $data['hotelRoom_id'] = $value['room']['id'];
            $data['hotelRoom_name'] = $value['room']['name'];
            $data['hotelRoom_customers_count'] = $value['room']['customers_count'];
            $data['hotelRoom_night_price'] = $value['room']['night_price'];
            $data['hotelRoom_type'] = $value['room']->room_type->name;
            array_push($allData,$data);
        }
        // return $allData;
        return view('Admin.OffersManagement.Delete',compact('editedOffer','allData','flightDegrees'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($offer_id)
    {
        $offer = Offer::where('id',$offer_id)
            ->first();

        $offer->delete();

        return redirect()->route('Offers.index')->with('success','تمت عملية الحذف بنجاح');
    }
}
