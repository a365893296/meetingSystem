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

//        return response()->json($request->all());
        $meetings = new Meeting();

        $data = $request->get('data');
        $currentPage = $request->get('currentPage');
        $pageSize = $request->get('pageSize');

        if ($data['topic'] != '') {
            $meetings = $meetings->where('topic', 'like', '%' . $data['topic'] . '%');
        }
        if ($data['meeting_time'] != null) {
            $meetings = $meetings->whereBetween('begin_time', [$data['meeting_time'][0], $data['meeting_time'][1]]);
        }
        if ($data['meeting_level'] != 'all' && $data['meeting_level'] != null) {
            $meetings = $meetings->where('level', $data['meeting_level']);
        }
        if ($data['meeting_state'] != 'all' && $data['meeting_state'] != null) {
            $meetings = $meetings->where('state', $data['meeting_state']);
        }
        if ($data['meeting_feature'] != 'all' && $data['meeting_feature'] != null) {
            $meetings = $meetings->where('feature', $data['meeting_feature']);
        }
        $total = $meetings->count();
        if ($currentPage > 1) {
            $meetings = $meetings->skip(($currentPage - 1) * $pageSize);
        }
        $meetings = $meetings->take($pageSize)->get();

        return response()->json([
            'status' => 'success',
            'status_code' => '200',
            'total' => $total,
            'meetings' => array_map(function ($meeting) {
                return [
                    'topic' => $meeting['topic'],
                    'duration' => $meeting['duration'],
                    'site' => $meeting['host'],
                    'feature' => $meeting['feature'],
//                    'content' => $meeting['contents'],
                    'master' => $meeting['master'],
                    'host' => $meeting['host'],
                    'date' => date('Y-m-d', strtotime($meeting['begin_time'])),
                    'time' => date('H:i:s', strtotime($meeting['begin_time'])),
                ];
            }, $meetings->toArray())
        ]);

    }

    public function createMeeting(Request $request)
    {
        //todo 
        $request->all();
        dd($request->all());
    }


}
