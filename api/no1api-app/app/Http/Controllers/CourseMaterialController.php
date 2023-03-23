<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;

class CourseMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CourseMaterial::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'materialPath' => 'required'
        ]);
        
        return CourseMaterial::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CourseMaterial::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $courseMaterial = CourseMaterial::find($id);
        $courseMaterial->update($request->all());
        return $courseMaterial;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return CourseMaterial::destroy($id);
    }
}
