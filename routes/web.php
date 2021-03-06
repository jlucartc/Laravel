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

Route::post('download','ArquivosController@download')->name('download');

Route::post('resetarSenha','Auth\ForgotPasswordController@sendResetLinkEmail')->name('resetarSenha');

Route::get('resetForm','Auth\ResetPasswordController@resetForm')->name('password.reset');

Route::post('reset','Auth\ResetPasswordController@reset')->name('reset');

Route::post('renomear','ArquivosController@renomear')->name('renomear');

Route::post('pesquisar','ViewsController@pesquisar')->name('pesquisar');

Route::post('deletar','ArquivosController@deletar')->name('deletar');

Route::get('arquivo','ViewsController@arquivo')->name('arquivo');

Route::post('upload','ArquivosController@upload')->name('upload');

Route::post('login','Auth\LoginController@login')->name('login');

Route::post('register','Auth\RegisterController@register')->name('register');

Route::get('registrar','Auth\RegisterController@registrar')->name('registrar');

Route::get('esqueci-senha','Auth\RegisterController@esqueciSenha')->name('esqueci-senha');

Route::get('logout','Auth\LoginController@logout')->name('logout');

Route::get('adicionar','HomeController@adicionar')->name('adicionar')->middleware('autorizar');

Route::get('info','HomeController@info')->name('info')->middleware('info');

Route::get('/','ViewsController@home')->name('/');
