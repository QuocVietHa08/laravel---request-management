<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
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

Route::resource('request',RequestController::class);

Route::get('',[RequestController::class,'index']);

Route::get('request/create',[RequestController::class,'create']);

Route::post('reques/store',[RequestController::class,'store']);

Route::get('request/detail/{id}',[RequestController::class,'show']);

Route::put('/update/{id}',[RequestController::class,'update']);

Route::delete('{id}',[RequestController::class,'destroy']);

