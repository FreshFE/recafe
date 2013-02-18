<?php

return array(

	// 载入配置信息
	'LOAD_EXT_CONFIG' => 'router,database,project,app',

    /**
    +
    * @description 分组和模板
	+
    */

	// 项目分组设定
	'APP_GROUP_LIST' => 'home,admin,api',

	// 默认分组
	'DEFAULT_GROUP'  => 'home',

	// URL小写
	'URL_CASE_INSENSITIVE' => true,

	// URL采用Rewrite重写方式
	'URL_MODEL' => 2, 

	// 项目默认模块名
	'DEFAULT_MODULE' => 'index',

    /**
    +
    * @令牌验证配置信息
	+
    */

	//是否开启令牌验证
	'TOKEN_ON' => true,

	//令牌验证的表单隐藏字段名称
	'TOKEN_NAME' => '_safe_key',

	//令牌哈希验证规则 默认为MD5
	'TOKEN_TYPE' => 'md5',

	//令牌验证出错后是否重置令牌 默认为true
	'TOKEN_RESET' => true,

    /**
    +
    * @description 多语言开发
	+
    */

	// 开启语言包功能
	'LANG_SWITCH_ON' => true,

	// 自动侦测语言 开启多语言功能后有效
	'LANG_AUTO_DETECT' => true,

	// 允许切换的语言列表 用逗号分隔
	'LANG_LIST' => 'en-us,zh-cn',

	// 默认语言切换变量
	'VAR_LANGUAGE' => 'language',

	// 没看明白
	'VAR_PAGE' => 'page',

	'JUMP_MODE' => 1
	

);
