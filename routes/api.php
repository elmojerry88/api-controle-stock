<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReceiveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::prefix('weapon')->group(function () {
    Route::get('/', [WeaponController::class, 'index']);
    Route::post('/store', [WeaponController::class, 'store']);
    // Route::get('/show/{id}', [WeaponController::class, 'show']);
    // Route::delete('/delete/{id}', [WeaponController::class, 'destroy'] );
    Route::get('/count', [WeaponController::class, 'countWeapons']);
    Route::get('/sum', [WeaponController::class, 'sum']);
    //Route::patch('/update/{id}', [WeaponController::class, 'update']);
});


Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/store', [UserController::class, 'store']);
    // Route::get('/show/{id}', [UserController::class, 'show']);
    // Route::delete('/delete/{id}', [UserController::class, 'destroy'] );
    Route::get('/count', [UserController::class, 'countUsers']);
    //Route::patch('/update/{id}', [WeaponController::class, 'update']);
});





Route::prefix('officer')->group(function () {
    Route::get('/', [OfficerController::class, 'index']);
    Route::post('/store', [OfficerController::class, 'store']);
    // Route::get('/show/{id}', [OfficerController::class, 'show']);
    // Route::delete('/delete/{id}', [OfficerController::class, 'destroy'] );
    Route::get('/count', [OfficerController::class, 'countOfficers']);
    //Route::patch('/update/{id}', [OfficerController::class, 'update']);
});

Route::prefix('receive')->group(function () {
    Route::get('/', [ReceiveController::class, 'index']);
    Route::post('/store', [ReceiveController::class, 'store']);
    // Route::get('/show/{id}', [ReceiveController::class, 'show']);
    // Route::delete('/delete/{id}', [ReceiveController::class, 'destroy'] );
    Route::get('/count', [ReceiveController::class, 'countReceives']);
   // Route::patch('/update/{id}', [ReceiveController::class, 'update']);
});

Route::prefix('leave')->group(function () {
    Route::get('/', [LeaveController::class, 'index']);
    Route::post('/store', [LeaveController::class, 'store']);
    // Route::get('/show/{id}', [LeaveController::class, 'show']);
    // Route::delete('/delete/{id}', [LeaveController::class, 'destroy'] );
    Route::get('/count', [LeaveController::class, 'countLeaves']);
   // Route::patch('/update/{id}', [LeaveController::class, 'update']);
});


Route::prefix('register')->group(function () {
    Route::get('/', [RegisterController::class, 'index']);
    //Route::post('/store', [RegisterController::class, 'store']);
    // Route::get('/show/{id}', [LeaveController::class, 'show']);
    // Route::delete('/delete/{id}', [LeaveController::class, 'destroy'] );
    //Route::get('/count', [RegisterController::class, 'countLeaves']);
   // Route::patch('/update/{id}', [LeaveController::class, 'update']);
});