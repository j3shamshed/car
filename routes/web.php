<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'CarController@index')->name('home');
    Route::get('/csv', 'CarController@csvView')->name('csv');
    Route::post('/csvUpload', 'CarController@csvUpload')->name('csvUpload');
    Route::resource('cars', 'CarController');
});
