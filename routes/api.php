<?php

use App\Http\Controllers\ViaggioController;
use App\Http\Controllers\PaeseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/paesi', [PaeseController::class, 'index']);      
Route::post('/paesi', [PaeseController::class, 'store']);     
Route::put('/paesi/{id}', [PaeseController::class, 'update']); 
Route::delete('/paesi/{id}', [PaeseController::class, 'destroy']); 


Route::get('/viaggi', [ViaggioController::class, 'index']);
Route::post('/viaggi', [ViaggioController::class, 'store']);
Route::put('/viaggi/{id}', [ViaggioController::class, 'update']);
Route::delete('/viaggi/{id}', [ViaggioController::class, 'destroy']);