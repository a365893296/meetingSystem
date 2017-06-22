<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    protected $table = 'meetingrooms';
    protected $primaryKey = "id";

    public function belongsToMeeting()
    {
        return $this->belongsTo('App\Models\Meeting','meeting_id','id');
    }
}
