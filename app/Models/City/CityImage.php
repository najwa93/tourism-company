<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;

class CityImage extends Model
{
    public function city(){
        return $this->hasMany(City::class);
    }
}
