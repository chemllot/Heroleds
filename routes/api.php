<?php

use App\Http\Controllers\ApiController;
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

// get request route
Route::get('leads','ApiController@getAllLeads');
Route::get('leads/{id}','ApiController@getLeads');

// post request route
Route::post('leads','ApiController@createLeads');

// update/put request route
Route::put('leads/{id}','ApiController@updateLeads');

// delete request route
Route::delete('leads/{id}','ApiController@deleteLeads');