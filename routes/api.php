<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CatController;
use App\Http\Controllers\Api\ChanceController;
use App\Http\Controllers\Api\ClickController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\FavouriteController;
use App\Http\Controllers\Api\NotiController;
use App\Http\Controllers\Api\OrderController;
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

Route::middleware('isAdmin')->get('/authenticated', function () {
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
    Route::get('/userOrders', [OrderController::class, 'userOrders']);
    Route::post('/add_to_oredrs/{id}', [OrderController::class, 'add_to_oredrs']);
    Route::post('/del_order/{id}', [OrderController::class, 'del_order']);
    Route::post('/addClick/{id}', [ClickController::class, 'addClick']);
    Route::post('/deleteUser', [AuthController::class, 'deleteUser']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('data', [DataController::class, 'data']);

    //users
    Route::get('/users', [AuthController::class, 'users']);
    Route::post('user/del/{id}', [AuthController::class, 'delUser']);
    Route::get('user/show/{id}', [AuthController::class, 'show']);
    Route::post('user/edit/{id}', [AuthController::class, 'update']);

    //admin
    Route::get('/admins', [AuthController::class, 'admins']);
    Route::post('/add_admin', [AuthController::class, 'add_admin']);
    Route::post('/edit_admin/{id}', [AuthController::class, 'edit_admin']);

    //cats
    Route::post('cat/add', [CatController::class, 'store']);
    Route::post('cat/edit/{id}', [CatController::class, 'update']);
    Route::get('cat/show/{id}', [CatController::class, 'show']);
    Route::post('cat/del/{id}', [CatController::class, 'destroy']);

    //countries
    Route::post('country/add', [CountryController::class, 'store']);
    Route::post('country/edit/{id}', [CountryController::class, 'update']);
    Route::get('country/show/{id}', [CountryController::class, 'show']);
    Route::post('country/del/{id}', [CountryController::class, 'destroy']);

    //chances
    Route::post('chance/add', [ChanceController::class, 'store']);
    Route::post('chance/edit/{id}', [ChanceController::class, 'update']);
    Route::post('chance/del/{id}', [ChanceController::class, 'destroy']);
    Route::get('/show/{id}', [ChanceController::class, 'show']);
    Route::post('chanceImage/del/{id}', [ChanceController::class, 'delImage']);

    //articles
    Route::post('/article/add', [ArticleController::class, 'store']);
    Route::get('/article/show/{id}', [ArticleController::class, 'show']);
    Route::post('/article/edit/{id}', [ArticleController::class, 'update']);
    Route::post('/article/del/{id}', [ArticleController::class, 'destroy']);

    //orders
    Route::get('/orders', [OrderController::class, 'orders']);
    Route::post('order/del/{id}', [OrderController::class, 'delOrder']);

    //noti
    Route::post('/push', [NotiController::class, 'push']);

    //banners
    Route::post('/banner/add', [BannerController::class, 'store']);
    Route::post('/banner/edit/{id}', [BannerController::class, 'update']);
    Route::post('/banner/del/{id}', [BannerController::class, 'destroy']);

    //settings
    Route::post('/setting/edit', [SettingController::class, 'edit']);
});


Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/countries', [CountryController::class, 'index']);
Route::get('/myCahnces', [ChanceController::class, 'myCahnces']);
Route::get('/cats', [CatController::class, 'index']);
Route::get('/chances/{id}', [ChanceController::class, 'index']);
Route::get('/banners', [BannerController::class, 'index']);
Route::get('/settings', [SettingController::class, 'settings']);
