<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCourse;
use Illuminate\Support\Facades\DB;

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
            'user_id' => 'required'
        ]);
        
        return UserCourse::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usercourses = DB::table('user_courses')
        ->join('users', 'users.id',  '=', 'user_courses.user_id')
        ->join('courses', 'courses.id',  '=', 'user_courses.course_id')
        ->join('roles', 'roles.id',  '=', 'users.role_id')
        ->select('courses.name', 'users.firstName', 'users.lastName')
        ->where('roles.id', '=', '1')
        ->where('user_courses.course_id', '=', $id)
        ->get();


        return $usercourses;
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
