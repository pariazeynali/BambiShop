<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/category',[CategoryController::class,'category']);

Route::post('/product/create',[ProductController::class,'create']);

Route::get('/product/{id}',[CategoryController::class,'product']);

Route::get('/category/{cat}',[CategoryController::class,'product_kind']);

Route::get('/skin/{skin}',[CategoryController::class,'product_skintype']);

Route::get('/skin/{skin}',[CategoryController::class,'product_skintype']);

Route::post('/sign-in',[AuthController::class,'signIn']);

Route::post('/sign-up',[AuthController::class,'signUp']);

Route::post('logout',[AuthController::class,'logout'])->middleware('auth:api');

Route::post('/add-cart',[ShoppingContoller::class,'addToCart']);

Route::post('/show-cart',[ShoppingContoller::class,'showCart']);

Route::post('/add-information',[OrderController::class,'addAddress']);

Route::get('/show_order/{id}',[OrderController::class,'showOrder'])->middleware('auth:api');

Route::post('/final-pay',[OrderController::class,'MoveCartToOrder']);



