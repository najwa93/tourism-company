<?php

namespace App\Models\Admin\Flight;

use App\Models\Admin\City\City;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function flight_company(){
        return $this->belongsTo(FlightCompany::class,'flight_company_id');
    }

    public function source_city(){
        return $this->belongsTo(City::class,'source_city_id');
    }

    public function destination_city(){
        return $this->belongsTo(City::class,'destination_city_id');
    }
}
