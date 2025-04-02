<?php

use App\Http\Controllers\PrimaryController;
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
})->name("lista");

Route::get('/luizete', [PrimaryController::class,"addConvidadosView"]);
Route::get('/listapresente', function () {
    return view('lista-presente');
})->name("presente");

Route::get('/informacoes', function () {
    return view('informacoes');
})->name("informacoes");
