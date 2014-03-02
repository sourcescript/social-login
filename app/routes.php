<?php

Route::group(array('prefix' => 'admin'), function() {
	Route::controller('/', 'AdminController');
});
Route::controller('/', 'FrontController');