<?php

class BestellungenController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('bestellungauswahl');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data['title'] = "Neue Bestellung";
        $date['mode'] = 'new';
		return View::make("bestellung",$data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        /*$bestellung = Bestellung::find($id);
        $data['title'] = "Bestellung: ".$id;
		return View::make('bestellung',$data)->with('bestellung',$bestellung);*/
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
    public function storeSingleValue()
    {
        $GM = Input::get('GM');
        $ANR = Input::get('ANR');
        $A0 = Input::get('A0');
        $CB = Input::get('CB');
        $SU = Input::get('SU');

        $xpos = new xpos();
        $xpos->GM = $GM;
        $xpos->ANR = $ANR;
        $xpos->A0 = $A0;
        $xpos->CB = $CB;
        $xpos->SU = $SU;
        $xpos->save();
    }

}
