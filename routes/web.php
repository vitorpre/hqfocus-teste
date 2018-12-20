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

Route::get('/', 'HomeController@index')->name('home');
Route::get('candidato/cadastrar', 'ApplicantController@create');
Route::post('candidato/salvar', 'ApplicantController@store');

Route::post('candidato/votar', 'VoteController@vote');
