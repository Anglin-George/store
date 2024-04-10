<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'User created successfully',
            'token'    => $user->createToken('access')->accessToken,
            'user'     => $user
        ]);        
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->input('email'))->first();
        if(!Hash::check(request('password'), optional($user)->password)){
            return response()->json([
                'status' => 401,
                'message' => 'Invalid email or password',
            ]);
        }
        return response()->json([
            'status' => 200,
            'message' => 'User logged in successfully',
            'token'    => $user->createToken('access')->accessToken,
            'user'     => $user
        ]); 
    }
}
