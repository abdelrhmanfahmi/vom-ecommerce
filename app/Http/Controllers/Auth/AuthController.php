<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(LoginRequest $request)
    {
        try{
            $credentials = $request->only('email', 'password');
            $token = Auth::attempt($credentials);

            //check valid token
            if (!$token) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized',
                ], 401);
            }

            //check if this credentials belongs to this user type
            if (Auth::user()->type != Request()->type) {
                auth()->logout();
                return response()->json(['message' => 'Unauthorized']);
            }

            //success logged in
            $user = Auth::user();

            return response()->json([
                'status' => 'success',
                'user' => $user,
                'token' => $token
            ] , 200);
        }catch(\Exception $e){
            return $e;
        }
    }

    public function logout()
    {
        try{
            Auth::logout();
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully logged out',
            ]);
        }catch(\Exception $e){
            return $e;
        }
    }
}
