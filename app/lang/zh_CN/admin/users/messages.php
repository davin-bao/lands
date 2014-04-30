<?php

return array(

    'does_not_exist'    => '当前管理员信息不存在.',
	'password_does_not_match' => '输入的密码与密码确认的值不一致，请查证.',

	'create' => array(
        'error'   => '管理员信息不能被创建, 请重试.',
        'success' => '管理员信息创建成功.',
        'help_block'    => '为用户选择一个角色，将为用户赋予该角色的权限.'
	),

    'edit' => array(
        'impossible' => '请到右上角[个人设置]修改自己的信息.',
        'error'   => '该管理员信息修改失败.',
        'success' => '管理员信息修改成功.'
    ),

    'delete' => array(
        'impossible' => '你不能删除你自己的信息.',
        'message' => '确认删除当前管理员信息 ?',
        'error'      => '删除该管理员信息发生错误.',
        'success'    => '成功删除该管理员信息.'
    )

);
