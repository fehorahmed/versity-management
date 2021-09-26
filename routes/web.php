<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
Route::post('/admin/auth',[AdminController::class,'auth'])->name('admin.auth');
Route::group(['middleware'=>'admin_auth'],function(){
    //logout
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
    //dashboard
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');
});

