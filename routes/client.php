<?php

use App\Http\Controllers\FavorisController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth','client'])->group(function(){
    Route::get('/client', [FavorisController::class, 'index'])->name('client');
    Route::put('/favoris/{product}',[FavorisController::class,'toggle'])->name('favoris.toggle');
});