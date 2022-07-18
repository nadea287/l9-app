<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authenticate\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json([
               'data' => 'invalid credentials'
            ]);
        }

        //create access token is success
        $accessToken = Auth::user()->createToken('access_token')->accessToken;

        return response()->json([
           'token' => $accessToken,
           'user' => Auth::user()
        ]);
    }
}
