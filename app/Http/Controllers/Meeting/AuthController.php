<?php

namespace App\Http\Controllers\Meeting;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthController
 * @package App\Http\Controllers\Meeting
 */
class AuthController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $user = auth()->attempt(
            [
                'username' => $username,
                'password' => $password
            ], true);
//        dd($user);
        return response()->json(['islogin' => $user]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'bail|required|min:4',
            'phone' => 'bail|required',
            'password' => 'bail|required'
        ]);

        if (User::find(['username' => $request->get('username')])) {
            return response()->json([
                'status' => 'failed',
                'status_code' => '403',
                'isRegister' => false,
                'message' => '用户名已存在!'
            ]);
        }

        User::create([
            'username' => $request->get('username'),
            'phone' => $request->get('phone'),
            'password' => bcrypt($request->get('password')),
//            'name' => $request->get('name')
        ]);

        Auth::attempt(['username'=> $request->get('username'),'password'=>$request->get('password')]);
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'isRegister' => true
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return response()->json([
            'status' => 'success' ,
            'status_code' => '200' ,
            'isLogout' => 'true' ,
            'message' => 'exit'
        ]);
    }
}
