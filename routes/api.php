<?php

use App\Http\Controllers\PrimaryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("/createConvidado" , [PrimaryController::class,"createConvidado"]);
Route::get("/getAllConvidados" , [PrimaryController::class,"getAllConvidados"]);
Route::get("/getAllConvidadosNoTable" , [PrimaryController::class,"getAllConvidadosNoTable"]);

Route::put("/updateStatus" , [PrimaryController::class,"alterarStatus"]);
