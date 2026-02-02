<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('product', ProductController::class);
// Route::get('/product/{id}', [ProductController::class, 'show']);
// Route::get('/', ProductController::class .'@create');
