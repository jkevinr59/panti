<?php

use Illuminate\Support\Facades\Route;

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
    return view('company_profile');
});
Auth::routes();

Route::get('/pdf/test', function () {
    return view('pdf.laporan');
});
Route::get('/pdf/test/{id}/download','LaporanController@export');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/ganti_password', 'HomeController@changePassword')->name('change_password');
    Route::post('/ganti_password', 'HomeController@updatePassword')->name('update_password');

    Route::group(['prefix' => 'user','as'=>'user.'], function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('/create', 'UserController@create')->name('create');
        Route::post('/store', 'UserController@store')->name('store');
        Route::get('/{id}/edit', 'UserController@edit')->name('edit');
        Route::put('/{id}/update', 'UserController@update')->name('update');
    });
    Route::group(['prefix' => 'anak','as'=>'anak.'], function () {
        Route::get('/', 'AnakController@index')->name('index');
        Route::get('/show', 'AnakController@show')->name('show');
        Route::get('/create', 'AnakController@create')->name('create');
        Route::post('/store', 'AnakController@store')->name('store');
        Route::get('/{id}/edit', 'AnakController@edit')->name('edit');
        Route::put('/{id}/update', 'AnakController@update')->name('update');
        Route::get('/{id}/donate', 'AnakController@donate')->name('donate');
        Route::get('/my-anak', 'AnakController@myAnak')->name('my_anak');
    });
    Route::group(['prefix' => 'laporan','as'=>'laporan.'], function () {
        Route::get('/{id}/show', 'LaporanController@show')->name('show');
        Route::get('/{id}/download','LaporanController@export')->name('export');
        Route::get('/{id}/{type}', 'LaporanController@index')->name('index');
        Route::get('/{id}/create/{type}', 'LaporanController@create')->name('create');
        Route::post('/{id}/store', 'LaporanController@store')->name('store');
        Route::get('/{id}/{id_laporan}/edit/{type}', 'LaporanController@edit')->name('edit');
        Route::put('/{id}/{id_laporan}/update', 'LaporanController@update')->name('update');
    });
    Route::group(['prefix' => 'proposal','as'=>'proposal.'], function () {
        Route::get('/', 'ProposalController@index')->name('index');
        Route::get('/show', 'ProposalController@show')->name('show');
        Route::post('{id}/verify','ProposalController@verify')->name('verify');
        Route::post('{id}/reject','ProposalController@reject')->name('reject');
    });
});
