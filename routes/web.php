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

Route::get('/', function () {
    return view('welcome');
});

//Route::match(['get','post'],'admin/add-category','CategoryController@addCategory');
Route::get('/dang-nhap','AdminController@getlogin')->name('admin.getlogin');
Route::post('/dang-nhap','AdminController@postlogin')->name('admin.postlogin');

Route::get('dang-xuat','AdminController@getlogout')->name('admin.getlogout');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth']],function (){
    Route::get('/bang-dieu-khien','AdminController@dashboard')->name('admin.dashboard');
    Route::get('/cai-dat','AdminController@settings')->name('admin.settings');
    Route::get('/check-pwd','AdminController@chkPassword');
//    Route::get('/update-pass','AdminController@getUpdatePassword');
    Route::post('/update-pass','AdminController@postUpdatePassword')->name('admin.postUpdatePassword');
});
