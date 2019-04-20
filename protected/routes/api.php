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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

 
    /** Without Middleware Api List **/
    Route::group(['prefix' => API_V1_PREFIX,'namespace'=>'Api'], function () {
       
        /*Basic Apis Start*/
        Route::get("/currency_totals",array(   //1)Get Currency Wise Total             
            'uses' => 'CurrencyController@getTotalBaseOnCurrency'));



        /*Basic Apis End*/
    });
