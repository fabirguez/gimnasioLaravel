<?php

use App\Http\Controllers\HomeController;
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
Route::get('/', HomeController::class);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/show/{id}', [UserController::class, 'show']);
Route::get('/users/create', [UserController::class, 'create']);

// Route::get('/', function () {
//     // return view('welcome');
//     return 'Bienvenido página principa';
// });

/* Route::get('cursos', function () {
    // return view('welcome');
    return 'Bienvenido página cursos';
}); */

/* Route::get('cursos/create', function () {
    return 'En esta pagina podrás crear un curso';
}); */
// TIENE ORDEN, TENER CUIDADO CON RUTAS Y VARIABLES, ESE ES EL ULTIMO

/* Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria == null) {
    // return view('welcome');
    //Se puede usar ifelse x si se quiere poner una u otra
    return 'Bienvenido página curso: $curso de la categoria: $categoria';
}); */
