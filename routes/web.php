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
use App\Http\Controllers\Website\MainController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use Spatie\Permission\Contracts\Role;

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

//Front Website
Route::group([],function(){
    Route::get('/home',[MainController::class,'home'])->name('home');
    Route::get('/donation-requests',[MainController::class,'donationRequests'])->name('donation-requests');
    //test
    Route::post('/test',[MainController::class,'test'])->name('test');
    //auth
});


//Admin Dashboard
Route::group(['middleware' => ['auth','check_permission'],'prefix' => 'dashboard'],function(){
    Route::get('/', function () {
        return view('admin.home');
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
    Route::post('/users/{user}/activate',[UserController::class,'activate'])->name('activate');
    Route::resource('users',UserController::class);
    Route::get('/reset-password',[UserController::class,'reset'])->name('reset');
    Route::post('/update-password',[UserController::class,'updatePassword'])->name('updatePassword');
});


//added a prefix, must be modified in dashboard routes
Route::group(['prefix' => 'dashboard'],function(){
    Route::get('/login',[UserController::class,'login'])->name('user.login');
    Route::post('/authenticate',[UserController::class,'authenticate'])->name('authenticate');
    Route::post('/logout',[UserController::class,'logout'])->name('user.logout');
});



