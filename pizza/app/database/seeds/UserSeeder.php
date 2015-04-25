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
        $user->username = 'admin';
        $user->password = Hash::make('11210512212297');
        $user->save();

        $user = new User;
        $user->username = 'admin';
        $user->password = Hash::make('102101106');
        $user->save();

        $user = new User;
        $user->username = 'admin';
        $user->password = Hash::make('514949585549');
        $user->save();
    }

}
