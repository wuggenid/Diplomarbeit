<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return View::make('start');
});

Route::resource('/Bestellungen', 'BestellungenController');
Route::resource('/Testview','TestController');
Route::resource('/Kunden','KundenController');
Route::get('/Artikel', function(){return View::make('artikel');});

Route::group(['prefix' => '/api'], function() {
    Route::get('searchNumber','APIController@searchNumber');
});