<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'BiddingsController@index');

Route::get('/sspdf', 'WebScraperController@sspdf');

Route::get('/sebrae', 'WebScraperController@sebrae');

Route::get('/cnpq', 'WebScraperController@cnpq');
