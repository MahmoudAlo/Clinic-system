<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [UserController::class, 'logout']);
    Route::middleware('role:admin')->group(function () {
        Route::apiResource('user', UserController::class);
        Route::apiResource('patient', PatientController::class);
    });
    Route::middleware('role:doctor')->group(function () {
        Route::apiResource('record', RecordController::class);
    });
    Route::middleware('role:reception')->group(function () {
        Route::apiResource('appointment', AppointmentController::class);
        Route::apiResource('patient', PatientController::class);
    });

});
