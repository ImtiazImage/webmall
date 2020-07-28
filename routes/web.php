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
Route::get('/about', 'HomeController@about')->name('aboutPage');
Route::get('/contact', 'HomeController@contact')->name('contactPage');

Route::get(md5('/add_post'), 'boloController@writePost')->name('write.post');

Route::get(md5('/add_category'), 'boloController@AddCategory')->name('add.category');
Route::get(md5('/all_category'), 'boloController@AllCategories')->name('all.category');

Route::prefix('gt')->group(function() {  
    Route::get('home',function(){
        echo " you are under the required age limit!";
    })->middleware('age');
});
