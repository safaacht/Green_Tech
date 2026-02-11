<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    Route::resource('roles', RolesController::class);
    Route::get('/export-users',function(){
        return Excel::download(new UsersExport, 'users.xlsx');
        })->name('admin.export');
    
});
