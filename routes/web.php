<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
Route::get('/',[Homecontroller::class, 'store']);
Route::group(['middleware'=>'guest'],function(){
    Route::get('login',[HomeController::class,'index'])->name('login');
    Route::post('login',[HomeController::class,'login'])->name('login')->middleware('throttle:2,1');

    Route::get('register',[HomeController::class,'register_view'])->name('register');
    Route::post('register',[HomeController::class,'register'])->name('register')->middleware('throttle:2,1');
});
Route::group(['middleware'=>'auth'],function(){
    Route::get('redirect',[HomeController::class,'redirect'])->name('redirect');
    Route::get('logout',[HomeController::class,'logout'])->name('logout');
});
