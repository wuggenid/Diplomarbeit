<?php

class xfahrerSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0;$i<5;$i++)
        {
            $xfahrer = new xfahrer();
            $xfahrer->PKZ = 'tes';
            $xfahrer->DAT = "2015-".$i."-04 00:00:00";
            $xfahrer->save();
        }
    }

}
