<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityContoller;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DonationRequestController;
use App\Http\Controllers\Admin\GovernorateController;
use App\Http\Controllers\Admin\SettingController;
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

Route::get('/', function () {
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


