<?php

class LieferantenController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $lieferanten = xlief::all();
        return View::make('Lieferanten.lieferanten')->with('lieferanten',$lieferanten);
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
		$number = Input::get('number');
        $name = Input::get('name');
        $str = Input::get('str');
        $ort = Input::get('ort');
        $ap1 = Input::get('ap1');
        $tel1 = Input::get('tel1');
        $faxnr = Input::get('faxnr');
        $ap2 = Input::get('ap2');
        $tel2 = Input::get('tel2');
        $lk = Input::get('lk');
        $memo = Input::get('memo');
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


}
