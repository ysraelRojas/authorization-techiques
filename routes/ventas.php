<?php 
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Rutas para vendedores

Route::get('/', function () {
	return 'Panel Ventas';
})->name('area_ventas');

Route::catch( function () {
	throw new NotFoundHttpException;	
});