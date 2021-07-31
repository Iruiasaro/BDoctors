<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Auth::routes();



Route::get('/', 'GuestController@index')->name('welcome');

Route::get('/payment', 'PaymentsController@payment')->name('payment');
Route::get('/payment/process', 'PaymentsController@process')->name('payment.process');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name("admin.")
    ->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/edit/{id}', 'AdminController@edit')->name('edit');
        Route::get('/chart/{id}', 'AdminController@charts')->name('charts');
        Route::match(["PUT", "PATCH"], '/update/{id}', 'AdminController@update')->name('update');
        Route::get("/messages/{id}", "AdminController@messages")->name('messages');
        Route::delete("/delete/{user}", "AdminController@destroy")->name('destroy');
        Route::get('/sponsor_plan', 'AdminController@sponsorPlan')->name('sponsorPlan');
    });

Route::get('/show/{id}', 'DoctorController@show')->name('doctor.show');
Route::match(["PUT", "PATCH"],'/message/{id}', 'GuestController@sendMessage')->name('doctor.message');
Route::match(["PUT", "PATCH"],'/sponsorization/{id}', 'SponsorizationController@payment')->name('sponsorization.payment');
