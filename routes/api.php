<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) { //¡NO LO REQUIERO PARA ESTE PROYECTO!
//     return $request->user();
// });

Route::get('/libros', 'App\Http\Controllers\LibroController@index');
Route::post('/libros', 'App\Http\Controllers\LibroController@store');
Route::put('/libros/{id}', 'App\Http\Controllers\LibroController@update');
Route::delete('/libros/{id}', 'App\Http\Controllers\LibroController@destroy');
