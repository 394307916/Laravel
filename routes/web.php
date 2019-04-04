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
Route::post('/showTeacherDetail','TeachersController@showTeacherDetail');
Route::post('/xiaxianTeacher','TeachersController@xiaxianTeacher');

Route::post('/video','videoController@video');

Route::get('/showPatriarchs','patriController@showPatriarchs');
Route::post('/storePatriarch','patriController@storePatriarch');
Route::post('/showPatriarchDetail','patriController@showPatriarchDetail');
Route::get('/getDeliverCount','patriController@getDeliverCount');
Route::post('/postDeliver','patriController@postDeliver');

Route::post('/storeNew','newController@storeNew');
Route::get('/showNews','newController@showNews');
