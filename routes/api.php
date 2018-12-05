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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('universities', 'api\APIController@university')->middleware('cors');
Route::get('programmes', 'api\APIController@programme')->middleware('cors');
Route::get('packages', 'api\APIController@package')->middleware('cors');
Route::get('courses', 'api\APIController@course')->middleware('cors');
Route::get('coursepackage', 'api\APIController@coursePackage')->middleware('cors');
Route::get('country', 'api\APIController@country')->middleware('cors');