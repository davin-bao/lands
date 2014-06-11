<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => " :attribute 必须接受.",
	"active_url"           => " :attribute 不是有效的URL.",
	"after"                => " :attribute 必须在 :date 之后.",
	"alpha"                => " :attribute 仅包含字符.",
	"alpha_dash"           => " :attribute 只能包含字符、数字及下划线.",
	"alpha_num"            => " :attribute 只能包含字符及数字.",
	"array"                => " :attribute 必须是数组.",
	"before"               => " :attribute 必须在 :date 之前.",
	"between"              => array(
		"numeric" => " :attribute 必须在 :min 与 :max 之间.",
		"file"    => " :attribute 必须在 :min 与 :max 之间.",
		"string"  => " :attribute 必须在 :min 与 :max 之间的字符.",
		"array"   => " :attribute 必须有 :min 与 :max 之间的子元素.",
	),
	"confirmed"            => " :attribute 与确认值不匹配.",
	"date"                 => " :attribute 是无效的日期.",
	"date_format"          => " :attribute 不是合法的格式： :format.",
	"different"            => " :attribute 与 :other 不能相同.",
	"digits"               => " :attribute 必须是 :digits .",
	"digits_between"       => " :attribute 必须在 :min 与 :max 之间.",
	"email"                => " :attribute 不是一个有效的 email 地址.",
	"exists"               => "已选择的 :attribute 无效.",
	"image"                => " :attribute 必须是一个图片.",
	"in"                   => "已选择的 :attribute 无效.",
	"integer"              => " :attribute 必须是整数.",
	"ip"                   => " :attribute 必须是一个有效的IP地址.",
	"max"                  => array(
		"numeric" => " :attribute 不得大于 :max.",
		"file"    => " :attribute 不得大于 :max .",
		"string"  => " :attribute 长度不能大于 :max .",
		"array"   => " :attribute 的子元素数量不能大于 :max .",
	),
	"mimes"                => " :attribute 必须是带 :values 的文件.",
	"min"                  => array(
		"numeric" => " :attribute 不得小于 :min.",
		"file"    => " :attribute 不得小于 :min kilobytes.",
		"string"  => " :attribute 长度不得小于 :min .",
		"array"   => " :attribute 的子元素数不得小于 :min .",
	),
	"not_in"               => "已选择的 :attribute 无效.",
	"numeric"              => " :attribute 必须是数字.",
	"regex"                => " :attribute 格式不正确.",
	"required"             => " :attribute 不能为空.",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => " :attribute 与 :other 必须相同.",
	"size"                 => array(
		"numeric" => " :attribute 必须为 :size.",
		"file"    => " :attribute 必须为 :size .",
		"string"  => " :attribute 长度必须为 :size .",
		"array"   => " :attribute 必须包含 :size 子元素.",
	),
	"unique"               => " :attribute 已经存在.",
	"url"                  => " :attribute 格式不正确.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(

        'recruit_name' => '职位名称',
        'recruit_count'  => '需求数量',
        'recruit_content'  => '职位描述',
        'freeze'  => '冻结',


        'business_name' => '业务标题',
        'business_content'  => '业务内容',

        'carousel_image'  => '轮播图片',
        'carousel_content'  => '内容',

        'name'       => '角色名称',
        'users'      => '用户列表',
        'created_at' => '创建时间',

        'manage_infos'  => '新闻管理',
        'manage_carousels' => '图片轮播管理',
        'manage_settings' => '站点设定管理',
        'manage_businesses' => '业务介绍管理',
        'manage_recruits' => '招聘管理',
        'manage_users' => '用户管理',
        'manage_roles' => '角色管理',

        'first_name' => '名字',
        'last_name'  => '姓氏',
        'user_id'  => '用户ID',
        'username'  => '用户名',
        'email'      => 'Email',
        'groups'     => '群组',
        'roles'     => '权限',
        'activated'  => '激活',
        'created_at' => '创建时间',
        'password'  => '密码',
        'password_confirmation' => '密码确认',
        'activate_user' => '激活账号',

        'site_url' => '网站地址',
        'company_name'=>'公司名称',
        'master_email'=>'管理员Email',
        'address'=>'公司地址',
        'service_phone'=>'服务热线',
        'mobile'=>'手机',
        'company_instroductions'=>'公司简介',
        'services'=>'业务介绍',
        'contact'=>'联系我们',

        'freeze'  => '冻结',
        'order'  => '排序',
        'created_at' => '创建时间',
        'updated_at' => '更新时间',
        'info_name' => '新闻标题',
        'info_content' => '新闻内容'
    ),

);
