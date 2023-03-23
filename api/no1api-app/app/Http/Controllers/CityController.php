<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return City::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'zipcode' => 'required',
            'city' => 'required'
        ]);
        return City::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return City::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $city = City::find($id);
        $city->update($request->all());
        return $city;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return City::destroy($id);
    }
}
