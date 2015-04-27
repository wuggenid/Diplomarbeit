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
        $user->username = '11210512212297';
        $user->password = Hash::make('');
        $user->save();

        $user = new User;
        $user->username = '102101106';
        $user->password = Hash::make('');
        $user->save();

        $user = new User;
        $user->username = '514949585549';
        $user->password = Hash::make('');
        $user->save();

        $user = new User;
        $user->username = 'pizza';
        $user->password = Hash::make('');
        $user->save();
    }

}
