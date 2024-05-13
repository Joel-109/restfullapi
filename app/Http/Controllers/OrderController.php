<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::with(['dishes'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order($request->all());
        $order->save();


        $options = collect([]);
        foreach($request->dish_id as $dish){
            if(!$options->contains($dish)){
                $quantity=0;
                foreach($request->dish_id as $dish2){
                    if($dish == $dish2){
                        $quantity+=1;
                    }
                }
                $order->dishes()->attach($dish,['quantity' => $quantity]);
                $options->push($dish);
            }
        }


        return response()->json([
            "message" => "Succesfully Stored"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load(['client', 'dishes']);
        return $order;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->fill($request->all());
        $order->save();

        $dish_id =  $request->input('dish_id');
        $order->dishes()->attach($dish_id);


        return response()->json([
            "message" => "Succesfully Updated"
        ]);
    }
/*
$character->fill($request->all());
        $character->save();

        $skill_id = $request->input('skill_id');
        $character->skills()->attach($skill_id, ['level' => 1]);*/ 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {   
        $order1 = Order::find($order->id);
        
        $order1->delete();

        return response()->json([
            "message" => "Succesfully Deleted"
        ]);
    }

    private function filterDishes($array){
        $filter = [];
        //foreach ($array as $dish_general){
       //
    }
}
