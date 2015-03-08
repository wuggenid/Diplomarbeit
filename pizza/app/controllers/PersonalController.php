<?php

class PersonalController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data['personal']= DB::table('xpersonal')->get();
        return View::make('Personal.personal',$data);
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

        if( $id != "" && DB::table('xpersonal')->where('PKZ',$id)->pluck('PKZ') == "") {

            $vname = Input::get('vname');
            $nname = Input::get('nname');
            $add = Input::get('add');
            $ort = Input::get('ort');
            $tel = Input::get('tel');
            $soz = Input::get('soz');
            $geb = Input::get('geb');
            $edat = Input::get('edat');
            $adat = Input::get('adat');
            $lohn = Input::get('lohn');
            $konto = Input::get('konto');
            $bank = Input::get('bank');
            $utag = Input::get('utag');
            $ktag = Input::get('ktag');
            $memo = Input::get('memo');


            $person = new xpersonal();
            $person->PKZ = $id;
            $person->VNAM = $vname;
            $person->NNAM = $nname;
            $person->PSTR = $add;
            $person->PORT = $ort;
            $person->PTEL = $tel;
            $person->SOZNR = $soz;
            $person->GEBTAG = $geb;
            $person->EIN = $edat;
            $person->AUS = $adat;
            $person->LOHN = $lohn;
            $person->KONTO = $konto;
            $person->BANK = $bank;
            $person->URLAUB = $utag;
            $person->KRANK = $ktag;
            $person->MEMO = $memo;
            $person->save();

            return Redirect::to('/Personal')->with('alert', 'Personal wurde gespeichert!');
        }

        else {
            return Redirect::to('/Personal')->with('alert', 'Personal konnte nicht gespeichert werden, da die Personalnummer bereits vergeben bzw. nicht korrekt ist!');
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

        if( $nid != "" && (DB::table('xpersonal')->where('PKZ',$nid)->pluck('PKZ') == "" || $id == $nid)) {

            $vname = Input::get('vname');
            $nname = Input::get('nname');
            $add = Input::get('add');
            $ort = Input::get('ort');
            $tel = Input::get('tel');
            $soz = Input::get('soz');
            $geb = Input::get('geb');
            $edat = Input::get('edat');
            $adat = Input::get('adat');
            $lohn = Input::get('lohn');
            $konto = Input::get('konto');
            $bank = Input::get('bank');
            $utag = Input::get('utag');
            $ktag = Input::get('ktag');
            $memo = Input::get('memo');


            DB::table('xpersonal')->where('PKZ', $id)->update(array(
                'PKZ' => $nid,
                'VNAM' => $vname,
                'NNAM' => $nname,
                'PSTR' => $add,
                'PORT' => $ort,
                'PTEL' => $tel,
                'SOZNR' => $soz,
                'GEBTAG' => $geb,
                'EIN' => $edat,
                'AUS' => $adat,
                'LOHN' => $lohn,
                'KONTO' => $konto,
                'BANK' => $bank,
                'URLAUB' => $utag,
                'KRANK' => $ktag,
                'MEMO' => $memo
            ));

            return Redirect::to('/Personal')->with('alert', 'Personal wurde gespeichert!');
        }
        else
            return Redirect::to('/Personal')->with('alert', 'Personal konnte nicht gespeichert werden, da die Personalnummer bereits vergeben bzw. nicht korrekt ist!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $person = DB::table('xpersonal')->where('PKZ',$id);
        $person->delete();

        return Redirect::to('/Personal')->with('alert', 'Personal wurde gelöscht!');
	}


}
