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

Route::get('/', 'HomeController@index');

Route::prefix('gt')->group(function() {    
    Route::get('/about', 'HomeController@about')->middleware('age');
    Route::get('/contact', 'HomeController@contact')->middleware('age');
});


Route::get('home',function(){
    echo " you are under the required age limit!";
});

