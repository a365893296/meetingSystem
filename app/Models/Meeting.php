<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = "meetings";
    protected $primaryKey = "id";

    public function room()
    {
        return $this->hasOne('App\Models\Room', 'id', 'room_id');
    }

}
