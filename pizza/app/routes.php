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

//Bestellungen
Route::get('/Bestellungen/letzteAnrufe','BestellungenController@letzteAnrufe');
Route::get('/Bestellungen/storeSingleValue','BestellungenController@storeSingleValue');
Route::resource('/Bestellungen', 'BestellungenController');

//Testing
Route::resource('/Testview','TestController');

//Kunden
Route::get('/Kunden/update','KundenController@update');
Route::get('/Kunden/store','KundenController@store');
Route::resource('/Kunden','KundenController');

//Artikel
Route::get('/Artikel/Artikelstamm', 'ArtikelController@getartikel');
Route::get('/Artikel/Artikelstamm/delete/{id}','ArtikelController@destroy');
Route::get('/Artikel/Artikelstamm/update','ArtikelController@update');
Route::get('/Artikel/Artikelstamm/store','ArtikelController@store');
Route::get('/Artikel/Artikelgruppe', 'ArtikelController@getartikelgruppen');
Route::resource('/Artikel', 'ArtikelController');

//Personal
Route::resource('/Personal','PersonalController');

Route::get('/Login',function(){return View::make('login');});

//Lieferanten
Route::resource('/Lieferanten','LieferantenController');

//Fahrer
Route::get('/Fahrer/rechnungenZuordnen','FahrerController@rechnungenZuordnen');
Route::resource('/Fahrer','FahrerController');

//API
Route::group(['prefix' => '/api'], function() {
    Route::get('searchNumber','APIController@searchNumber');
    Route::get('getArtikel','APIController@getArtikel');
    Route::get('getLastBillNumber','APIController@getLastBillnumber');
    Route::get('getOrdersPerYear','APIController@getOrdersPerYear');
    Route::get('getLastOrder','APIController@getLastOrder');
});