<?php

namespace App\Models\Admin\Hotel;

use App\Models\City\City;
use App\Models\Country\Country;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function city(){
        return $this->belongsTo(City::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function hotelImage(){
        return $this->hasMany(HotelImage::class);
    }

}
