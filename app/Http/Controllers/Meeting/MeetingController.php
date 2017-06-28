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

    //    "topic": "",
    //    "meeting_time": "",
    //    "meeting_level": "all",
    //    "meeting_state": "all",
    //    "meeting_feature": "all"


        $meetings = Meeting::where([['id', '>', 1],])->get();
        $data = $request->get('data');
//        return response()->json($data);
        $currentPage = $request->get('currentPage');
        if ($data['topic'] != '') {
            $where['topic'] = $data['topic'];
        }
        if ($data['meeting_time'] != null) {
            $where['begin_time'] = $data['meeting_time'][0];
            $where['last_time'] = $data['meeting_time'][1];
        }
        if ($data['meeting_level'] != 'all') {
            $where['level'] = $data['meeting_level'];
        }
        if ($data['meeting_state'] != 'all') {
            $where['state'] = $data['meeting_state'];
        }
        if ($data['meeting_feature'] != 'all') {
            $where['feature'] = $data['meeting_feature'];
        }

//        dd($where);
        //        $where['topic'] = ($data['topic']!='') ? $data['topic'] : 0;

        return response()->json([
            'data' =>  $where ,
//            'curretPage' => $currentPage
        ]);

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
