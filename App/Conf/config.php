<?php

return array(

	// 载入配置信息
	// 当前配置
	'LOAD_EXT_CONFIG' => 'auth,router,app',

	// Tag, 行为类
	'app_begin' => array('CheckLang'),
	
	// 分组模式，默认模块名，URL模式
	// TODO: 放入全局
	'APP_GROUP_LIST' 		=> 'home,admin,api',	// 项目分组设定
	'DEFAULT_GROUP'  		=> 'home',				// 默认分组
	'DEFAULT_MODULE' 		=> 'index',				// 项目默认模块名
	'URL_CASE_INSENSITIVE' 	=> true,				// URL小写
	'URL_MODEL' 			=> 2, 					// URL采用Rewrite重写方式

    // 令牌功能
    // TODO: 放入全局
	'TOKEN_ON' 		=> true,			// 是否开启令牌验证
	'TOKEN_NAME' 	=> '_safe_key',		// 令牌验证的表单隐藏字段名称
	'TOKEN_TYPE' 	=> 'md5',			// 令牌哈希验证规则 默认为MD5
	'TOKEN_RESET' 	=> true,			// 令牌验证出错后是否重置令牌 默认为true

    // Language
    // TODO: 放入全局
	'LANG_SWITCH_ON' 	=> true,			// 开启语言包功能
	'LANG_AUTO_DETECT' 	=> true,			// 自动侦测语言 开启多语言功能后有效
	'LANG_LIST' 		=> 'en-us,zh-cn',	// 允许切换的语言列表 用逗号分隔
	'VAR_LANGUAGE' 		=> 'language',		// 默认语言切换变量

	// 没看明白
	'VAR_PAGE' 		=> 'page',
	'JUMP_MODE' 	=> 1,
	'JUMP_SESSION'	=> true,


	// Database Config
	'DB_TYPE'   => 'mysql',			// 数据库类型
	'DB_HOST'   => 'localhost',		// 数据库地址
	'DB_NAME'   => 'database',		// 数据库名
	'DB_USER'   => 'root',			// 用户名
	'DB_PWD'    => 'root',			// 密码
	'DB_PORT'   => 8889,			// 端口
	'DB_PREFIX' => '',				// 数据表前缀

	// Debug
	'SHOW_PAGE_TRACE' => false,		// 显示页面Trace信息

	// Smarty
	'TMPL_ENGINE_TYPE' => 'Smarty',

	'TMPL_ENGINE_CONFIG' => array(

		'left_delimiter' 	=> '{{',
		'right_delimiter' 	=> '}}',
		'debugging' 		=> false
	),

	// 路径
	'TMPL_PARSE_STRING' => array(
		
		'@/assets' => '/assets',
		'@/admin' => '/assets/admin'
	),

	// 图片游览路径
	'PROJ_IMAGE_VIEW_PATH' => '/upload/images/',

	// Project
	// 项目缩略图类型
	'PROJ_THUMB_TYPE' => array(

		// 默认样式，宽度，高度，模式
		'thumb' => array(500, 500, 'both'),
		'banner' => array(100, 100, 'both'),
		'120x120' => array(120, 120, 'both'),

		// Case 列表缩略图
		'212x137' => array(212, 137, 'both'),

		// Shop 列表缩略图和示范Photo
		'210x184' => array(210, 184, 'both'),
		'424width' => array(424, 424, 'width')
	)
);
