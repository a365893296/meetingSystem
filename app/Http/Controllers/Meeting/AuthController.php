<?php

namespace App\Http\Controllers\Meeting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
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
        return response()->json(['user'=>$user]);

    }
}
