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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/project/create', 'ProjectsController@create')->name('create_project');
Route::post('/project', 'ProjectsController@store')->name('store_project');
Route::get('/projects', 'ProjectsController@show')->name('show_project');
