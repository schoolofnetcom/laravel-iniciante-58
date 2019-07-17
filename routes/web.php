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

Route::middleware('auth')->group(function () {
    Route::get('/usuarios', 'UsersController@index');
    Route::post('/usuarios', 'UsersController@create');
    Route::get('/usuarios/{id}/delete', 'UsersController@delete');
    Route::get('/usuarios/{id}/edit', 'UsersController@editForm');
    Route::post('/usuarios/{id}', 'UsersController@edit');
    
    Route::get('/hello', function () {
        return view('hello', ['qwe' => 'World']);
    });

    Route::post('/hello', function () {
        $teste = $_POST['teste']; // RUIM!
        return view('hello', ['qwe' => 'World', 'teste' => $teste]);
    });
    
    Route::get('/hello/{name}', function ($name) {
        return view('hello', ['qwe' => $name]);
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
