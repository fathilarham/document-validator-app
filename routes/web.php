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

Route::get('/', 'HomeController@index');
Route::get('/contact-us', 'HomeController@showContactUs');

Route::group(['prefix' => 'app'], function () {
    Route::get('/', 'AppController@showDashboard');

    Route::get('/register-document', 'AppController@showRegisterDocument');
    Route::post('/register-document', 'AppController@registerDocuments');
});

Route::get('/check-document', function () {
    return 'h1';
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
