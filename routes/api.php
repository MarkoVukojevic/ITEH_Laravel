<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ProcessorController;
use App\Http\Controllers\ProcessorSmartphoneController;
use App\Http\Controllers\SmartphoneController;
use App\Http\Controllers\ManufacturerController;
use App\Models\Processor;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::resource('manufacturers', ManufacturerController::class)->only(['update', 'store', 'destroy']);
    Route::resource('processors', ProcessorController::class)->only(['store', 'destroy']);
    Route::resource('smartphones', SmartphoneController::class)->only(['destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('manufacturers', ManufacturerController::class)->only(['index', 'show']);
Route::resource('processors', ProcessorController::class)->only(['index', 'show']);
Route::resource('smartphones', SmartphoneController::class)->only(['index', 'show']);
Route::resource('processors.smartphones', ProcessorSmartphoneController::class)->only(['index']);