<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DishController;

//Clients
Route::apiResource('/client', ClientController::class);
//Orders
Route::apiResource('/order', OrderController::class);
//Dishes
Route::apiResource('/dish', DishController::class);
