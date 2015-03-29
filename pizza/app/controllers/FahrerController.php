<?php

class FahrerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('Fahrer.fahreruebersicht');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
		//
	}

    public function rechnungenZuordnen()
    {
        $personal = xpersonal::all();
        $ohneFahrer = DB::select(DB::raw('SELECT * FROM xstamm WHERE FAHR IS NULL order by unix_timestamp(RDT) DESC'));
        return View::make('Fahrer.rechnungenZuordnen')->with('personal',$personal)->with('ohneFahrer',$ohneFahrer);
    }
    public function storeSingleRechnungenZuordnenValue()
    {
        $rnr = Input::get('RNR');
        $pkz = Input::get('PKZ');
        DB::table('xstamm')->where('RNR',$rnr)->update(array('FAHR'=>$pkz));
    }

    public function zeiterfassung()
    {
        $personal = xpersonal::all();
        $ohneZeit = DB::select(DB::raw('SELECT * FROM `xfahrer` WHERE BEG IS NULL order by unix_timestamp(DAT) DESC'));
        return View::make('Fahrer.zeiterfassung')->with('personal',$personal)->with('ohneZeit',$ohneZeit);
    }
}
