<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8',
            ]);
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            
            $token = $user->createToken('RegisterToken');
            $accessToken = $token->accessToken['token'];
        return response()->json([
                'token' => $accessToken,
                'user' => $user,
                'message' => 'User created Successfully'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status' => 401,
                'message' => $e->getMessage()
            ], 401);
        }
    }

    public function login(Request $request)
    {
        // Validate the incoming request data
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $data = [
                'email' => $request->email,
                'password' => $request->password
            ];


            if (auth()->attempt($data)) {

                $user = auth()->user();
                $token = $user->createToken('RegisterToken');
                $accessToken = $token->accessToken['token'];

                return response()->json([
                    'token' => $accessToken,
                    'user_id' => $user->id,
                    'user_email' => $user->email,
                    'user_Name' => $user->name,
                    'message' => 'Login Successfully'
                ], 200);
            } else {
                return response()->json([
                    'error' => 'Unauthorized Credentials'
                ], 401);
            }

        } catch (Exception $e) {
            return response()->json([
                'status' => 401,
                'message' => $e->getMessage()
            ], 401);
        }

    }
}
