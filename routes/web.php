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

Route::prefix('platforms')->group(function () {
    Route::match(['get', 'post'], '/', 'PlatformController@index')->name('platforms.index');
    Route::get('/create', 'PlatformController@create')->name('platforms.create');
    Route::post('/store', 'PlatformController@store')->name('platforms.store');
    Route::get('/{platform}/edit', 'PlatformController@edit')->name('platforms.edit');
    Route::post('/{platform}/update', 'PlatformController@update')->name('platforms.update');
    Route::delete('/{platform}/delete', 'PlatformController@delete')->name('platforms.delete');
});

Route::prefix('directors')->group(function () {
    Route::match(['get', 'post'], '/', 'DirectorController@index')->name('directors.index');
    Route::get('/create', 'DirectorController@create')->name('directors.create');
    Route::post('/store', 'DirectorController@store')->name('directors.store');
    Route::get('/{director}/edit', 'DirectorController@edit')->name('directors.edit');
    Route::post('/{director}/update', 'DirectorController@update')->name('directors.update');
    Route::delete('/{director}/delete', 'DirectorController@delete')->name('directors.delete');
});

Route::prefix('actors')->group(function () {
    Route::match(['get', 'post'], '/', 'ActorController@index')->name('actors.index');
    Route::get('/create', 'ActorController@create')->name('actors.create');
    Route::post('/store', 'ActorController@store')->name('actors.store');
    Route::get('/{actor}/edit', 'ActorController@edit')->name('actors.edit');
    Route::post('/{actor}/update', 'ActorController@update')->name('actors.update');
    Route::delete('/{actor}/delete', 'ActorController@delete')->name('actors.delete');
});

Route::prefix('languages')->group(function () {
    Route::match(['get', 'post'], '/', 'LanguageController@index')->name('languages.index');
    Route::get('/create', 'LanguageController@create')->name('languages.create');
    Route::post('/store', 'LanguageController@store')->name('languages.store');
    Route::get('/{language}/edit', 'LanguageController@edit')->name('languages.edit');
    Route::post('/{language}/update', 'LanguageController@update')->name('languages.update');
    Route::delete('/{language}/delete', 'LanguageController@delete')->name('languages.delete');
});

Route::prefix('nationalities')->group(function () {
    Route::match(['get', 'post'], '/', 'NationalityController@index')->name('nationalities.index');
    Route::get('/create', 'NationalityController@create')->name('nationalities.create');
    Route::post('/store', 'NationalityController@store')->name('nationalities.store');
    Route::get('/{nationality}/edit', 'NationalityController@edit')->name('nationalities.edit');
    Route::post('/{nationality}/update', 'NationalityController@update')->name('nationalities.update');
    Route::delete('/{nationality}/delete', 'NationalityController@delete')->name('nationalities.delete');
});
