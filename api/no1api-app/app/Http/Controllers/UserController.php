<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $fields = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'callName' => 'required|string|unique:users,callName',
            'email' => 'required|string|unique:users,email',
            'adress' => 'required|string',
            'zipcode_id' => 'required|integer',
            'phone' => 'required|string',
            'role_id' => 'required|integer',
            'birthDate' => 'required|string',
            'picturePath' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);


        $user = User::create([
            'firstName' => $fields['firstName'],
            'lastName' => $fields['lastName'],
            'callName' =>$fields['callName'],
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
            'userid' => $user->id,
            'firstname' => $user->firstName,
            'lastname' => $user->lastName,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout() {
        $this->user()->tokens->each(function($token, $key) {
            $token->delete();
        });
    
        return response()->json('Successfully logged out');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::find($id);
    }


    public function getUser(string $email) 
    {
        return User::where('email', '=' , $email )->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->User::update([
            'firstName' => "anonym",
            'lastName' => "anonym",
            'email' => "anonym" . $id,
            'adress' => "anonym",
            'phone' => "anonym",
            'picturePath' => "anonym"
            
        ]);

       // return User::destroy($id);
    }
}
