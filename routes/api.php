<?php

use App\Http\Controllers\CategoryController;
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
Route::get('/category','CtegoryController@category');


Route::get('/product/{id}',
    function ($id) {

        $product = DB::table('product')->find($id);
        return $product;

    });

Route::get('/home','CategoryController@home');

Route::get('/category/{cat}',[CategoryController::class,'lipstick']);

