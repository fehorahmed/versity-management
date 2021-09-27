<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

//admin
Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
Route::get('/admin/auth',[AdminController::class,'auth'])->name('admin.auth');


Route::group(['middleware'=>'admin_auth'],function(){
    //admin
    
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('/admin/profile/',[AdminController::class,'show'])->name('admin.show');

    //dashboard
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');
});