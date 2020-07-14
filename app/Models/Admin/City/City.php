<?php

namespace App\Models\Admin\City;

use App\Models\Admin\Country\Country;
use App\Models\Admin\Flight\Flight;
use App\Models\Admin\Hotel\Hotel;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function cityImage(){
        return $this->hasMany(City::class);
    }

    public function hotel(){
        return $this->hasMany(Hotel::class);
    }

    public function flight(){
        return $this->hasMany(Flight::class);
    }

}
