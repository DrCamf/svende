<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserTutor;

class UserTutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserTutor::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tutor_id' => 'required',
            'user_id' => 'required',
          
        ]);
        
        return UserTutor::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return UserTutor::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userTutor = UserTutor::find($id);
        $userTutor->update($request->all());
        return $userTutor;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return UserTutor::destroy($id);
    }
}
