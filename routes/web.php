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

Route::get('/', 'GuestController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('translation', 'TranslationController');
Route::resource('term', 'TermController');

Route::get('/search/translation', 'TranslationController@search')->name('translation.search');
Route::post('/search/translation', 'TranslationController@query')->name('translation.query');

Route::get('/list/term', 'TermController@list')->name('term.list');
Route::get('/list/translation', 'TranslationController@list')->name('translation.list');
