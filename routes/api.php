<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('1.0')->group(function(){

    Route::get('/ping', [
        'uses' => '\App\Http\Controllers\Api\v1a\PingController@ping',
        'as' => 'test.ping10'
    ]);

});

Route::prefix('2.0')->group(function(){

    Route::get('/ping', [
        'uses' => '\App\Http\Controllers\Api\v2a\PingController@ping',
        'as' => 'test.ping20'
    ]);

});


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


Route::fallback(function(){
    return response()->json([
        'message' => 'No entry API for this url'], 404);
});

Route::group(['prefix' => 'seller'], function () {
    Route::delete('delete/{uid}', '\App\Http\Controllers\Api\v1a\SellerController@destroy');
});


Route::get('sellers', '\App\Http\Controllers\Api\v1a\SellerController@index');
Route::get('users', '\App\Http\Controllers\Api\v1a\FormulaireController@index');
Route::post('store', '\App\Http\Controllers\Api\v1a\FormulaireController@store');
Route::post('sellerStore', '\App\Http\Controllers\Api\v1a\SellerController@sellerStore');
Route::delete('delete_user/{uid}', '\App\Http\Controllers\Api\v1a\FormulaireController@destroy');