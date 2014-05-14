<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $adminRole = new Role();
        $adminRole->name = 'administrators';
        $adminRole->save();

        $hrRole = new Role();
        $hrRole->name = 'hrs';
        $hrRole->save();

        $auditRole = new Role();
        $auditRole->name = 'audits';
        $auditRole->save();

        $infoRole = new Role();
        $infoRole->name = 'infos';
        $infoRole->save();

//        $user = User::where('username','=','admin')->first();
//        $user->attachRole( $adminRole );
//
//        $user = User::where('username','=','hr')->first();
//        $user->attachRole( $hrRole );
//
//        $user = User::where('username','=','info')->first();
//        $user->attachRole( $infoRole );
//
//        $user = User::where('username','=','audit')->first();
//        $user->attachRole( $auditRole );
    }

}
