<?php

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->email = 'Eduardo@eduardo.com';
        $user->save();
    }

}
