<?php

namespace App\Http\Controllers\Admin\Hotel;

use App\Models\Admin\Hotel\Hotel;
use App\Models\Admin\Hotel\HotelRoom;
use App\Models\Admin\Hotel\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return view('Admin.HotelsManagement.show');
    }

    // get cities with related country
    public function getRoom($hotel_id)
    {
        $hotel = Hotel::findOrfail($hotel_id);

        $roomTypes = RoomType::all();

        return view('Admin.HotelsManagement.RoomManagement.Add',compact(['hotel','roomTypes']));
    }

    // get cities wuth related country
    public function storeRoom(Request $request, $hotel_id)
    {
        $hotel = Hotel::findOrfail($hotel_id);
        $hotelRoom = new HotelRoom();
        $hotelRoom->room_type_id = $request->type;
       // return $hotelRoom;
        $hotelRoom->hotel_id = $hotel->id;
        $hotelRoom->customers_count = $request->input('custcount');
        $hotelRoom->details = $request->input('about');
        $hotelRoom->name = $request->input('name');
        $hotelRoom->night_price = $request->input('price');
        $hotelRoom->is_available = $request->input('available')?true:false;
        $hotelRoom->save();

        return redirect()->route('Hotels.show', $hotel->id);

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
    public function edit($room_id)
    {
        $hotelRoom = HotelRoom::where('id',$room_id)
        ->with('room_type')
            ->first();
        $hotel_id = Hotel::where('id',$hotelRoom->hotel_id)->first();
        $roomTypes = RoomType::all();
        //return $room->room_type->name;
        return view('Admin.HotelsManagement.RoomManagement.Update',compact(['hotelRoom','roomTypes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $room_id)
    {
        $hotelRoom = HotelRoom::findOrfail($room_id);
        $hotel = Hotel::where('id', $hotelRoom->hotel_id)->first();
        $hotel->room_type_id = $request->type;
        // return $hotelRoom;
        $hotelRoom->hotel_id = $hotel->id;
        $hotelRoom->customers_count = $request->input('custcount');
        $hotelRoom->details = $request->input('about');
        $hotelRoom->name = $request->input('name');
        $hotelRoom->night_price = $request->input('price');
        $hotelRoom->is_available = $request->input('available')?true:false;
        $hotelRoom->save();

        return redirect()->route('Hotels.show', $hotel->id);
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
