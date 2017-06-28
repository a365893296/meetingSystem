<?php

namespace App\Http\Controllers\Meeting;

use App\Models\Meeting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;


/**
 * Class MeetingController
 * @package App\Http\Controllers\Meeting
 */
class MeetingController extends Controller
{
    /**
     * MeetingController constructor.
     */
    public function __construct()
    {
//        $this->middleware('guest');
//        $this->middleware('auth') ;
    }

    //

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTableData(Request $request)
    {
//        $meetings = Meeting::all();
//        $meetings = Meeting::find(1);
//        if(Auth::check()){
//            return response()->json('auth is check');
//        }else{
//            return response()->json('xxxx');
//        }

//        return response()->json(['data'=> $meetings]);
//        return response()->json($request);
        $meetings = Meeting::where([['id', '>', 1],])->get();
        $data = $request->all() ;
        

        return response()->json($request) ;

        return response()->json([
            'status' => 'success',
            'status_code' => '200',
            'meetings' => array_map(function ($meeting) {
                return [
                    'topic' => $meeting['topic'],
                    'duration' => $meeting['duration'],
                    'site' => $meeting['host'],
                    'feature' => $meeting['feature'],
                    'content' => $meeting['contents'],
                    'master' => $meeting['master'],
                    'host' => $meeting['host'],
                    'date' => date('Y-m-d', strtotime($meeting['begin_time'])),
                    'time' => date('H:i:s', strtotime($meeting['begin_time'])),
                ];
            }, $meetings->toArray())
        ]);

    }

}
