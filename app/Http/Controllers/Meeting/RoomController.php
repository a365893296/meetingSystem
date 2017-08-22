<?php

namespace App\Http\Controllers\Meeting;

use App\Models\Meeting;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    //获取空的会议室
    public function getEmptyRooms(Request $request)
    {
        if ($request->has('meeting_time')) {
            $meeting_time = $request->get('meeting_time');
        }
        if ($request->has('duration')) {
            $duration = $request->get('duration');
        }

        //取出当天到选择的会议结束时间前的会议数据
        $start = date('Y-m-d', strtotime($meeting_time));
        $end = date('Y-m-d H:i:s', strtotime($meeting_time) + $duration * 60);
        $meetings = Meeting::whereBetween('begin_time', [$start, $end])->get();

        $fullRooms = array();
        $meetingBegin = strtotime($meeting_time);
        $meetingEnd = strtotime($end);

        foreach ($meetings as $meeting) {
            $begintime = strtotime($meeting['begin_time']);
            $endtime = strtotime($meeting['begin_time']) + $meeting['duration'] * 60;
            //如果开始时间或者结束时间在选择的区间内 则将room_id加入$fullRooms
            if (($endtime >= $meetingBegin && $endtime <= $meetingEnd) || ($begintime >= $meetingBegin && $begintime <= $meetingEnd)) {
                array_push($fullRooms, $meeting['room_id']);
            }
        }

        $emptyRoom = Room::whereNotIn('id', $fullRooms)->get();

        return response()->json([
            'status' => 'success',
            'status_code' => '200',
            'emptyRooms' => $emptyRoom,
        ]);
    }
}
