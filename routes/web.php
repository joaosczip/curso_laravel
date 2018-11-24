<?php

// ROTA DE PRODUTO
Route::resource('produtos', 'ProductController');

//Rotas de autenticação
Route::get('/', 'LoginController@loginForm')->name('login.form');
Route::get('/registro', 'RegisterController@registerForm')->name('register.form');
Route::post('/registro', 'RegisterController@register')->name('register');
Route::post('/login', 'LoginController@login')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');

//Route::group(['middleware' => 'autorizacao'], function () {
Route::get('/produto/{id}/categorias', 'ProductController@relacionaCategorias')
    ->name('product.categories');
Route::post('/produto/{id}/categorias', 'ProductController@relacionarComCategorias')
    ->name('product.categories.relaciona');
//});

//Rotas de cadastro de usuário
Route::group(['middleware' => 'autorizacao', 'prefix' => 'usuarios'], function () {
    Route::get('/cadastro', 'UserController@create')->name('user.create');
    Route::post('/cadastro', 'UserController@store')->name('user.store');
});
