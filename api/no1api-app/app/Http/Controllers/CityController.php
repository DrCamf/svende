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
        $city = new City;
        $request->validate([
            'zipcode' => 'required',
            'city' => 'required'
        ]);
        //return City::create($request->all());
        return response()->json(array('success' => true, 'last_insert_id' => $city->id), 200);
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

    public function search($name)
    {
        return City::where('city', 'like', '%'.$name.'%')->get();
    }

    public function searchzip($zipnr) 
    {
        return City::where('zipcode', '=', $zipnr)->get();
    }


}
