<?php

namespace App\Models\User\HotelReservation;

use App\Models\Admin\Hotel\Hotel;
use App\Models\Admin\Hotel\HotelRoom;
use App\Models\Admin\Offer\Offer;
use App\User;
use Illuminate\Database\Eloquent\Model;

class HotelReservation extends Model
{
    public function getReservationCostAttribute($reservationCost)
    {
       // return str_replace('.', ',', $reservationCost);
        return number_format($reservationCost);
    }

    public function setReservationCostAttribute($reservationCost)
    {
       // $this->attributes['reservation_cost'] = str_replace(',', '.', $reservationCost);
        $this->attributes['reservation_cost'] = str_replace(',', '.', $reservationCost);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function offer(){
        return $this->belongsTo(Offer::class);
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function room(){
        return $this->belongsTo(HotelRoom::class);
    }
}
