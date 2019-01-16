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


Route::get('/', 'BookController@index');
Route::get('/books', 'BookController@index');
Route::post('/books', 'BookController@searchBook');
Route::get('/books/new', 'BookController@create');
Route::post('/books/new', 'BookController@store');
Route::get('/books/{id}', 'BookController@show');
Route::get('/books/{id}/edit', 'BookController@edit');
Route::put('/books/{id}/edit', 'BookController@update');
Route::get('/books/{id}/delete', 'BookController@destroy');