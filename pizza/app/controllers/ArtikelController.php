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
        return View::make('Artikel.artikel',$data);
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
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        return Redirect::to(url('http://www.google.at'));
        $artikel = xartikel::find($id);
        $artikel->delete();

        return Redirect::to(url('/Artikel'));
	}


}
