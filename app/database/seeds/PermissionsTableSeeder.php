<?php

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = array(
            array( // 1
                'name'         => 'manage_users',
                'display_name' => '用户管理'
            ),
            array( // 2
                'name'         => 'manage_roles',
                'display_name' => '角色管理'
            ),
            array( // 3
                'name'         => 'manage_infos',
                'display_name' => '新闻管理'
            ),
            array( // 4
                'name'         => 'manage_settings',
                'display_name' => '站点设置'
            ),
            array( // 5
                'name'         => 'manage_businesses',
                'display_name' => '业务管理'
            ),
            array( // 6
                'name'         => 'manage_recruits',
                'display_name' => '招聘管理'
            ),
            array( // 7
                'name'         => 'manage_carousels',
                'display_name' => '轮播管理'
            ),
            array( // 8
              'name'         => 'manage_flows',
              'display_name' => '流程管理'
            ),
            array( // 9
              'name'         => 'create_infos',
              'display_name' => '添加新闻'
            ),
            array( // 10
              'name'         => 'create_recruits',
              'display_name' => '发布招聘'
            ),
            array( // 11
              'name'         => 'delete_infos',
              'display_name' => '删除新闻'
            ),
            array( // 12
              'name'         => 'delete_recruits',
              'display_name' => '删除招聘'
            ),

        );

        DB::table('permissions')->insert( $permissions );

        DB::table('permission_role')->delete();

        $role_id_admin = Role::where('name', '=', 'administrators')->first()->id;
        $permission_base = (int)DB::table('permissions')->first()->id - 1;

        $permissions =  array();
        for($i=1;$i<=12;$i++){
            $a = array(
                'role_id'       => $role_id_admin,
                'permission_id' => $permission_base + $i
            );
            array_push($permissions,$a);
        }

        DB::table('permission_role')->insert( $permissions );

      //insert creators
      $role_id_hr = Role::where('name', '=', 'hrs')->first()->id;

      $permissions_hrs = array(
        array(
          'role_id'       => $role_id_hr,
          'permission_id' => $permission_base + 6
        ),
        array(
          'role_id'       => $role_id_hr,
          'permission_id' => $permission_base + 10
        )
      );

      DB::table('permission_role')->insert( $permissions_hrs );

      //create deleters
      $role_id_info = Role::where('name', '=', 'infos')->first()->id;

      $permissions_infos = array(
        array(
          'role_id'       => $role_id_info,
          'permission_id' => $permission_base + 3
        ),
        array(
          'role_id'       => $role_id_info,
          'permission_id' => $permission_base + 4
        ),
        array(
          'role_id'       => $role_id_info,
          'permission_id' => $permission_base + 5
        ),
        array(
          'role_id'       => $role_id_info,
          'permission_id' => $permission_base + 9
        ),

      );

      DB::table('permission_role')->insert( $permissions_infos );


        //create deleters
        $role_id_audit = Role::where('name', '=', 'audits')->first()->id;

        $permissions_audits = array(
            array(
                'role_id'       => $role_id_audit,
                'permission_id' => $permission_base + 3
            ),
            array(
                'role_id'       => $role_id_audit,
                'permission_id' => $permission_base + 4
            ),
            array(
                'role_id'       => $role_id_audit,
                'permission_id' => $permission_base + 5
            ),
            array(
                'role_id'       => $role_id_audit,
                'permission_id' => $permission_base + 6
            ),
            array(
                'role_id'       => $role_id_audit,
                'permission_id' => $permission_base + 9
            ),
            array(
                'role_id'       => $role_id_audit,
                'permission_id' => $permission_base + 10
            ),
            array(
                'role_id'       => $role_id_audit,
                'permission_id' => $permission_base + 11
            ),
            array(
                'role_id'       => $role_id_audit,
                'permission_id' => $permission_base + 12
            )
        );

        DB::table('permission_role')->insert( $permissions_audits );
    }

}