<?php

class BonController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('Bons.bonauswahl');
	}

    public function getBons()
    {
        $data['bons']= DB::table('xbonstamm')->get();
        return View::make('Bons.stammdaten',$data);
    }

    public function gettageseingabe()
    {
        $data['bons']= DB::table('xbonstamm')->get();
        return View::make('Bons.bontageseingabe',$data);
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
        $id = Input::get('id');
        $bezeichnung = Input::get('typ');

        if( $id != "" && DB::table('xbonstamm')->where('TEL',$id)->pluck('TEL') == "") {

            if ( $bezeichnung != "" && DB::table('xbonstamm')->where('TYP',$bezeichnung)->pluck('TYP') == "") {
                $preis = Input::get('preis');

                $bon = new xbonstamm();
                $bon->TEL = $id;
                $bon->TYP = $bezeichnung;
                $bon->EP = $preis;
                $bon->save();

                return Redirect::to('/Bons/Stammdaten')->with('alert', 'Bon wurde gespeichert!');
            }
            else
                return Redirect::to('/Bons/Stammdaten')->with('alert', 'Bon konnte nicht gespeichert werden, da die Bonbezeichnung bereits vergeben bzw. nicht korrekt ist!');
        }

        else {
            return Redirect::to('/Bons/Stammdaten')->with('alert', 'Bon konnte nicht gespeichert werden, da die Telefonnummer bereits vergeben bzw. nicht korrekt ist!');
        }
	}

    public function storeTageseingabe()
    {
        $data = Input::get('data');

        foreach ($data as $dat)
        {
            $test = var_dump($dat);
            return Redirect::to($test);
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
        $bezeichnung = Input::get('typ');
        $nbezeichnung = Input::get('ntyp');


        if( $nid != "" && (DB::table('xbonstamm')->where('TEL',$nid)->pluck('TEL') == "" || $id == $nid)) {

            if ( $nbezeichnung != "" && DB::table('xbonstamm')->where('TYP',$nbezeichnung)->pluck('TYP') == "" || $bezeichnung == $nbezeichnung) {
                $preis = Input::get('preis');

                DB::table('xbonstamm')->where('TEL', $id)->update(array(
                    'TEL' => $nid,
                    'TYP' => $nbezeichnung,
                    'EP' => $preis
                ));

                return Redirect::to('/Bons/Stammdaten')->with('alert', 'Bon wurde gespeichert!');
            }
            else
                return Redirect::to('/Bons/Stammdaten')->with('alert', 'Bon konnte nicht gespeichert werden, da die Bonbezeichnung bereits vergeben bzw. nicht korrekt ist!');
        }

        else
            return Redirect::to('/Bons/Stammdaten')->with('alert', 'Bon konnte nicht gespeichert werden, da die Telefonnummer bereits vergeben bzw. nicht korrekt ist!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $bon = DB::table('xbonstamm')->where('TEL',$id);
        $bon->delete();

        return Redirect::to('/Bons/Stammdaten')->with('alert', 'Bon wurde gelöscht!');
	}


}
