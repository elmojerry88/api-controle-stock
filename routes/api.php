<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('/', 'index');
    Route::post('/update/{id}', 'update');
    Route::post('/create','store');
    Route::delete('/delete', 'destroy');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware(['auth:sanctum']);
});




