<?php

return array(

    /**
     + @调试环境下配置信息
     */

	// 显示页面Trace信息
	'SHOW_PAGE_TRACE' => false,

	/**
	 + @模板路径
	 */

    // 模板替换配置（自定义）
	'TMPL_PARSE_STRING'=>array(

		'@/assets' => '/assets',
		'@/admin' => '/assets/admin'

	),

	/**
	 + @Smarty模板引擎配置
	 */

	'TMPL_ENGINE_TYPE' => 'Smarty',

	'TMPL_ENGINE_CONFIG' => array(
		'left_delimiter' 	=> '{{',
		'right_delimiter' 	=> '}}',
		'debugging' 		=> false
	),

	/**
	 + @项目自定义变量
	 + @项目自定义变量以PROJ_作为前缀
	 */

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
	),

	// 图片游览地址
	'PROJ_IMAGE_VIEW_PATH' => '/upload/images/'

);