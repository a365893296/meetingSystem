<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class meeting extends Model
{
    protected $table = "meetings";
    protected $primaryKey = "id";

    public function hasOneRoom()
    {
        return $this->hasOne('App\Models\Room', 'room_id', 'id');
    }

}
