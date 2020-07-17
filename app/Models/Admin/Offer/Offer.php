<?php

namespace App\Models\Admin\Offer;

use App\Models\Admin\Flight\Flight;
use App\Models\Admin\Flight\FlightDegree;
use App\Models\Admin\Hotel\Hotel;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

     public $timestamps = false;
    public function flight(){
        return $this->belongsTo(Flight::class,'flight_id');
    }

    public function returned_flight(){
        return $this->belongsTo(Flight::class,'returned_flight_id');
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function flight_degree(){
        return $this->belongsTo(FlightDegree::class);
    }

    /*public function source_city(){
        return $this->belongsTo(City::class,'source_city_id');
    }

    public function destination_city(){
        return $this->belongsTo(City::class,'destination_city_id');
    }

    public function source_country(){
        return $this->belongsTo(Country::class,'source_country_id');
    }

    public function destination_country(){
        return $this->belongsTo(City::class,'destination_country_id');
    }*/

}
