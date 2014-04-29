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
    ),

);
