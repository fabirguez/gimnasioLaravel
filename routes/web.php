<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Tramo_UserController;
use App\Http\Controllers\TramoController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/configuracion', [UserController::class, 'config'])->middleware(['auth'])->name('config');
Route::get('user/avatar/{filename}', [UserController::class, 'getImage'])->middleware(['auth'])->name('user.avatar');
Route::post('/user/update', [UserController::class, 'update'])->middleware(['auth'])->name('user.update');
Route::post('/user/updatepass', [UserController::class, 'updatepass'])->middleware(['auth'])->name('user.updatepass');
Route::get('/user/password', [UserController::class, 'password'])->middleware(['auth'])->name('password');
Route::get('/user/perfil/{id}', [UserController::class, 'profile'])->middleware(['auth'])->name('perfil');

Route::resource('tramos', TramoController::class)->middleware(['auth'])->names('tramo');

Route::resource('mistramos', Tramo_userController::class)->middleware(['auth'])->names('mistramos');

Route::get('api', [ApiController::class, 'index'])->name('api');
