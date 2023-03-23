<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TutoringMaterial;


class TutoringMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TutoringMaterial::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tutor_id' => 'required',
            'materialPath' => 'required'
        ]);
        
        return TutoringMaterial::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return TutoringMaterial::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tutoringMaterial = TutoringMaterial::find($id);
        $tutoringMaterial->update($request->all());
        return $tutoringMaterial;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return TutoringMaterial::destroy($id);
    }
}
