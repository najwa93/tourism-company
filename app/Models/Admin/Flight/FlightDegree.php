<?php

namespace App\Models\Admin\Flight;

use App\Models\Admin\Offer\Offer;
use Illuminate\Database\Eloquent\Model;

class FlightDegree extends Model
{
    public function offer(){
        return $this->hasMany(Offer::class);
}
}
