<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(\App\Http\Controllers\UserController::class)->prefix('user')->group(function () {
    Route::get('/', 'index');
    Route::put('/update/{id}', 'update');
    Route::post('/create','store');
    Route::delete('/delete/{id}', 'destroy');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware(['auth:sanctum']);
});

Route::controller(\App\Http\Controllers\EmployeeController::class)->prefix('employee')->group(function () {
    Route::get('/', 'index');
    Route::put('/update/{id}', 'update');
    Route::post('/create','store');
    Route::delete('/delete/{id}', 'destroy');
    Route::get('/{id}', 'show');
});

Route::controller(\App\Http\Controllers\EquipmentController::class)->prefix('equipment')->group(function () {
    Route::get('/', 'index');
    Route::put('/update/{id}', 'update');
    Route::post('/create','store');
    Route::delete('/delete/{id}', 'destroy');
});

Route::controller(\App\Http\Controllers\VehicleController::class)->prefix('vehicle')->group(function () {
    Route::get('/', 'index');
    Route::put('/update/{id}', 'update');
    Route::post('/create','store');
    Route::delete('/delete/{id}', 'destroy');
});

Route::controller(\App\Http\Controllers\DeliveriesEquipmentController::class)->prefix('delivery/equipment')->group(function () {
    Route::get('/', 'index');
    Route::put('/deliver', 'deliver');
    Route::post('/return','deliverReturn');
});

Route::controller(\App\Http\Controllers\DeliveriesVehicleController::class)->prefix('delivery/vehicle')->group(function () {
    Route::get('/', 'index');
    Route::put('/deliver', 'deliver');
    Route::post('/return','deliverReturn');
});



