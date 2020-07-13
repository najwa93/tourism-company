<?php

namespace App\Models\Admin\Hotel;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    protected $fillable = ['room_type_id'];
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function room_type(){
        return $this->belongsTo(RoomType::class,'room_type_id');
    }
}
