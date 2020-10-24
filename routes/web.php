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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'anak','as'=>'anak.'], function () {
        Route::get('/', 'AnakController@index')->name('index');
        Route::get('/create', 'AnakController@create')->name('create');
        Route::post('/store', 'AnakController@store')->name('store');
        Route::get('/{id}/edit', 'AnakController@edit')->name('edit');
        Route::put('/{id}/update', 'AnakController@update')->name('update');
    });
    Route::group(['prefix' => 'laporan','as'=>'laporan.'], function () {
        Route::get('/{id}', 'LaporanController@index')->name('index');
        Route::get('/{id}/create', 'LaporanController@create')->name('create');
        Route::post('/{id}/store', 'LaporanController@store')->name('store');
        Route::get('/{id}/{id_laporan}/edit', 'LaporanController@edit')->name('edit');
        Route::put('/{id}/{id_laporan}/update', 'LaporanController@update')->name('update');
    });
    
});
