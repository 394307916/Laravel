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



	
Route::post('/login','apiController@getcode');
Route::get('/showTeachers','TeachersController@showTeachers');
Route::post('/storeTeacher','TeachersController@storeTeacher');
Route::post('/myTeacher','TeachersController@myTeacher');
