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

Route::get('/', 'TestController@welcome');//ejecuta el controller TestController metodo welcome

Route::get('/prueba',function(){
    return 'Hola soy una ruta de prueba :v';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
