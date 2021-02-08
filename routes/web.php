<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\AgendaContatoController;

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

Route::resource('/agenda', AgendaContatoController::class);

Route::get('/', [AgendaContatoController::class, 'index']);
