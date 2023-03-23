<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCourse;

class UserCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserCourse::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'user_id' => 'required',
            'lectionsDone' => 'required'
        ]);
        
        return UserCourse::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return UserCourse::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userCourse = UserCourse::find($id);
        $userCourse->update($request->all());
        return $userCourse;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return UserCourse::destroy($id);
    }
}
