<?php

class ArtikelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('Artikel.artikelauswahl');
	}


    public function getArtikel()
    {
        $data['articles']= DB::table('xartikel')->orderBy('ANR')->get();
        return View::make('Artikel.artikel',$data);
    }

    public function getArtikelgruppen()
    {
        $data['articles']= DB::table('xag')->orderBy('AGNR')->get();
        return View::make('Artikel.artikelgruppe',$data);
    }

    public function getArtikelmonatsstatistik()
    {
        $data['artstats']= DB::table('xview')->get();
        return View::make('Artikel.artikelmonatsstatistik',$data);
    }

    public function getArtikeleinkauf()
    {
        $data['articlesEK'] = DB::table('xartikel_ek')->orderBy('ANR')->get();
        $data['articles']= DB::table('xartikel')->orderBy('ANR')->get();
        return View::make('Artikel.artikeleinkauf',$data);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $id = Input::get('id');

        if( $id != "" && DB::table('xartikel')->where('ANR',$id)->pluck('ANR') == "") {

            $a0 = Input::get('a0');
            $ag = Input::get('ag');
            $cb = Input::get('cb');
            $ass = Input::get('ass');
            $vgs = Input::get('vgs');

            $artikel = new xartikel();
            $artikel->ANR = $id;
            $artikel->A0 = $a0;
            $artikel->AG = $ag;
            $artikel->CB = $cb;
            $artikel->ASS = $ass;
            $artikel->VGS = $vgs;
            $artikel->save();

            return Redirect::to('/Artikel/Artikelstamm')->with('alert', 'Artikel wurde gespeichert!');
        }

        else {
            return Redirect::to('/Artikel/Artikelstamm')->with('alert', 'Artikel konnte nicht gespeichert werden, da die Artikelnummer bereits vergeben bzw. nicht korrekt ist!');
        }
	}

    public function storegruppe()
    {
        $id = Input::get('id');

        if( $id != "" && DB::table('xag')->where('AGNR',$id)->pluck('AGNR') == "") {

            $agb = Input::get('agb');

            $artikel = new xag();
            $artikel->AGNR = $id;
            $artikel->AGBEZ = $agb;
            $artikel->save();

            return Redirect::to('/Artikel/Artikelgruppe')->with('alert', 'Artikelgruppe wurde gespeichert!');
        }

        else {
            return Redirect::to('/Artikel/Artikelgruppe')->with('alert', 'Artikelgruppe konnte nicht gespeichert werden, da die Artikelgruppennummer bereits vergeben bzw. nicht korrekt ist!');
        }
    }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
        $id = Input::get('oldID');
        $nid = Input::get('nid');

        if( $nid != "" && (DB::table('xartikel')->where('ANR',$nid)->pluck('ANR') == "" || $id == $nid)) {

            $a0 = Input::get('a0');
            $ag = Input::get('ag');
            $cb = Input::get('cb');
            $ass = Input::get('ass');
            $vgs = Input::get('vgs');


            DB::table('xartikel')->where('ANR', $id)->update(array(
                'ANR' => $nid,
                'A0' => $a0,
                'AG' => $ag,
                'CB' => $cb,
                'ASS' => $ass,
                'VGS' => $vgs
            ));

            return Redirect::to('/Artikel/Artikelstamm')->with('alert', 'Artikel wurde gespeichert!');
        }
        else
            return Redirect::to('/Artikel/Artikelstamm')->with('alert', 'Artikel konnte nicht gespeichert werden, da die Artikelnummer bereits vergeben bzw. nicht korrekt ist!');
	}

    public function updategruppe()
    {
        $id = Input::get('oldID');
        $nid = Input::get('nid');

        if( $nid != "" && (DB::table('xag')->where('AGNR',$nid)->pluck('AGNR') == "" || $id == $nid)) {

            $agb = Input::get('agb');

            DB::table('xag')->where('AGNR', $id)->update(array(
                'AGNR' => $nid,
                'AGBEZ' => $agb
            ));

            return Redirect::to('/Artikel/Artikelgruppe')->with('alert', 'Artikelgruppe wurde gespeichert!');
        }
        else
            return Redirect::to('/Artikel/Artikelgruppe')->with('alert', 'Artikelgruppe konnte nicht gespeichert werden, da die Artikelgruppennummer bereits vergeben bzw. nicht korrekt ist!');
    }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $artikel = DB::table('xartikel')->where('ANR',$id);
        $artikel->delete();

        return Redirect::to('/Artikel/Artikelstamm')->with('alert', 'Artikel wurde gelöscht!');
	}

    public function destroygruppe($id)
    {
        $artikel = DB::table('xag')->where('AGNR',$id);
        $artikel->delete();

        return Redirect::to('/Artikel/Artikelgruppe')->with('alert', 'Artikelgruppe wurde gelöscht!');
    }


}
