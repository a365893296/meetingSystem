<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'meetingrooms';
    protected $primaryKey = "id";
    public $timestamps = false ;

    public function belongsToMeeting()
    {
        return $this->belongsTo('App\Models\Meeting','meeting_id','id');
    }
}
