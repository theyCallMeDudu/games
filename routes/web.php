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

//Route::resource('/games', 'GameController');
//Route::get('games/destroy/{id}', 'GameController@destroy');

Route::group(['middleware' => ['auth']], function(){

        Route::resource('/games', 'GameController');
        Route::get('games/destroy/{id}', 'GameController@destroy');
        
});

 Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');

 Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');//->middleware('auth');
