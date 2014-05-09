<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $adminRole = new Role();
        $adminRole->name = 'administrators';
        $adminRole->save();

        $createRole = new Role();
        $createRole->name = 'creaters';
        $createRole->save();

        $deleteRole = new Role();
        $deleteRole->name = 'deleters';
        $deleteRole->save();

        $user = User::where('username','=','admin')->first();
        $user->attachRole( $adminRole );

        $user = User::where('username','=','user')->first();
        $user->attachRole( $createRole );

        $user = User::where('username','=','deleter')->first();
        $user->attachRole( $deleteRole );
    }

}
