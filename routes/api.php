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

Route::get('specialization_user', 'api\SpecializationUserController@index');

Route::get('user/specializations', 'api\SpecializationController@getUserSpecializations');

Route::get('specializations', 'api\SpecializationController@index');
Route::get('reviews/', 'api\ReviewController@getReviewsByUser');
Route::get('users/', 'api\UserController@getUsers');
Route::get('cities/', 'api\CityController@getCities');
Route::get('messages/', 'api\MessageController@getMessagesByDate');
Route::get('sponsorizedUsers/', 'api\SponsorizedUser@getSponsorizedUsers');
