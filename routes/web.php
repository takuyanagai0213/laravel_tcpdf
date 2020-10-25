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

Route::get('/pdf', 'DocumentController@index');
// Route::post('/pdf', 'DocumentController@postHoge');
Route::get('/createPDFdata', 'DocumentController@createPDFdata');
Route::post('/createPDF', 'DocumentController@createPDF');
Route::post('/downloadPDF', 'DocumentController@downloadPDF');

Route::get('/pdf_edit', 'DocumentController@edit');
Route::get('/profile', 'DocumentController@get_profile');
Route::get('/getConference', 'conf@getConference'); 