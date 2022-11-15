<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;
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

Route::group(['prefix' => 'v1'],function(){
    
    

    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);
    Route::post('/forgot-password',[AuthController::class,'forgotPassword']);
    Route::post('/reset-password',[AuthController::class,'resetPassword']);

    Route::group(['middleware' => 'auth:api'],function(){
        Route::post('/profile',[AuthController::class,'profile']);
        Route::get('/notifications',[MainController::class,'notifications']);
        Route::post('/notifications-settings',[AuthController::class,'notificationsSettings']);
        Route::get('/governorates',[MainController::class,'governorates']);
        Route::get('/cities',[MainController::class,'cities']);
        Route::get('/articles',[MainController::class,'articles']);
        Route::get('/blood-types',[MainController::class,'bloodTypes']);
        Route::get('/categories',[MainController::class,'categories']);
        Route::get('/settings',[MainController::class,'settings']);
        Route::post('/toggle-favourite',[MainController::class,'toggleFavourite']);
        Route::get('/get-favourites',[MainController::class,'getFavourites']);
        Route::post('/donation-requests',[MainController::class,'addDonationRequest']);
        Route::get('/donation-requests',[MainController::class,'getDonationRequest']);

        Route::post('/generateDeviceToken',[AuthController::class,'registerToken']);
        Route::post('/removeDeviceToken',[AuthController::class,'removeToken']);
    });
});