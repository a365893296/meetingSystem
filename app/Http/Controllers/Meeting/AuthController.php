<?php

namespace App\Http\Controllers\Meeting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'username' => 'required|min:6',
            'name' => 'required',
            'password' => 'required'
        ]);

//        if (!$flag) {
//            return response()->json([
//                'status' => 'failed',
//                'status_code' => 403,
//                'isregist' => false
//            ]);
//        }

        Auth::create([
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'phone' => $request->get('phone'),
            'name' => $request->get('name')
        ]);

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
        if(Auth::check()){
            Auth::logout() ;
        }

        return redirect('/') ;
    }
}
