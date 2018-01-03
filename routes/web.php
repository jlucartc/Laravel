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

Auth::Routes();

Route::get('login',function(){

  return view('login');

});

Route::get('home','HomeController@index')->name('home');

Route::get('registrar','Auth\RegisterController@registrar')->name('registrar');

Route::get('esqueci-senha','Auth\RegisterController@esqueciSenha')->name('esqueci-senha');

Route::post('email','OrderController@ship');

Route::get('/', function () {
  if(Auth::check()){

    return view('home');

  }else{

    return view('login');

  }
});
