<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
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

Route::post('/register',[UserController::class,'store']);

Route::post('/category',[CategoryController::class,'store']);

Route::resource('users',UserController::class);

Route::get('books/author/{id}',[BookController::class,'getByAuthor']);

Route::get('books/category/{id}',[BookController::class,'getByCategory']);

Route::resource('books',BookController::class);