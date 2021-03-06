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
use Symfony\Component\HttpFoundation\Response;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/home/change', 'HomeController@change_password')->name('change_password')->middleware('auth');

//Area cientes rutas

Route::get('/clientes', function () {
	return 'Panel Clientes';
})->name('area_clientes')->middleware(['auth', 'clientes']);


