<?php

use Illuminate\Support\Facades\Artisan;

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

Auth::routes();
// // Front-end
Route::group(['prefix' => '/'], function() {
    Route::get('/', 'front_end\ArticleController@index');
    Route::get('/search', 'HomeController@search');
    Route::get('/category/{cat}', 'HomeController@category');
    Route::get('/category/{cat}/{parent}', 'HomeController@showArticleInCategory');
    Route::get('/beat/{cat}', 'HomeController@beat');
    Route::get('tag/{tag}', 'HomeController@tag');
    Route::get('/post/{cat}/{slug}','HomeController@viewAricle');
    Route::post('/comment', 'HomeController@addComment');
    Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
    Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');
});


// // Dashboard Admin
Route::group(['prefix' => '/admin', 'middleware' => ['checkAdmin', 'auth']], function() {
    Route::get('/', 'AdminController@dashboard');
    Route::resource('/category', 'admin\CategoryController');
    Route::resource('/article', 'admin\ArticleController');
    Route::resource('/tag', 'admin\TagController');
    Route::resource('/comment', 'admin\CommentController')->only([
        'index'
    ]);
    Route::resource('/user', 'admin\UserController');
    Route::post('/article/search','admin\ArticleController@search');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
