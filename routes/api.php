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


Route::get('/category/{id}',
    function ($id) {

        $product = DB::table('product')->find($id);
        return $product;

    });

Route::get('/home','CategoryController@home');

Route::get('/category/lipstick','CategoryController@lipstick');

Route::get('/category/mascara','CategoryController@mascara');

Route::get('/category/cream','CategoryController@cream');

Route::get('/category/nailpolish','CategoryController@nailpolish');

Route::get('/category/lotion','CategoryController@lotion');

Route::get('/category/sunscream','CategoryController@sunscream');

Route::get('/category/facewash','CategoryController@facewash');

Route::get('/category/oilyskin','CategoryController@oily');

Route::get('/category/dryskin','CategoryController@dry');

Route::get('/category/normalskin','CategoryController@normal');
