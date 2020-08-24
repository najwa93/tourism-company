<?php

namespace App\Http\Controllers\Web;

use App\Models\Admin\Country\Country;
use App\Models\Admin\Flight\FlightDegree;
use App\Models\Admin\Hotel\Hotel;
use App\Models\Admin\Hotel\HotelRoom;
use App\Models\Admin\Hotel\RoomType;
use App\Models\User\FlightReservation\FlightReservation;
use App\Models\User\HotelReservation\HotelReservation;
use App\Models\User\Messages\Message;
use App\Models\User\Messages\MessageReply;
use App\Models\User\Subscribe\Subscribe;
use App\Notifications\Msg;
use App\User;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class WebController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['hotelReservation', 'subscribe']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $flight_degrees = FlightDegree::all()->pluck('name', 'id');
        $rated_messages = Message::where('show_as_rate', 1)->get();

        if ($rated_messages == null){
            $rated_messages = null;
        }

        //return $rated_messages;

        return view('Web.Main_view', compact('flight_degrees', 'rated_messages'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*     $user = Auth::user();

             $message = new Message();
             $message->user_id = $user->id;
             $message->user_name = $request->input('name');
             $message->email = $request->input('email');
             $message->message = $request->input('message');

             $message->save();
             return redirect()->back();*/

    }

    //send database notification
    public function send(Request $request)
    {
        $user = Auth::user();
        $msg = new Message();
        if ($user != null) {
            $msg->user_id = $user->id;
        }
        $msg->email = $request->input('email');
        $msg->user_name = $request->input('name');
        $msg->message = $request->input('message');
        $msg->is_read = 0;
        $msg->show_as_rate = 0;
        $msg->save();
        /* $user = User::whereHas('role', function($query){
             $query->where('name','Admin')->orWhere('name','Support');
         })->get();
         $message = new Message();

         $message->user_name = $request->input('name');
         $message->email = $request->input('email');
         $message->message = $request->input('message');

         $message->save();

         Notification::send($user,new Msg($message));*/
        return redirect()->back();

    }

    public function subscribe(Request $request)
    {
        $this->validate($request, ['email' => 'string', 'email', 'max:255', 'unique:users']);

        $user = Auth::user();

        $email = $request->input('email');
        $checkUser = Subscribe::where('email','=',$email)->first();
        if ($checkUser == null){
        $subscriber = new Subscribe();
        $subscriber->user_id = $user->id;
        $subscriber->email = $email;
        $subscriber->save();
        }else{
            return redirect()->back()->with('warning','تم الاشتراك مسبقاً');
        }
        return redirect()->back();
        //return view('Admin.SupportManagement.Index',compact('rated_messages'));
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

    // update user profile
    public function editUserProfile()
    {
        $user = Auth::user();
        $countries = Country::all()->pluck('name', 'id');
        return view('Web.Auth.User.Update', compact(['user', 'countries']));
    }

    // update users
    public function updateUserProfile(Request $request)
    {
        $user = Auth::user();
        if ($this->check($request->input('c_password'))) {
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->user_name = $request->input('user_name');
            $user->phone_number = $request->input('phone_number');
            $user->country = $request->input('country');
            $user->gender = $request->input('gender');
            $user->save();
            if (!is_null($request->input('password')) and ($request->input('password') == $request->input('password_confirmation'))) {
                $user->password = Hash::make($request->input('password'));
                $user->save();
            }
            if ($user->role_id != 8) {
                return redirect()->route('Main.index');
            } else {
                return redirect()->route('home_page.index');
            }
        } else {
            dd('error');
        }

    }

    protected function check($password)
    {
        if (Hash::check($password, Auth::user()->getAuthPassword())) {
            return true;
        }
        return false;
    }

    /* public function fetch(Request $request){
         if ($request->get('query')){
             $query = $request->get('query');
             $data = DB::table('cities')
                 ->where( 'name','like','%{$query}%')
                 ->get();
             $output = '<ul class="dropdown-menu" style="display: block;position: relative"> ';
                     foreach ($data as $row){
                         $output .= '<li><a href="#">'.$row->country_name.'</a></li>';
                     }
             $output .= '</ul>';
                     echo $output;

         }
     }*/

    // search hotels function
    public function searchHotels(Request $request)
    {

        $request->session()->put('checkin', $request->input('checkin'));
        $request->session()->put('checkout', $request->input('checkout'));
        //return($request->session()->get('checkin'));
        $city = $request->input('city');
        $customers_count = $request->input('customers_count');
        $hotels = Hotel::whereHas('city', function ($query) use ($city) {
            $query->where('name', 'like', '%' . $city . '%');
        })
            ->whereHas('hotel_room', function ($query) use ($customers_count) {
                $query->where('is_available', '=', 1);
                $query->where('customers_count', '=', $customers_count);
            })
            ->get();
        // return $hotels;
        $data = [];
        $hotel_data = [];
        foreach ($hotels as $hotel) {
            $data['hotel_id'] = $hotel->id;
            $data['hotel_name'] = $hotel->name;
            foreach ($hotel['hotel_room'] as $hotelRoom) {
                $data['room_id'] = $hotelRoom->id;
                $data['room_type'] = $hotelRoom->room_type->name;
                $data['customers_count'] = $hotelRoom['customers_count'];
                $data['room_details'] = $hotelRoom['details'];
                $data['night_price'] = $hotelRoom['night_price'];
                array_push($hotel_data, $data);
            }
        }
        // return $hotel_data;

        return view('Web.Search.Hotel.searchHotel', compact('hotel_data'));
    }

    // hotel details
    public function hotelDetails($hotelId, $roomId)
    {
        $user = Auth::user();
        $room = HotelRoom::where('id', $roomId)->first();
        $hotel = Hotel::where('id', $hotelId)
            ->with('hotelImage')
            ->first();

        //return $hotel;
        // $request->session()->put('room',$room->id);
        //return $hotel;
        /*$hotel_data = [];
        $hotelArr = [];
           $hotel_data['hotel_id'] = $hotel->id;
           $hotel_data['hotel_stars'] = $hotel->stars;
           $hotel_data['hotel_details'] = $hotel->stars;
        foreach ($hotel->hotelImage as $img){
            $hotel_data['hotel_img'] = $img->img_path;
            array_push($hotelArr,$hotel_data);
        }
   */
        // return $hotel;
        return view('Web.Search.Hotel.searchHotelDetails', compact('hotel', 'room', 'user'));
    }

    public function hotelReservation($hotelId, $roomId)
    {
        if (Auth::user()) {
            $user = Auth::user();
            $room = HotelRoom::where('id', $roomId)->first();
            $hotel = Hotel::where('id', $hotelId)->first();
            return view('Web.Search.Hotel.completeReservation', compact('room', 'hotel', 'user'));
        } else {
            return redirect()->intended('hotelDetails');
        }
    }

    public function completeHotelReservation(Request $request, $hotelId, $roomId)
    {
        $user = Auth::user();
        $room = HotelRoom::where('id', $roomId)->first();
        $room->is_available = 0;
        $room->save();
        $hotelReservation = new HotelReservation();
        $hotelReservation->user_id = Auth::user()->id;
        $hotelReservation->hotel_id = $hotelId;
        $hotelReservation->room_id = $roomId;
        $checkin = Session::get('checkin');
        $checkout = Session::get('checkout');
        $hotelReservation->check_in_date = $checkin;
        $hotelReservation->check_out_date = $checkout;
        $hotelReservation->is_booked = true;
        $hotelReservation->reservation_cost = $room->night_price;
        $hotelReservation->save();
        $user->credit = $request->input('credit');
        $user->credit_number = $request->input('credit_number');
        $user->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function showUserReservations()
    {
        $user = Auth::user();

        $user_reservation = User::where('id', $user->id)
            ->with('hotel_reservation')
            ->with('flight_reservation')
            ->get();
        // return $user_reservation;
        $hotel_reservation_data = [];
        $flight_reservation_data = [];
        $allData = [];
        $hotel = [];
        $flight = [];
        foreach ($user_reservation as $value) {
            foreach ($value->hotel_reservation as $hotelReserv) {
                $hotel['hotel_reservation_id'] = $hotelReserv->id;
                $hotel['hotel_id'] = $hotelReserv->hotel_id;
                $hotel['hotel'] = $hotelReserv->hotel->name;
                $hotel['room_type'] = $hotelReserv->room->room_type->name;
                $hotel['room_details'] = $hotelReserv->room->details;
                $hotel['night_price'] = $hotelReserv->reservation_cost;
                $hotel['customers_count'] = $hotelReserv->room->customers_count;
                array_push($hotel_reservation_data, $hotel);
            }
            $allData['hotelReservation'] = $hotel_reservation_data;
            foreach ($value->flight_reservation as $flightReserv) {
                $flight['flight_reservation_id'] = $flightReserv->id;
                $flight['flight_id'] = $flightReserv->flight_id;
                $flight['source_city'] = $flightReserv->flight->source_city->name;
                $flight['destination_city'] = $flightReserv->flight->destination_city->name;
                $flight['date'] = $flightReserv->flight->date;
                $flight['time'] = $flightReserv->flight->time;
                $flight['flight_degree'] = $flightReserv->flight_degree->name;
                array_push($flight_reservation_data, $flight);
            }
            $allData['flightReservation'] = $flight_reservation_data;
        }
        //return $allData;
        return view('Web.reservations.userReservation', compact('user', 'allData'));
    }

    public function deleteHotelReservation($hotelReservationid)
    {
        $hotelReservation = HotelReservation::find($hotelReservationid);

        $roomId = $hotelReservation->room_id;

        $room = HotelRoom::where('id', $roomId)->first();

        $room->is_available = true;
        $room->save();
        $hotelReservation->delete();

        return redirect()->back();
    }

    public function deleteFlightReservation($flightReservationid)
    {
        $flightReservation = FlightReservation::find($flightReservationid);

        $flightReservation->delete();

        return redirect()->back();
    }
}
