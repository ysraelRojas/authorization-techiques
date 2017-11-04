<?php 

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::get('/', 'Dashboard@index')->name('admin_dashboard');

Route::get('/events', function () {
	return 'Admin Events';
})->name('admin_events');

Route::catch(function () {
	throw new NotFoundHttpException;
});




