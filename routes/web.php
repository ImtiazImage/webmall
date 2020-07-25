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
Route::get('home',function(){
    echo " you are under the required age limit!";
});

Route::prefix('gt')->group(function() {
    Route::get('/about', function () {
        return view('about',['pageName'=>'About Us Page']);
    })->middleware('age');
    Route::get('/contact', function () {
        return view('pages.contact');
    })->middleware('age');
});

