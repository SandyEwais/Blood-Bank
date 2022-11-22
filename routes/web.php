<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityContoller;
use App\Http\Controllers\Admin\GovernorateController;
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
});
Route::resource('governorates',GovernorateController::class);
Route::resource('cities',CityContoller::class);
Route::resource('categories',CategoryController::class);
Route::resource('articles',ArticleController::class);

