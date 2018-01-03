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

//Auth::Routes();

Route::post('login','Auth\LoginController@login');

Route::get('home','HomeController@index');

Route::get('registrar','Auth\RegisterController@registrar')->name('registrar');

Route::get('esqueci-senha','Auth\RegisterController@esqueciSenha')->name('esqueci-senha');

Route::get('logout','Auth\LoginController@logout')->name('logout');

Route::prefix('auth')->group(function(){

  Route::get('home','HomeController@index')->middleware('autorizar');
  Route::get('adicionar','HomeController@adicionar')->middleware('autorizar');
  Route::get('info','HomeController@info')->middleware('autorizar');


});

Route::get('/', function () {
  if( Auth::check()){

    return view('App/home');

  }else{

    return view('login');

  }
})->name('index');
