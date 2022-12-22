<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CountryController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/send_code', [AuthController::class, 'send_code']);
Route::post('/confirm_code/{id}', [AuthController::class, 'confirm_code']);
Route::post('password_reset', [AuthController::class, 'password_reset']);

Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/editData', [AuthController::class, 'editData']);
    Route::post('/change_password', [AuthController::class, 'change_password']);
});

Route::get('/countries', [CountryController::class, 'index']);
