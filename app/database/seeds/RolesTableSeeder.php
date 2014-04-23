<?php

use \User\Role;
use \User\User;

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->save();

        $user = User::where('username','=','admin')->first();
        $user->attachRole( $adminRole );
    }

}
