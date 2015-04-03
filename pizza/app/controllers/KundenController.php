<?php

class KundenController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data['tel'] = "";
        if (Input::has('tel'))
            $data['tel'] = Input::get('tel');
		return View::make("Kunden.Kunden",$data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $tel = Input::get('tel');
        $vname = Input::get('vname');
        $nname = Input::get('nname');
        $str = Input::get('add');
        $ort = Input::get('ort');
        $if1 = Input::get('if1');
        $if2 = Input::get('if2');
        $rab = Input::get('rab');

        $kunde = new xadress();
        $kunde->TEL = $tel;
        $kunde->NA1 = $vname;
        $kunde->NA2 = $nname;
        $kunde->STR = $str;
        $kunde->ORT = $ort;
        $kunde->IF1 = $if1;
        $kunde->IF2 = $if2;
        $kunde->KRAB = $rab;
        $kunde->save();

        return Redirect::to('/Kunden/create');
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
        $oldTel = Input::get('oldTel');
        $tel = Input::get('tel');
        $vname = Input::get('vname');
        $nname = Input::get('nname');
        $str = Input::get('add');
        $ort = Input::get('ort');
        $if1 = Input::get('if1');
        $if2 = Input::get('if2');
        $rab = Input::get('rab');

        //$kunde = DB::table('xadress')->where('TEL','=',$tel)->get();
        DB::table('xadress')->where('TEL',$oldTel)->update(array(
            'TEL' => $tel,
            'NA1' => $vname,
            'NA2' => $nname,
            'STR' => $str,
            'ORT' => $ort,
            'IF1' => $if1,
            'IF2' => $if2,
            'KRAB' => $rab
        ));
        return Redirect::to('/Kunden/create');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        xadress::destroy($id);
        return Redirect::to('/');
	}
    public function printList()
    {
        return View::make('Kunden.print');
    }
    public function kundenSearch()
    {
        $vTel = "";
        $bTel = "";
        $vNam = "";
        $bNam = "";
        $vJum = "";
        $bJum = "";
        $vLbe = "";
        $bLbe = "";
        $vAbe = "";
        $bAbe = "";

        if (Input::has('vTel'))
            $vTel = Input::get('vTel');
        else
            $vTel = "0";

        if (Input::has('bTel'))
            $bTel = Input::get('bTel');
        else
            $bTel = "999999999999";

        $vNam = Input::get('vNam');
        $bNam = Input::get('bNam');

        if (Input::has('vJum'))
            $vJum = Input::get('vJum');
        else
            $vJum = "0";

        if (Input::has('bJum'))
            $bJum = Input::get('bJum');
        else
            $bJum = "999999999999";

        $vLbe = Input::get('vLbe');
        $bLbe = Input::get('bLbe');
        $vAbe = Input::get('vAbe');
        $bAbe = Input::get('bAbe');

        $kunden = DB::select(DB::raw('SELECT * FROM xadress WHERE (TEL >= '.$vTel.' AND TEL <= '.$bTel.') AND (JSUM >= '.$vJum.' AND JSUM <= '.$bJum));

        return Response::JSON($kunden);
    }
}
