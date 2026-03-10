<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);
Route::put('/students/{nim}', [StudentController::class, 'update']);
Route::patch('/students/{nim}', [StudentController::class, 'update']);
Route::delete('/students/{nim}', [StudentController::class, 'destroy']);