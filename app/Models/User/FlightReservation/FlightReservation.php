<?php

namespace App\Models\User\FlightReservation;

use App\User;
use Illuminate\Database\Eloquent\Model;

class FlightReservation extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

}
