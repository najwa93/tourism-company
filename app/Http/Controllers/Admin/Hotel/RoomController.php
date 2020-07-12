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
        $hotelRoom->is_available = $request->input('available');
        $hotelRoom->save();

       // return redirect()->route('Hotels.show', $hotel->id);
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
