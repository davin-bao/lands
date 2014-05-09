<?php

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = array(
            array( // 1
                'name'         => 'manage_users',
                'display_name' => 'manage users'
            ),
            array( // 2
                'name'         => 'manage_roles',
                'display_name' => 'manage roles'
            ),
            array( // 3
                'name'         => 'manage_infos',
                'display_name' => 'manage infos'
            ),
            array( // 4
                'name'         => 'manage_settings',
                'display_name' => 'manage settings'
            ),
            array( // 5
                'name'         => 'manage_businesses',
                'display_name' => 'manage businesses'
            ),
            array( // 6
                'name'         => 'manage_recruits',
                'display_name' => 'manage recruits'
            ),
            array( // 7
                'name'         => 'manage_carousels',
                'display_name' => 'manage carousels'
            ),
            array( // 8
              'name'         => 'manage_flows',
              'display_name' => 'manage flows'
            ),
            array( // 9
              'name'         => 'create_infos',
              'display_name' => 'create infos'
            ),
            array( // 10
              'name'         => 'create_recruits',
              'display_name' => 'create recruits'
            ),
            array( // 11
              'name'         => 'delete_infos',
              'display_name' => 'delete infos'
            ),
            array( // 12
              'name'         => 'delete_recruits',
              'display_name' => 'delete recruits'
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
            array(
              'role_id'       => $role_id_admin,
              'permission_id' => $permission_base + 7
            ),
            array(
              'role_id'       => $role_id_admin,
              'permission_id' => $permission_base + 8
            ),
            array(
              'role_id'       => $role_id_admin,
              'permission_id' => $permission_base + 9
            ),
            array(
              'role_id'       => $role_id_admin,
              'permission_id' => $permission_base + 10
            ),
            array(
              'role_id'       => $role_id_admin,
              'permission_id' => $permission_base + 11
            ),
            array(
              'role_id'       => $role_id_admin,
              'permission_id' => $permission_base + 12
            ),
        );

        DB::table('permission_role')->insert( $permissions );
    }

}