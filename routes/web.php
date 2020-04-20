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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'home');

Route::view('/about', 'about');

//employee route
Route::name('employee.')->group(function(){

    Route::get('/contact', 'WorkerController@create')->name('create');
    Route::post('/contact', 'WorkerController@store')->name('store');
    Route::get('/showemployee', 'WorkerController@index')->name('index');
    Route::get('/employee/{id}', 'WorkerController@show')->name('show');
    Route::get('/employee/{id}/edit', 'WorkerController@edit')->name('edit');
    Route::post('/employee/{id}/edit', 'WorkerController@update')->name('update');
    Route::delete('/employee/{id}', 'WorkerController@destroy')->name('destroy');

});

//Route::view('/about', 'about');
