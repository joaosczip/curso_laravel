<?php

// ROTA DE PRODUTO
Route::resource('produtos', 'ProductController')->middleware('autorizacao');

//Rotas de autenticação
Route::get('/', 'LoginController@loginForm')->name('login.form');
Route::get('/registro', 'RegisterController@registerForm')->name('register.form');
Route::post('/registro', 'RegisterController@register')->name('register');
Route::post('/login', 'LoginController@login')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');

//Rotas de cadastro de usuário
Route::group(['middleware' => 'autorizacao', 'prefix' => 'usuarios'], function () {
    Route::get('/cadastro', 'UserController@create')->name('user.create');
    Route::post('/cadastro', 'UserController@store')->name('user.store');
});
