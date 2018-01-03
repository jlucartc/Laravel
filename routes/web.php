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

})->name('login');

Route::get('home','HomeController@index');

Route::get('registrar','Auth\RegisterController@registrar')->name('registrar');

Route::get('esqueci-senha','Auth\RegisterController@esqueciSenha')->name('esqueci-senha');

Route::get('logout','Auth\LoginController@logout');

Route::get('/', function () {
  if( Auth::check()){
    //echo Auth::user();
    return view('App/home');

  }else{

    return view('login');

  }
});
