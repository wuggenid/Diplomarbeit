<?php

class ApiController extends BaseController {

    function searchNumber()
    {
        $number = '%'.Input::get('number').'%';
        return Response::json(xadress::where('TEL','like',$number)->get());
    }
    function searchName()
    {
        $name = '%'.Input::get('name').'%';
        return Response::json(xpersonal::where('VNAM','like',$name)->get());
    }
    function searchKName()
    {
        $kname = '%'.Input::get('kname').'%';
        return Response::json(xpersonal::where('PKZ','like',$kname)->get());
    }

    function getArtikel()
    {
        $artikel = Input::get('artikel');
        return Response::json(xartikel::where('ANR','=',$artikel)->get());
    }
    function getArtikelG()
    {
        $artikelg = Input::get('artikelg');
        return Response::json(xag::where('AGNR','=',$artikelg)->get());
    }
    function getArtikelEK()
    {
        $artikelek = Input::get('artikelek');
        $lieferanten = Response::json(xartikelek::where('ANR','=',$artikelek)->get());
        return $lieferanten;
    }
    function searchYear()
    {
        $year = Input::get('year');
        return Response::json(xview::where('JJJJ','=',$year)->get());
    }
    function getBon()
    {
        $bon = Input::get('bon');
        return Response::json(xbonstamm::where('TEL','=',$bon)->get());
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
    function getNumberCount()
    {
        $number = Input::get('number');
        return Response::json(xadress::where('TEL','=',$number)->count());
    }
    function getSupplier()
    {
        $lnr = Input::get('lnr');
        return Response::json(xlief::find($lnr));
    }
    function getSupplierName()
    {
        $l1nr = Input::get('l1nr');
        $lieferanten = Response::json(xlief::where('LNR','=',$l1nr)->pluck('LNAME'));
        return $lieferanten;
    }
    function searchSupplier()
    {
        $name = '%'.Input::get('name').'%';
        return Response::json(xlief::where('LNAME','like',$name)->get());
    }
    function getUmsatzPerYear()
    {
        $tel = Input::get('tel');
        $umsatzperyear = DB::select(DB::raw("SELECT sum(RSU) as sum FROM `xstamm` WHERE `TEL` = ".$tel." AND YEAR(`RDT`) =2009"))[0]->sum;
        if ($umsatzperyear == "")
            $umsatzperyear = 0;
        return $umsatzperyear;
    }
    function makePrintJob()
    {
        $htmlToPrint = Input::get('htmlToPrint');
        $pdf = App::make('dompdf');
        $pdf->loadHTML($htmlToPrint);
        return $pdf->stream();
    }
    function getBill()
    {
        $rnr = Input::get('rnr');
        $bill = xstamm::find($rnr);
        $name = xadress::find($bill->TEL);
        $bill->Name = $name->NA1." ".$name->NA2;
        $bill->Str = $name->STR;
        $bill->RDT = date('d.m.Y',strtotime($bill->RDT));
        $bill->RZT = date('H:i:s',strtotime($bill->RZT));
        return Response::JSON($bill);
    }
    function searchBills()
    {
        $rnr = Input::get('rnr');
        $bills = xstamm::where('RNR','like',$rnr."%")->take(10)->get();
        for ($i = 0;$i<count($bills);$i++)
        {
            $name = xadress::find($bills[$i]->TEL);
            $bills[$i]->Name = $name->NA1." ".$name->NA2;
            $bills[$i]->Str = $name->STR;
            $bills[$i]->RDT = date('d.m.Y',strtotime($bills[$i]->RDT));
            $bills[$i]->RZT = date('H:i:s',strtotime($bills[$i]->RZT));
        }
        return Response::JSON($bills);
    }

    function searchKunde()
    {
        $name = '%'.Input::get('number').'%';
        return Response::json(xadress::where('NA1','like',$name)->orWhere('NA2','like',$name)->get());
    }
}