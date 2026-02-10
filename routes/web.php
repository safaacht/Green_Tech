<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


include 'admin.php';
include 'client.php';
Route::resource('products', ProductController::class);


Route::controller(RegisterController::class)->group(function(){
    Route::get('/register','create')->name('register.create');
    Route::post('/register','store')->name('register.store');

});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login','create')->name('login.create');
    Route::post('/login','store')->name('login.store');
    Route::post('/logout','destroy')->name('logout');

});