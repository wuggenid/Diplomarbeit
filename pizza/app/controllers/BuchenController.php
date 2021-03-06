<?php

class BuchenController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('Buchen.buchenauswahl');
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

    public function stornos()
    {
        $lastBills = xstamm::take(10)->orderBy('RNR','DESC')->get();
        for ($i = 0;$i<count($lastBills);$i++)
        {
            $kName = xadress::find($lastBills[$i]->TEL);
            $lastBills[$i]->Name = $kName->NA1." ".$kName->NA2;
        }
        return View::make('Buchen.stornos')->with('lastBills',$lastBills);
    }
    public function changeStorno()
    {
        $storno = Input::get('int');
        $rnr = Input::get('rnr');
        xstamm::where('RNR','=',$rnr)->update(array('INT'=>$storno));
    }

}
