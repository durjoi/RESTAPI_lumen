<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function register(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        
        $request['password'] = app('hash')->make($request->input('password'));

        try {

            $user = User::create($request->all());

            return response()->json([
                'user' => $user, 'message' => "Created"
            ], 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }
    }
}
