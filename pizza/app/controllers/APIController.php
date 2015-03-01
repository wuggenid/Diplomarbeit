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
    function getOrdersPerYear()
    {
        $tel = Input::get('tel');
        $ordersPerYear = DB::select(DB::raw('SELECT count(*) as ordersPerYear FROM `xstamm` WHERE TEL = '.$tel.' AND year(RDT) = year(now())-6'))[0]->ordersPerYear;   //Year is 2009, edit it later when you have access to a newer database
        return $ordersPerYear;
    }
    function getLastOrder()
    {
        $tel = Input::get('tel');
        $lastOrder = DB::select(DB::raw('SELECT DATE_FORMAT(RDT,\'%e.%m.%Y\') as RDT FROM `xstamm` WHERE TEL = \''.$tel.'\' ORDER BY unix_timestamp(date(RDT)) DESC, time(RZT) DESC LIMIT 1'));
        if (count($lastOrder) > 0)
        {
            $lastOrder = $lastOrder[0]->RDT;
            return $lastOrder;
        }
        else
        {
            return;
        }
    }
}