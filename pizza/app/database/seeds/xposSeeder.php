<?php

class BestellungenSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0;$i<5;$i++)
        {
            $xpos = new xpos();
            $xpos->RNR = -1;
            $xpos->PNR = -1;
            $xpos->GM = -1;
            $xpos->ANR = -1;
            $xpos->A0 = "Testbezeichnung";
            $xpos->CB = -1;
            $xpos->SU = -1;
            $xpos->RNR = -1;
            $xpos->save();
        }
    }

}
