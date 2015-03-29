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

        $lief = new xlief();
        $lief->LNAME = $name;
        $lief->LSTR = $str;
        $lief->LORT = $ort;
        $lief->LTEL1 = $tel1;
        $lief->LTEL2 = $tel2;
        $lief->LFAX = $faxnr;
        $lief->LANSPR1 = $ap1;
        $lief->LANSPR2 = $ap2;
        $lief->LLKON = $lk;
        $lief->LMEMO = $memo;
        $lief->save();
        return Redirect::to('/');
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

        $lief = xlief::find($id);
        $lief->LNAME = $name;
        $lief->LSTR = $str;
        $lief->LORT = $ort;
        $lief->LTEL1 = $tel1;
        $lief->LTEL2 = $tel2;
        $lief->LFAX = $faxnr;
        $lief->LANSPR1 = $ap1;
        $lief->LANSPR2 = $ap2;
        $lief->LLKON = $lk;
        $lief->LMEMO = $memo;
        $lief->save();
        return Redirect::to('/');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        xlief::destroy($id);
        return Redirect::to('/');
	}


}
