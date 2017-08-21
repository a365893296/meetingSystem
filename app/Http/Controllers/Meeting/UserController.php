<?php

namespace App\Http\Controllers\Meeting;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //UserController 负责users表的数据获取等

    public function getUsers(Request $request)
    {
        if (!$request->has('id')) {
            return response()->json([
                'status' => 'failed',
                'message' => 'error -> getUsers'
            ]);
        }

        $id = $request->get('id');
        $users = User::where('dept_id', $id)->get();
        return response()->json([
            'status' => 'success',
            'status_code' => '200',
            'users' => $users
        ]);
    }
}
