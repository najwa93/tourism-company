<?php

namespace App\Models\User;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user(){
        return $this->belongsToMany(User::class,'role_user');
    }
}
