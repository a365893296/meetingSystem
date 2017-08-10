<?php

namespace App\Http\Controllers\Meeting;

use App\Models\dept;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeptController extends Controller
{
    public function getDept()
    {
        $depts = dept::all();

        $data = null;
        for ($i = 0; $i < count($depts); $i++) {
            if ($depts[$i]['parent_id']) {
                //如果parent_id != null
                //就用array_push 拼接到对应parent_id的部门

                //parent_id 对应array
                $parent = $depts[$i]['parent_id'] - 1;
                array_push($data[$parent]['children'], ['id' => $i + 1, 'name' => $depts[$i]['name']]);
            } else {
                $data[$i]['id'] = $depts[$i]['id'];
                $data[$i]['name'] = $depts[$i]['name'];
                $data[$i]['children'] = array();
            }
        }

        return response()->json([
            'status' => 'success',
            'status_code' => '200',
            'dept' => $data
        ]);

    }

    public function formatDept()
    {

        /*todo 对多级子类的处理
            完成后，在getDept调用该方法
        */

        $depts = dept::all();

        $data = null;
//        return  $depts[1]->name;
        for ($i = 0; $i < count($depts); $i++) {
            if ($depts[$i]['parent_id']) {
                //如果parent_id != null
                //就用array_push 拼接到对应parent_id的部门
                $parent = $depts[$i]['parent_id'];
                if (!isset($data[$parent - 1]['children'])) {
                    if (isset($data[$parent - 1]['parent_id'])) {
                        $children = array();
                        array_push($data[$parent - 1]['children'], $children);
                    } else {
                        $data[$parent - 1]['children'] = array();
                    }
                }
                array_push($data[$parent - 1]['children'], ['id' => $i + 1, 'name' => $depts[$i]['name']]);
            } else {
                $data[$i]['id'] = $depts[$i]['id'];
                $data[$i]['name'] = $depts[$i]['name'];
                $data[$i]['children'] = array();
            }
        }

//        dd($data);

        return response()->json([
            'status' => 'success',
            'status_code' => '200',
            'dept' => $data
        ]);
    }
}
