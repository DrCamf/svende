<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCourseMaterial;

class UserCourseMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserCourseMaterial::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
            'materialPath' => 'required'
        ]);
        return UserCourseMaterial::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return UserCourseMaterial::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userCourseMaterial = UserCourseMaterial::find($id);
        $userCourseMaterial->update($request->all());
        return $userCourseMaterial;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return UserCourseMaterial::destroy($id);
    }
}
