<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function store(Request $request)
    {
         // If validation fails, return a detailed error message
         $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Validation failed'], 422);
        }

        // Extract credentials from the request
        $credentials = $request->only('email', 'password');

        // Attempt to login using JWTAuth
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid email or password',], 401);
        }

        // Return a successful response with the user data and JWT token
        return response()->json(['success' => true,'message' => 'Login successful','data' => ['user' => Auth::user(),'token' => $token,],]);
    }
}
