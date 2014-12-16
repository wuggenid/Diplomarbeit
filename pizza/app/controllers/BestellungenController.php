<?php

class BestellungenController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
<<<<<<< HEAD
        return View::make('bestellungen');
=======
        $data['articles']= DB::table('xartikel')->get();
        $data['addresses']= DB::table('xadress')->get();

        $data['title'] = "Bestellungen";
        return View::make('bestellung',$data);
>>>>>>> 579b2111119b8d34f36c51292bc481b90baa8926
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
        $bestellung = Bestellung::find($id);
        $data['title'] = "Bestellung: ".$id;
		return View::make('bestellung',$data)->with('bestellung',$bestellung);
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


}
