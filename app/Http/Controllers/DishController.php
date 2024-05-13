<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Dish::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dish = new Dish($request->all());
        $dish->save();

        return response()->json([
            "message" => "Succesfully Stored"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        $dish->load(['order']);
        return $dish;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $dish->fill($request->all());
        $dish->save();

        return response()->json([
            "message" => "Succesfully Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish1 = Dish::find($dish->id);
        
        $dish1->delete();

        return response()->json([
            "message" => "Succesfully Deleted"
        ]);
    }
}
