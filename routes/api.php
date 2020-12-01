<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::middleware('api')->group(function()
{
    /*
    |-----------------------------------------
    | API route
    |-----------------------------------------
    | Proposed route for the BLIS api, we will receive api calls
    | from other systems from this route.
    */
    Route::post('receiver', array(
        "as" => "api.receiver",
        "uses" => "InterfacerController@receiveLabRequest"
    ));
    Route::post('testinfo', array(
        "uses" => "InterfacerController@getTestInfo"
    ));
    Route::post('searchtests', array(
        "uses" => "InterfacerController@getTests"
    ));
    Route::post('saveresults', array(
        "uses" => "InterfacerController@saveTestResults"
    ));
    Route::any('/', array(
        "as" => "user.login",
        "uses" => "UserController@loginAction"
    ));

});

