<?php

namespace App\Models\User\HotelReservation;

use App\Models\Admin\Offer\Offer;
use App\User;
use Illuminate\Database\Eloquent\Model;

class HotelReservation extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function offer(){
        return $this->belongsTo(Offer::class);
    }
}
