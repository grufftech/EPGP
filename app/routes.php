<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showHomepage');
Route::post('/new-character', 'HomeController@newCharacterPost');


Route::get('/login', 'AdminController@login');
Route::get('/logout', 'AdminController@logout');
Route::post('/loginPost', 'AdminController@loginPost');
Route::get('/admin','AdminController@showHomepage');


Route::post('/scrapeJabbit', 'AdminController@scrapeJabbit');