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

Route::get('/product', 'ProductController@show');

Route::get('/category', 'CategoryController@index');

Route::get('/category/{task}', 'CategoryController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*
Route::get('/aedv', 'AedvController@index');
Route::get('aedv/add', array('as' => 'aedv.create', 'uses' => 'AedvController@create'));
Route::post('aedv/store', array('as' => 'aedv.store', 'uses' => 'AedvController@store'));
Route::get('aedv/edit/{id}', array('as' => 'aedv.edit', 'uses' => 'AedvController@edit'));
Route::patch('aedv/update/{id}', array('as' => 'aedv.update', 'uses' => 'AedvController@update'));
Route::delete('aedv/delete/{id}', array('as' => 'aedv.destroy', 'uses' => 'AedvController@destroy'));
Route::get('aedv/{slug}', array('as' => 'aedv.show', 'uses' => 'AedvController@show'));
