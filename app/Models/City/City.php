<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function cityImage(){
        return $this->hasMany(CityImage::class);
    }
}
