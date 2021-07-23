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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
}); 

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', 'UserController@register')->name('register');
    Route::post('/register', 'UserController@save')->name('register.store');
    
    Route::get('/login', 'UserController@login')->name('login');
    Route::post('/login', 'UserController@new')->name('login.create');
});

Route::get('/logout', 'UserController@logout')->name('logout')->middleware('auth');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function(){
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/articles', 'ArticleController');
    Route::resource('/sources', 'SourceController');
    Route::resource('/tags', 'TagController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/users', 'UserController');
});

Route::get('/contact', function(){
    return view('front.contact');
})->name('contact');

Route::get('/page/{id}', 'ArticleController@show')->name('page');
Route::get('/page', 'ArticleController@random')->name('random');
Route::get('/category/{category}', 'ArticleController@category')->name('category');
Route::get('/source/{source}', 'ArticleController@source')->name('source');
Route::get('/tag/{tag}', 'ArticleController@tag')->name('tag');

Route::fallback(function(){
    abort(404);
});