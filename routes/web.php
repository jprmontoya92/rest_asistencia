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

Route::get('/','HomeController@index');
Route::get('getesta','HomeController@getEstablecimientos');
Route::get('getubi','HomeController@getUbicaciones');

Route::post('home-scan','IdentifierController@index')->name('homescan');
Route::get('get-qr','IdentifierController@getCodigoScan')->name('getqr');
