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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin_only'], function(){

  Route::get('authors', ['uses' => 'AuthorsController@index', 'as' => 'authors.index']);
  Route::get('authors/create', ['uses' => 'AuthorsController@create', 'as' => 'authors.create']);
  Route::get('authors/{id}', ['uses' => 'AuthorsController@show', 'as' => 'authors.show']);
  Route::get('authors/{id}/edit', ['uses' => 'AuthorsController@edit', 'as' => 'authors.edit']);
  Route::post('authors', ['uses' => 'AuthorsController@store', 'as' => 'authors.store']);
  Route::put('authors/{id}', ['uses' => 'AuthorsController@update', 'as' => 'authors.update']);
  Route::get('authors/{id}/delete', ['uses' => 'AuthorsController@destroy', 'as' => 'authors.destroy']);


  Route::get('books', ['uses' => 'BooksController@index', 'as' => 'books.index']);
  Route::get('books/create', ['uses' => 'BooksController@create', 'as' => 'books.create']);
  Route::get('books/{id}', ['uses' => 'BooksController@show', 'as' => 'books.show']);
  Route::get('books/{id}/edit', ['uses' => 'BooksController@edit', 'as' => 'books.edit']);
  Route::post('books', ['uses' => 'BooksController@store', 'as' => 'books.store']);
  Route::put('books/{id}', ['uses' => 'BooksController@update', 'as' => 'books.update']);
  Route::get('books/{id}/delete', ['uses' => 'BooksController@destroy', 'as' => 'books.destroy']);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// to prevent quest user going logout page and cause an error
Route::get('/logout', function(){
  Auth::logout();
  return Redirect::to('login');
});