<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// code when study with with teacher yon
class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $credentail = $request->only('email', 'password');
        if (Auth::attempt($credentail)) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            return  response()->json(['message' => "Valid credentail", 'data' => $user, 'token' => $token], 200);
        }
        return response()->json(['message' => "Invalid credentail"], 401);
    }
}
