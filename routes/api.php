<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\API\AuthController;
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


// Route::post('/category',[CategoryController::class,'store']);

 Route::resource('users',UserController::class);

 Route::get('books/author/{id}',[BookController::class,'getByAuthor']);

 Route::get('books/category/{id}',[BookController::class,'getByCategory']);

 Route::resource('books',BookController::class);



 Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
   
    Route::get('my-books',[BookController::class,'myBooks']);

    Route::post('/logout',[AuthController::class,'logout']);

    Route::resource('books',BookController::class)->only('store','update','destroy');
    
});

Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);