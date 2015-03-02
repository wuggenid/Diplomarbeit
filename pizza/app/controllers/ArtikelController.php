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
        $data['articles']= DB::table('xartikel')->get();
        return View::make('Artikel.artikel',$data);
    }


    public function getArtikelgruppen()
    {
        $data['articles']= DB::table('xartikel')->get();
        return View::make('Artikel.artikelgruppe',$data);
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
		//
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

        $a0 = Input::get('a0');
        $ag = Input::get('ag');
        $cb = Input::get('cb');
        $ass = Input::get('ass');
        $vgs = Input::get('vgs');


        DB::table('xartikel')->where('ANR',$id)->update(array(
            'ANR' => $nid,
            'A0' => $a0,
            'AG' => $ag,
            'CB' => $cb,
            'ASS' => $ass,
            'VGS' => $vgs
        ));

        return Redirect::to('/Artikel/Artikelstamm');
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

        return Redirect::to(url('/Artikel/Artikelstamm'));
	}

    public function deleteArtikel($id)
    {
        $artikel = DB::table('xartikel')->where('ANR',$id);
        $artikel->delete();

        return Redirect::to(url('/Artikel/Artikelstamm'));
    }


}
