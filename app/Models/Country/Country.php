<?php

namespace App\Models\Country;

use App\Models\City\City;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function city(){
        return $this->hasMany(City::class);
    }
}
