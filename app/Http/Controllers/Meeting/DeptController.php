<?php

namespace App\Http\Controllers\Meeting;

use App\Models\dept;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeptController extends Controller
{
    public function getDept()
    {
//        return  response()->json([
//           'dads' => 'dasd'
//        ]);
//        dump(dept::all());
        $depts = dept::all();

        $data = null;
//        return  $depts[1]->name;
        for ($i = 0; $i < count($depts); $i++) {

            $data[$i]['id'] = $depts[$i]['id'];
            $data[$i]['name'] = $depts[$i]['name'];
            $data[$i]['children'] = array();
            if ($depts[$i]['parent_id']) {
                $parent = $depts[$i]['parent_id'];
//                  $data[$parent]['children'] = array() ;
                array_push($data[$parent]['children'], $i);
            }
        }
//        dd($data);
        //todo 返回数据后，children的处理
        return response()->json([
            'status' => 'success',
            'status_code' => '200',
            'dept' => $data
        ]);
    }
}
