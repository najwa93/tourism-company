<?php

namespace App\Models\Admin\Hotel;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    protected $fillable = ['room_type_id'];
    public function Hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function roomType(){
        return $this->belongsTo(RoomType::class,'room_type_id');
    }
}
