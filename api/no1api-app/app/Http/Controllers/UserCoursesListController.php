<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserCoursesListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $courses = DB::table('courses')
        ->join('user_courses', 'courses.id',  '=', 'user_courses.course_id')
        ->select('courses.name', 'courses.description', 'courses.lections', 'courses.estimatedTime')
        ->where('user_courses.user_id', $id)
        ->get();

        return $courses;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
