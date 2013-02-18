<?php
	
	// 调试模式
	define('APP_DEBUG', true);

	// 项目核心
	define('ENTRY_PATH', './');

	define('APP_PATH', '../App/');
	define('THINK_PATH', '../../framework/thinkphp/');
	define('EXTEND_PATH', '../../framework/extend/');

	// 加载框架并运行
	require THINK_PATH . 'ThinkPHP.php';