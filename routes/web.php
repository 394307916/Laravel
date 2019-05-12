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



//获取用户openid	
Route::post('/login','apiController@getcode');
//教师相关api
Route::get('/showTeachers','TeachersController@showTeachers');
Route::post('/storeTeacher','TeachersController@storeTeacher');
Route::post('/myTeacher','TeachersController@myTeacher');
Route::post('/showTeacherDetail','TeachersController@showTeacherDetail');
Route::post('/xiaxianTeacher','TeachersController@xiaxianTeacher');
Route::post('/pictureTeacher','TeachersController@pictureTeacher');
//视频相关api
Route::post('/video','videoController@video');
Route::get('/yulezixun','videoController@yulezixun');
//家长相关api
Route::get('/showPatriarchs','patriController@showPatriarchs');
Route::post('/storePatriarch','patriController@storePatriarch');
Route::post('/showPatriarchDetail','patriController@showPatriarchDetail');
Route::get('/getDeliverCount','patriController@getDeliverCount');
Route::post('/postDeliver','patriController@postDeliver');
Route::post('/finishPatriarch','patriController@finishPatriarch');
Route::post('/whoDeliver','patriController@whoDeliver');
Route::post('/mySign','patriController@mySign');
//帖子相关api
Route::post('/storeNew','newController@storeNew');
Route::get('/showNews','newController@showNews');
Route::post('/showNewDetail','newController@showNewDetail');
Route::post('/pictureNew','newController@pictureNew');
Route::post('/dianzan','newController@dianzan');
//支付相关api
Route::post('/pay','payController@pay');
Route::post('/successPay','payController@successPay');
Route::post('/isPay','payController@isPay');
Route::post('/showOrder','payController@showOrder');
//收藏相关api
Route::post('/shoucangTeacher','collectController@shoucangTeacher');
Route::post('/shoucangNew','collectController@shoucangNew');
Route::post('/showCollectTeacher','collectController@showCollectTeacher');
Route::post('/showCollectNew','collectController@showCollectNew');
//评论相关api
Route::post('/getReview','reviewController@getReview');
Route::post('/messageReview','reviewController@messageReview');
Route::post('/hasNewReview','reviewController@hasNewReview');
//广告相关api
Route::post('/getAdImg','adverController@getAdImg');
Route::post('/getAdText','adverController@getAdText');
Route::get('/showAdImg','adverController@showAdImg');
Route::get('/showAdText','adverController@showAdText');
//搜索相关api
Route::post('/searchTeacher','searchController@searchTeacher');
//后台相关api
Route::get('xlogin','SessionsController@create')->name('login');
Route::post('xlogin','SessionsController@store')->name('login');
Route::get('myadmin','SessionsController@home')->name('myadmin');
Route::delete('logout','SessionsController@destroy')->name('logout');

