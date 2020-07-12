<?php

namespace App\Models\Admin\Hotel;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    public function hotelRoom(){
        return $this->hasMany(HotelRoom::class);
    }
}
