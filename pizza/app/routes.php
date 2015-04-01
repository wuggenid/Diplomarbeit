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
Route::get('/Kunden/destroy/{id}','KundenController@destroy');
Route::get('/Kunden/update','KundenController@update');
Route::get('/Kunden/store','KundenController@store');
Route::resource('/Kunden','KundenController');

//Artikel
Route::get('/Artikel/Artikelstamm', 'ArtikelController@getartikel');
Route::get('/Artikel/Artikelgruppe', 'ArtikelController@getartikelgruppen');
Route::get('/Artikel/Artikelstamm/delete/{id}','ArtikelController@destroy');
Route::get('/Artikel/Artikelstamm/update','ArtikelController@update');
Route::get('/Artikel/Artikelstamm/store','ArtikelController@store');
Route::get('/Artikel/Artikelgruppe/delete/{id}','ArtikelController@destroygruppe');
Route::get('/Artikel/Artikelgruppe/update','ArtikelController@updategruppe');
Route::get('/Artikel/Artikelgruppe/store','ArtikelController@storegruppe');
Route::get('/Artikel/Artikeleinkauf', 'ArtikelController@getartikeleinkauf');
Route::get('/Artikel/Artikeleinkauf/update','ArtikelController@updateeinkauf');
Route::get('/Artikel/Artikelmonatsstatistik', 'ArtikelController@getartikelmonatsstatistik');
Route::resource('/Artikel', 'ArtikelController');

//Personal
Route::get('/Personal/delete/{id}','PersonalController@destroy');
Route::get('/Personal/update','PersonalController@update');
Route::get('/Personal/store','PersonalController@store');
Route::resource('/Personal','PersonalController');

Route::get('/Login',function(){return View::make('login');});

//Lieferanten
Route::get('/Lieferanten/destroy/{id}','LieferantenController@destroy');
Route::get('/Lieferanten/update/{id}','LieferantenController@update');
Route::get('/Lieferanten/store','LieferantenController@store');
Route::resource('/Lieferanten','LieferantenController');

//Fahrer
Route::get('/Fahrer/storeSingleZeiterfassungValue','FahrerController@storeSingleZeiterfassungValue');
Route::get('/Fahrer/zeiterfassung','FahrerController@zeiterfassung');
Route::get('/Fahrer/storeSingleRechnungenZuordnenValue','FahrerController@storeSingleRechnungenZuordnenValue');
Route::get('/Fahrer/rechnungenZuordnen','FahrerController@rechnungenZuordnen');
Route::resource('/Fahrer','FahrerController');

//Bons
Route::get('/Bons/Stammdaten', 'BonController@getbons');
Route::get('/Bons/Stammdaten/delete/{id}','BonController@destroy');
Route::get('/Bons/Stammdaten/update','BonController@update');
Route::get('/Bons/Stammdaten/store','BonController@store');
Route::get('/Bons/Tageseingabe', 'BonController@gettageseingabe');
Route::resource('/Bons','BonController');

//API
Route::group(['prefix' => '/api'], function() {
    Route::get('searchNumber','APIController@searchNumber');
    Route::get('searchName','APIController@searchName');
    Route::get('searchKName','APIController@searchKName');
    Route::get('getArtikel','APIController@getArtikel');
    Route::get('getArtikelG','APIController@getArtikelg');
    Route::get('getArtikelEK','APIController@getArtikelEK');
    Route::get('getBon','APIController@getBon');
    Route::get('searchYear','APIController@searchYear');
    Route::get('getLastBillNumber','APIController@getLastBillnumber');
    Route::get('getOrdersPerYear','APIController@getOrdersPerYear');
    Route::get('getLastOrder','APIController@getLastOrder');
    Route::get('getNumberCount','APIController@getNumberCount');
    Route::get('getSupplier','APIController@getSupplier');
    Route::get('getSupplierName','APIController@getSupplierName');
    Route::get('searchSupplier','APIController@searchSupplier');
    Route::get('getUmsatzPerYear','APIController@getUmsatzPerYear');
});