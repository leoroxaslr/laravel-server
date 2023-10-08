<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/products/search/{name}',[ProductController::class, 'search']);
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class, 'login']);

// Route::resource('products', ProductController::class);
// Route::post('/products',[ProductController::class,'store']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware' => ['auth:sanctum']],function() {
Route::put('/products/{id}',[ProductController::class, 'update']);
Route::post('/products',[ProductController::class, 'store']);
Route::delete('/products/{id}',[ProductController::class, 'destroy']);
Route::post('/logout',[AuthController::class, 'logout']);
});

