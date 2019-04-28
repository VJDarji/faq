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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'questions' => 'QuestionController',
]);

Route::get('/profile','ProfileController@index')->middleware('auth')->name('profile');
Route::get('/profile/form', 'ProfileController@profileForm')->middleware('auth')->name('profile.form');
Route::post('/profile/create', 'ProfileController@create')->middleware('auth')->name('profile.create');
Route::patch('/profile/edit', 'ProfileController@edit')->middleware('auth')->name('profile.edit');
