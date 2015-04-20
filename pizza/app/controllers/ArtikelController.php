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
        $data['artstats']= DB::table('xview')->where('JJJJ', 9999)->get();
        return View::make('Artikel.artikelmonatsstatistik',$data);
    }

    public function searchYear()
    {
        $year = Input::get('year');
        $data['artstats']= DB::table('xview')->where('JJJJ', $year)->get();
        $data['articles']=DB::table('xartikel')->get();
        return View::make('Artikel.artikelmonatsstatistik',$data);
    }

    public function getArtikeleinkauf()
    {
        $data['articles']= DB::table('xartikel')->orderBy('ANR')->get();
        $data['lieferanten']= DB::table('xlief')->orderBy('LNR')->get();

        /*
        $data['articlesEK'] = DB::table('xartikel_ek')->orderBy('ANR')->get();

        foreach ($data['articlesEK'] as $aek) {
            foreach ($data['articles'] as $a)
            {
                if($aek->ANR == $a->ANR) {
                    $aek->A0 = $a->A0;
                }
            }
        }
        */

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

    public function updateeinkauf()
    {
        $id = Input::get('ID');

        $l1nr = Input::get('l1nrE');
        $l1preis = Input::get('l1preisE');
        $l1dat = Input::get('l1datE');

        $l2nr = Input::get('l2nrE');
        $l2preis = Input::get('l2preisE');
        $l2dat = Input::get('l2datE');

        $l3nr = Input::get('l3nrE');
        $l3preis = Input::get('l3preisE');
        $l3dat = Input::get('l3datE');

        $l4nr = Input::get('l4nrE');
        $l4preis = Input::get('l4preisE');
        $l4dat = Input::get('l4datE');

        DB::table('xartikel_ek')->where('ANR', $id)->update(array(
            'L1NR' => $l1nr,
            'L1PREIS' => $l1preis,
            'L1DAT' => $l1dat,
            'L2NR' => $l2nr,
            'L2PREIS' => $l2preis,
            'L2DAT' => $l2dat,
            'L3NR' => $l3nr,
            'L3PREIS' => $l3preis,
            'L3DAT' => $l3dat,
            'L4NR' => $l4nr,
            'L4PREIS' => $l4preis,
            'L4DAT' => $l4dat
        ));

        return Redirect::to('/Artikel/Artikeleinkauf')->with('alert', 'Artikeleinkauf wurde gespeichert!');
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
