<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CatController;
use App\Http\Controllers\Api\ChanceController;
use App\Http\Controllers\Api\ClickController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\FavouriteController;
use App\Http\Controllers\Api\NotiController;
use App\Http\Controllers\Api\SettingController;
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

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/dashRegister', [AuthController::class, 'dashRegister']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/dashLogin', [AuthController::class, 'dashLogin']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/send_code', [AuthController::class, 'send_code']);
Route::post('/confirm_code/{id}', [AuthController::class, 'confirm_code']);
Route::post('password_reset', [AuthController::class, 'password_reset']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/editData', [AuthController::class, 'editData']);
    Route::post('/change_password', [AuthController::class, 'change_password']);
    Route::get('/userFavs', [FavouriteController::class, 'userFavs']);
    Route::post('/add_to_favs/{id}', [FavouriteController::class, 'add_to_favs']);
    Route::post('/del_fav/{id}', [FavouriteController::class, 'del_fav']);
    Route::post('/addClick/{id}', [ClickController::class, 'addClick']);
});

Route::get('/countries', [CountryController::class, 'index']);
Route::get('/users', [AuthController::class, 'users']);
Route::get('/myCahnces', [ChanceController::class, 'myCahnces']);
Route::get('/cats', [CatController::class, 'index']);
Route::get('/chances/{id}', [ChanceController::class, 'index']);
Route::get('/show/{id}', [ChanceController::class, 'show']);

Route::post('country/add', [CountryController::class, 'store']);
Route::post('country/edit/{id}', [CountryController::class, 'update']);
Route::post('country/del/{id}', [CountryController::class, 'destroy']);

Route::post('cat/add', [CatController::class, 'store']);
Route::post('cat/edit/{id}', [CatController::class, 'update']);
Route::post('cat/del/{id}', [CatController::class, 'destroy']);

Route::post('chance/add', [ChanceController::class, 'store']);
Route::post('chance/edit/{id}', [ChanceController::class, 'update']);
Route::post('chance/del/{id}', [ChanceController::class, 'destroy']);


Route::post('user/del/{id}', [AuthController::class, 'delUser']);

Route::get('country/show/{id}', [CountryController::class, 'show']);
Route::get('cat/show/{id}', [CatController::class, 'show']);
Route::get('user/show/{id}', [AuthController::class, 'show']);
Route::post('user/edit/{id}', [AuthController::class, 'update']);

Route::post('chanceImage/del/{id}', [ChanceController::class, 'delImage']);

Route::get('/banners', [BannerController::class, 'index']);
Route::post('/banner/add', [BannerController::class, 'store']);
Route::post('/banner/edit/{id}', [BannerController::class, 'update']);
Route::post('/banner/del/{id}', [BannerController::class, 'destroy']);

Route::post('/push', [NotiController::class, 'push']);

Route::get('/settings', [SettingController::class, 'settings']);
Route::post('/setting/edit', [SettingController::class, 'edit']);

Route::get('/admins', [AuthController::class, 'admins']);
Route::post('/add_admin', [AuthController::class, 'add_admin']);
Route::post('/edit_admin/{id}', [AuthController::class, 'edit_admin']);

Route::get('/articles', [ArticleController::class, 'index']);
Route::post('/article/add', [ArticleController::class, 'store']);
Route::get('/article/show/{id}', [ArticleController::class, 'show']);
Route::post('/article/edit/{id}', [ArticleController::class, 'update']);
Route::post('/article/del/{id}', [ArticleController::class, 'destroy']);

Route::post('/deleteUser', [AuthController::class, 'deleteUser'])->middleware('auth:sanctum');
