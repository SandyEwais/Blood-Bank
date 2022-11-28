<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityContoller;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DonationRequestController;
use App\Http\Controllers\Admin\GovernorateController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
    Route::resource('governorates',GovernorateController::class);
    Route::resource('cities',CityContoller::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('articles',ArticleController::class);
    Route::resource('clients',ClientController::class)->only('index','destroy');
    Route::resource('contact-messages',ContactMessageController::class)->only('index','destroy');
    Route::resource('donation-requests',DonationRequestController::class)->only('index','show','destroy');
    Route::resource('settings',SettingController::class)->only('index','edit','update');
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
});


Route::get('/reset-password',[UserController::class,'reset'])->name('reset');
Route::post('/update-password',[UserController::class,'update'])->name('update');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/authenticate',[UserController::class,'authenticate'])->name('authenticate');
Route::post('/logout',[UserController::class,'logout'])->name('logout');


