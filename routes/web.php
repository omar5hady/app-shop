<?php

Route::get('/', 'TestController@welcome');//ejecuta el controller TestController metodo welcome

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
  Route::get('/products','ProductController@index'); //Listado de productos
  Route::get('/products/create','ProductController@create'); //Crear nuevos productos (Formulario)
  Route::post('/products','ProductController@store'); //Crear nuevos productos (Almacenar en BD)
  Route::get('/products/{id}/edit','ProductController@edit'); //Crear nuevos productos (Formulario)
  Route::post('/products/{id}/edit','ProductController@update'); //Crear nuevos productos (Almacenar en BD)
  Route::delete('/products/{id}','ProductController@destroy'); //Form Eliminar
});
