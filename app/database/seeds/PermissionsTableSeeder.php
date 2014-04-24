<?php

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = array(
            array( // 1
                'name'         => 'manage_news',
                'display_name' => 'manage news'
            ),
            array( // 2
                'name'         => 'manage_introduction',
                'display_name' => 'manage introduction'
            ),
            array( // 3
                'name'         => 'manage_bussiness',
                'display_name' => 'manage bussiness'
            ),
            array( // 4
                'name'         => 'manage_recruit',
                'display_name' => 'manage recruit'
            ),
            array( // 5
                'name'         => 'manage_users',
                'display_name' => 'manage users'
            ),
            array( // 6
                'name'         => 'manage_roles',
                'display_name' => 'manage roles'
            ),
        );

        DB::table('permissions')->insert( $permissions );

        DB::table('permission_role')->delete();

        $role_id_admin = Role::where('name', '=', 'admin')->first()->id;
        $permission_base = (int)DB::table('permissions')->first()->id - 1;

        $permissions = array(
            array(
                'role_id'       => $role_id_admin,
                'permission_id' => $permission_base + 1
            ),
            array(
                'role_id'       => $role_id_admin,
                'permission_id' => $permission_base + 2
            ),
            array(
                'role_id'       => $role_id_admin,
                'permission_id' => $permission_base + 3
            ),
            array(
                'role_id'       => $role_id_admin,
                'permission_id' => $permission_base + 4
            ),
            array(
                'role_id'       => $role_id_admin,
                'permission_id' => $permission_base + 5
            ),
            array(
                'role_id'       => $role_id_admin,
                'permission_id' => $permission_base + 6
            ),
        );

        DB::table('permission_role')->insert( $permissions );
    }

}