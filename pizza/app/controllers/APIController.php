<?php

class ApiController extends BaseController {

    function searchNumber()
    {
        $number = '%'.Input::get('number').'%';
        return Response::json(xadress::where('TEL','like',$number)->get());
    }
    function getArtikel()
    {
        $artikel = Input::get('artikel');
        return Response::json(xartikel::where('ANR',$artikel)->get());
    }
    function getLastBillNumber()
    {
        $rechnungsnummer =  DB::table('xpos')->where('RNR', DB::raw("(select max(`RNR`) from xpos)"))->get()[0]->RNR;
        return $rechnungsnummer;
    }
}