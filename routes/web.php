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
    return view('Login/login');
});

Route::get('esqueci-senha',function(){

    return view('Login/esqueceu-senha');

});

//Route::post('login','Auth/LoginController');

Route::prefix('registrar')->group(function(){

  Route::get('/',function(){

    return view('Login/registrar');

  })->name('registrar');

  Route::post('verificar','Auth\RegisterController@validator')->name('registrar.verificar');

});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
