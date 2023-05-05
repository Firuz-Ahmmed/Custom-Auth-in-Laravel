<?php

use App\Http\Controllers\AuthController;
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
Route::get('/home',function (){
    return view('welcome');
})->name('home');


Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');
Route::get('/registration',[AuthController::class,'registration'])->name('registration');
Route::post('/registration',[AuthController::class,'registrationPost'])->name('registration.post');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');


