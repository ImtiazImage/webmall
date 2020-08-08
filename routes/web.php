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

Route::get(md5('/add_post'), 'PostController@writePost')->name('write.post');
Route::post('/store_post', 'PostController@StorePost')->name('store.post');

// category crud 
Route::get('/add_category', 'boloController@AddCategory')->name('add.category');
Route::post('/store_category', 'boloController@StoreCategory')->name('store.category');
Route::get('/all_category', 'boloController@AllCategories')->name('all.category');
Route::get('/single-view-category/{id}', 'boloController@SingleViewCategory');
Route::get('/delete-category/{id}', 'boloController@DeleteCategory');
Route::get('/edit-category/{id}', 'boloController@EditCategory');
Route::post('/update-category/{id}', 'boloController@UpdateCategory');

Route::prefix('gt')->group(function() {  
    Route::get('home',function(){
        echo " you are under the required age limit!";
    })->middleware('age');
});
