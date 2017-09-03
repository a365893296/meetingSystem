<?php

namespace App\Http\Controllers\Meeting;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

/**
 * Class UserController
 * @package App\Http\Controllers\Meeting
 */
class UserController extends Controller
{
    //UserController 负责users表的数据获取等

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserInfo(Request $request)
    {
        try {
            if (Auth::check()) {
                return response()->json([
                    'status' => 'success',
                    'status_code' => '200',
                    'user' => $request->user(),
                ]);
            }
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'failed',
                'user' => null,
            ]);
        }


    }
}
