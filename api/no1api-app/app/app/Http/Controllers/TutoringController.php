<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutoring;

class TutoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tutoring::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titel' => 'required',
            'price' => 'required'
        ]);
        
        return Tutoring::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Tutoring::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tutoring = Tutoring::find($id);
        $tutoring->update($request->all());
        return $tutoring;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Tutoring::destroy($id);
    }
}
