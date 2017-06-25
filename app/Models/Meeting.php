<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = "meetings";
    protected $primaryKey = "id";

    public function hasOneRoom()
    {
        return $this->hasOne('App\Models\Room', 'room_id', 'id');
    }

}
