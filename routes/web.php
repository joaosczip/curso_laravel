<?php

// ROTA DE PRODUTO
Route::resource('produtos', 'ProductController');

//Rotas de autenticação
Route::get('/', 'LoginController@loginForm')->name('login.form');
Route::get('/registro', 'RegisterController@registerForm')->name('register.form');
Route::post('/registro', 'RegisterController@register')->name('register');
Route::post('/login', 'LoginController@login')->name('login');