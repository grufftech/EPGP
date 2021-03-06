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

/* HomePage */
Route::get('/', 'HomeController@showHomepage');
Route::get('/character/{id}', 'HomeController@characterHistory');
Route::post('/new-character', 'HomeController@newCharacterPost');

/* Admin Login */
Route::get('/login', 'AdminController@login');
Route::post('/create', 'AdminController@createUser');
Route::get('/logout', 'AdminController@logout');
Route::post('/loginPost', 'AdminController@loginPost');

/* Admin functions */
Route::get('/admin','AdminController@showHomepage');
Route::get('/admin/giveLoot/{id}','AdminController@giveLoot');
Route::post('/admin/giveLoot/{id}','AdminController@giveLootPost');
Route::get('/admin/modifyEffort/{id}','AdminController@modifyEffort');
Route::post('/admin/modifyEffort/{id}','AdminController@modifyEffortPost');
Route::post('/admin/massClear', 'AdminController@massClearAll');
Route::post('/admin/massSelect', 'AdminController@massSelectAll');
Route::post('/admin/massEffort', 'AdminController@massEffort');
Route::get('/admin/recalculate/{id}', 'AdminController@recalculate');
Route::post('/admin/recalculateALL', 'AdminController@recalculateAll');
Route::post('/admin/scrape', 'AdminController@scrape');
Route::post('/admin/decay','AdminController@decay');
Route::get('/admin/edit/user/{id}','AdminController@editCharacter');
Route::post('/admin/edit/user/{id}','AdminController@editCharacterPost');
Route::get('/admin/delete/user/{id}','AdminController@deleteCharacter');
Route::get('/admin/edit/history/{id}','AdminController@editHistory');
Route::post('/admin/edit/history/{id}','AdminController@editHistoryPost');
Route::get('/admin/delete/history/{id}','AdminController@deleteHistory');