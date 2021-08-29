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

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', 'AuthController@registerForm')->name('register.create');
    Route::post('/register', 'AuthController@register')->name('register');
    Route::get('/login', 'AuthController@loginForm')->name('login.create');
    Route::post('/login', 'AuthController@login')->name('login');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
Route::get('/category/{slug}', 'HomeController@category')->name('category.show');
Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');
Route::get('/search', 'HomeController@search')->name('search');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/profile','ProfileController@index')->name('profile');
    Route::get('/profile/edit/{id}','ProfileController@edit')->name('profile.edit');
    Route::post('/profile','ProfileController@update')->name('profile.update');
    Route::get('/post','PostController@create')->name('user.post.create');
    Route::post('/post','PostController@store')->name('user.store.store');
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::post('/comment', 'CommentsController@store')->name('comment.store');
});

Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/users', 'UserController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/posts', 'PostController');
    Route::resource('/tags', 'TagController');
    Route::get('/comments', 'CommentsController@index')->name('admin.comments.index');
    Route::get('/comments/toggle/{id}', 'CommentsController@toggle')->name('admin.comments.toggle');
    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('admin.comment.destroy');

});


//Route::get('/logout', 'UserController@logout')->middleware('auth')->name('logout');



