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

Route::group(['prefix' => 'app', 'middleware' => 'auth'], function () {
    Route::get('/', 'AppController@showDashboard');

    Route::get('/register-document', 'AppController@showRegisterDocument');
    Route::post('/register-document', 'AppController@registerDocuments');

    Route::get('/folders', 'AppController@showFolder');
    Route::get('/folder/download/{id}', 'AppController@downloadFolder');
    Route::get('/folder/delete/{id}', 'AppController@deleteFolder');
    Route::get('/documents', 'AppController@showAllDocuments');
    Route::get('/documents/{folderId}', 'AppController@showFolderDocuments');
    Route::get('/document/download/{id}', 'AppController@downloadDocument');
    Route::get('/document/delete/{id}', 'AppController@deleteDocument');
});

Route::get('/check-document/{code}', 'HomeController@showCheckDocument');
Route::post('/check-document/{code}', 'HomeController@checkDocument');

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/home', 'HomeController@index')->name('home');
