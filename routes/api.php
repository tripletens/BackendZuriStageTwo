<?php

use App\Http\Controllers\PersonController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/', [PersonController::class, 'store']);
Route::get('/', [PersonController::class, 'fetch_all']);
Route::get('/{id}', [PersonController::class, 'show']);
Route::put('/{id}', [PersonController::class, 'update']);
Route::delete('/{id}', [PersonController::class, 'destroy']);


