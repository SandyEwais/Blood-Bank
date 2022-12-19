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
use App\Http\Controllers\Website\AuthController;
use App\Http\Controllers\Website\MainController;
use Illuminate\Support\Facades\Route;
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
Route::get('/home',[MainController::class,'home'])->name('home');
Route::get('/donation-requests',[MainController::class,'donationRequests'])->name('donation-requests');
Route::get('/donation-request/{donationRequest}',[MainController::class,'donationRequest'])->name('donation-request');
Route::get('/about',[MainController::class,'aboutBloodBank'])->name('about-blood-bank');
Route::get('/about-us',[MainController::class,'aboutUs'])->name('about-us');
Route::get('/articles',[MainController::class,'articles'])->name('articles');
Route::get('/article/{article}',[MainController::class,'article'])->name('article-details');
Route::get('/contact-us',[MainController::class,'contactUs'])->name('contact-us');

Route::group(['middleware' => 'client_auth'],function(){
    Route::post('/toggle-favourite',[MainController::class,'toggleFavourite'])->name('toggle-favourite');
    Route::post('/logout',[AuthController::class,'logout'])->name('clients.logout');
});
Route::group(['middleware' => 'guest:web-clients'],function(){
    Route::get('/register',[AuthController::class,'register'])->name('clients.register');
    Route::post('/register',[AuthController::class,'create'])->name('clients.create');
    Route::get('/login',[AuthController::class,'login'])->name('clients.login');
    Route::post('/login',[AuthController::class,'authenticate'])->name('clients.authenticate');
    Route::get('/forgot-password',[AuthController::class,'forgotPassword'])->name('clients.forgot-password');
    Route::post('/email-verification',[AuthController::class,'sendPinCode'])->name('clients.send-pin-code');
    Route::get('/reset-password',[AuthController::class,'enterPinCode'])->name('clients.enter-pin-code');
    Route::post('/reset-password',[AuthController::class,'confirmPinCode'])->name('clients.confirm-pin-code');
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


Route::group(['prefix' => 'dashboard'],function(){
    Route::get('/login',[UserController::class,'login'])->name('users.login');
    Route::post('/login',[UserController::class,'authenticate'])->name('users.authenticate');
    Route::post('/logout',[UserController::class,'logout'])->name('users.logout');
});



