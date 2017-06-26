<?php

namespace App\Http\Controllers\Meeting;

use App\Models\Meeting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * Class MeetingController
 * @package App\Http\Controllers\Meeting
 */
class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    //
    public function getTableData(Request $request){
        $meetings = Meeting::all() ;
        return response()->json($meetings)->setStatusCode(200);

    }

}
