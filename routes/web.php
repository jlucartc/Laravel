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

/*Route::get('images/{filename}', function ($filename)
{
    $path = storage_path().$filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    echo $response;

})->name('images');*/

Route::post('privado','UploadController@privado')->name('privado');

Route::post('publico','UploadController@publico')->name('publico');

Route::post('login','Auth\LoginController@login')->name('login');

Route::post('register','Auth\RegisterController@register')->name('register');

Route::get('registrar','Auth\RegisterController@registrar')->name('registrar');

Route::get('esqueci-senha','Auth\RegisterController@esqueciSenha')->name('esqueci-senha');

Route::get('logout','Auth\LoginController@logout')->name('logout');

Route::get('home','HomeController@index')->name('home')->middleware('autorizar');

Route::get('adicionar','HomeController@adicionar')->name('adicionar')->middleware('autorizar');

Route::get('info','HomeController@info')->name('info')->middleware('info');

Route::get('/','HomeController@index');
