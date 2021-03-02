<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TramoController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('tramos', TramoController::class)->names('admin.tramos');

Route::resource('activities', ActivityController::class)->names('admin.activities');

// Route::resource('user', [UserController::class]);
