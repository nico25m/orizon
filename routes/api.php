<?php

use App\Http\Controllers\viaggiController;
use App\Http\Controllers\paesiController;
use App\Http\Controllers\viaggi_paesiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/paesi',[paesiController::class, 'index']);
Route::post('/paesi',[paesiController::class,'store']);
Route::put('/paesi/{id}',[paesiController::class,'update']);
Route::delete('/paesi/{id}',[paesiController::class,'destroy']);

Route::get('/viaggi',[viaggiController::class, 'index']);
Route::post('/viaggi',[viaggiController::class,'store']);
Route::put('/viaggi/{id}',[viaggiController::class,'update']);
Route::delete('/viaggi/{id}',[viaggiController::class,'destroy']);

Route::get('/viaggi_paesi',[viaggi_paesiController::class, 'index']);
