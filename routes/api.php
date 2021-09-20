<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


//Route::Resource('customer','CustomerController')->only(['index', 'show', 'store', 'update', 'delete']);
//hoặc
//Route::Resource('customer','CustomerController')->except(['create', 'edit']);

// version api
Route::prefix('v1')->namespace('Api\v1')->group(function(){
    Route::Resource('customer','CustomerController')->only(['index', 'show']);
});

Route::prefix('v2')->namespace('Api\v2')->group(function(){
    Route::Resource('customer','CustomerController')->only(['index', 'show']);
});

