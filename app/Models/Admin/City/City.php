<?php

namespace App\Models\City;

use App\Models\Admin\Hotel\Hotel;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function cityImage(){
        return $this->hasMany(CityImage::class);
    }

    public function hotel(){
        return $this->hasMany(Hotel::class);
    }
}
