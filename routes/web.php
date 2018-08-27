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
Route::post('/language', array(
    'Middleware'=> 'LanguageSwicher',
    'uses' => 'LocalizationController@index'));
Route::middleware('web')->group(function () {
    Route::get('/', 'LoginController@index')->name('home');
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/manage_users', 'AdminController@manageUsers')->name('users');
    Route::get('/notice', 'AdminController@notice')->name('notice');
    Route::get('/setting', 'AdminController@setting')->name('setting');
    
    Route::get('users/logout', 'LoginController@logout');
    Route::post('users/signup', 'LoginController@signup');
    Route::post('users/authenticate', 'LoginController@authenticate');
    Route::post('users/search', 'AdminController@search');
    Route::post('app/login', 'LoginController@searchUser');
    Route::post('services/lang', 'ApiController@ChangeLang');
    Route::post('services/firebase_update', 'AdminController@UpdateFirebase');
    Route::post('mail-image', 'ApiController@MailImage');

    Route::get('auth/{provider}', 'LoginController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'LoginController@handleProviderCallback');
});
  
