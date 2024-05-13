<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Client::with(['orders', 'orders.dishes'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $client = new Client($request->all());
        $client->save();
        
        return response()->json([
            "message" => "Succesfully Stored"
        ]);
    } 

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $client->load(['orders', 'orders.dishes']);
        return $client;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client->fill($request->all());
        $client->save();

        return response()->json([
            "message" => "Succesfully Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client1 = Client::find($client->id);
        
        $client1->delete();

        return response()->json([
            "message" => "Succesfully Deleted"
        ]);
    }
}
