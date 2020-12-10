<?php

use Illuminate\Support\Facades\Route;

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


//outrasroutes
Route::get('/','App\Http\Controllers\PesquisaController@index')
    ->name('pesquisa.index');

Route::post('/form','App\Http\Controllers\PesquisaController@formenviado')
    ->name('pesquisa.form');




//livros
Route::get('/livros','App\Http\Controllers\LivrosController@index')
    ->name('livros.index');

Route::get('/livros/{id}/show','App\Http\Controllers\LivrosController@show')
    ->name('livros.show');

Route::get('/livros/create', 'App\Http\Controllers\LivrosController@create')->name('livros.create')->middleware('auth');

Route::post('/livros/store', 'App\Http\Controllers\LivrosController@store')->name('livros.store')->middleware('auth');

Route::get('/livros/{id}/edit', 'App\Http\Controllers\LivrosController@edit')->name('livros.edit')->middleware('auth');

Route::patch('livros/{id}', 'App\Http\Controllers\LivrosController@update')->name('livros.update')->middleware('auth');

Route::get('/livros/{id}/delete', 'App\Http\Controllers\LivrosController@delete')->name('livros.delete')->middleware('auth');

Route::delete('/livros', 'App\Http\Controllers\LivrosController@destroy')->name('livros.destroy');




//géneros
Route::get('/generos','App\Http\Controllers\GenerosController@index')
    ->name('generos.index');

Route::get('/generos/{idg}/show','App\Http\Controllers\GenerosController@show')
    ->name('generos.show');

Route::get('/generos/create', 'App\Http\Controllers\GenerosController@create')->name('generos.create')->middleware('auth');

Route::post('/generos/store', 'App\Http\Controllers\GenerosController@store')->name('generos.store')->middleware('auth');

Route::get('/generos/{id}/edit', 'App\Http\Controllers\GenerosController@edit')->name('generos.edit')->middleware('auth');

Route::patch('/generos/{id}', 'App\Http\Controllers\GenerosController@update')->name('generos.update')->middleware('auth');

Route::get('/generos/{id}/delete', 'App\Http\Controllers\GenerosController@delete')->name('generos.delete')->middleware('auth');

Route::delete('/generos', 'App\Http\Controllers\GenerosController@destroy')->name('generos.destroy');




//editoras
Route::get('/editoras','App\Http\Controllers\EditorasController@index')
    ->name('editoras.index');

Route::get('/editoras/{ide}/show','App\Http\Controllers\EditorasController@show')
    ->name('editoras.show');

Route::get('/editoras/create', 'App\Http\Controllers\EditorasController@create')->name('editoras.create')->middleware('auth');

Route::post('/editoras/store', 'App\Http\Controllers\EditorasController@store')->name('editoras.store')->middleware('auth');

Route::get('/editoras/{id}/edit', 'App\Http\Controllers\EditorasController@edit')->name('editoras.edit')->middleware('auth');

Route::patch('/editoras/{id}', 'App\Http\Controllers\EditorasController@update')->name('editoras.update')->middleware('auth');

Route::get('/editoras/{id}/delete', 'App\Http\Controllers\EditorasController@delete')->name('editoras.delete')->middleware('auth');

Route::delete('/editoras', 'App\Http\Controllers\EditorasController@destroy')->name('editoras.destroy');




//autores
Route::get('/autores','App\Http\Controllers\AutoresController@index')
    ->name('autores.index');

Route::get('/autores/{ida}/show','App\Http\Controllers\AutoresController@show')
    ->name('autores.show');

Route::get('/autores/create', 'App\Http\Controllers\AutoresController@create')->name('autores.create')->middleware('auth');

Route::post('/autores/store', 'App\Http\Controllers\AutoresController@store')->name('autores.store')->middleware('auth');

Route::get('/autores/{id}/edit', 'App\Http\Controllers\AutoresController@edit')->name('autores.edit')->middleware('auth');

Route::patch('/autores/{id}', 'App\Http\Controllers\AutoresController@update')->name('autores.update')->middleware('auth');

Route::get('/autores/{id}/delete', 'App\Http\Controllers\AutoresController@delete')->name('autores.delete')->middleware('auth');

Route::delete('/autores', 'App\Http\Controllers\AutoresController@destroy')->name('autores.destroy');




//edicoes
Route::get('/edicoes','App\Http\Controllers\EdicoesController@index')
    ->name('edicoes.index');

Route::get('/edicoes/{}/show','App\Http\Controllers\EdicoesController@index')
    ->name('edicoes.show');

//autenticacao
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
