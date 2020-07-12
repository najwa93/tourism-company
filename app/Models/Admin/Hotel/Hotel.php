<?php

namespace App\Models\Admin\Hotel;

use App\Models\Admin\City\City;
use App\Models\Admin\Country\Country;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

    protected $fillable = ['name','stars','country_id','city_id','phone_number','email','details','location'];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function hotelImage(){
        return $this->hasMany(HotelImage::class);
    }

    public function hotelRoom(){
        return $this->hasMany(HotelRoom::class);
    }

}
