<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthContoller extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'adress' => 'required|string',
            'zipcode_id' => 'required|numeric',
            'phone' => 'required|string',
            'role_id' => 'required|numeric',
            'birthDate' => 'required|date',
            'picturePath' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'firstName' => $fields['firstName'],
            'lastName' => $fields['lastName'],
            'email' => $fields['email'],
            'adress' => $fields['adress'],
            'zipcode_id' => $fields['zipcode_id'],
            'phone' => $fields['phone'],
            'role_id' => $fields['role_id'],
            'birthDate' => $fields['birthDate'],
            'picturePath' => $fields['picturePath'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        // Skal ses på pga gpdr
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}
