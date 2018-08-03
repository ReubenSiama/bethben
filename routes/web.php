<?php

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

Route::get('/', 'HomeController@myHome');
Route::get('/login','HomeController@getLogin')->name('login');
Route::post('/login','PostController@postLogin');
Route::get('/register','PostController@getRegister');
// Auth::routes();
Route::post('/register','PostController@postRegister')->name('register');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout','PostController@postLogout')->name('logout');
Route::post('/addPost','PostController@addNewPost');
Route::post('/addComment','PostController@addComment');
Route::post('/like','PostController@like');
Route::get('/home/view/{id}','HomeController@viewPost');
Route::get('/myPosts','HomeController@getMyPosts');
Route::get('/myPosts/edit/{id}','HomeController@editPost');
Route::post('/updatePost','PostController@updatePost');
Route::post('/delete','PostController@deletePost');
Route::get('/myProfile','HomeController@getMyProfile');
Route::post('/updateProfile','PostController@updateProfile');