<?php

/**
 + Template Helper
 * date 2012.10.29
 * date 2012.12.10
 * date 2012.12.14
 */

/**
 * 控制字符串长度
 * @param string $str 需要处理的字符串
 * @param number $num 最大长度
 * @param boolean $ellipsis 是否在最后添加省略号'...'
 * @param number $offset 处理字符串的起始点
 * @return string
 */
function ms_substr($str, $num, $ellipsis, $offset = 0){

	$encodeArr 	= array('UTF-8', 'gbk', 'gb2312', 'CP936', 'ascii');
	$encode 	= mb_detect_encoding($str, $encodeArr);
	$mb_str    	= mb_strlen($str, $encode);
	
	if($mb_str <= $num){

		return $str;
	} else {

		$ellstr = $ellipsis ? '...' : '';
		return mb_substr($str, $offset, $num, $encode) . $ellstr;
	}
}

/**
 * 根据Module name，Action name来判断是否当前模块或方法
 * @param string $controller 指定模块和操作名
 * 		module/* 		=> 所有该module下的action 
 * 		modlue/action 	=> 指定module和action
 * 		action 			=> 当前module为默认下的action
 * @return string
 */
function active($controller) {

	$arr = split('[/]', $controller);
	
	switch (count($arr)) {
		case 1:
			list($action) = $arr;
			$module = MODULE_NAME;
			break;
		
		case 2:
			list($module, $action) = $arr;
			break;
	}

	if (strtolower($module) == strtolower(MODULE_NAME)) {
		if (strtolower($action) == strtolower(ACTION_NAME) || $action == '*') {
			$active = true;
		}
	}

	if($active)
		return " class='active'";
}

/**
 * 指定get值的name和value来匹配当前的url
 * @param string $name get值的name
 * @param string $value get值的value 
 * @return string
 */
function activeByGet($name, $value) {

	if(!$_GET[$name] && !$value)
		$active = true;

	elseif($_GET[$name] == $value)
		$active = true;

	if($active)
		return " class='active'";
}

/**
 * 通过Action实现小插件
 * @param string $action 小插件名称
 * @param array $data 小插件需要传递的数组
 * @return string
 */
function widget($action, $data) {
	//指定widget小插件数据，$action => 指定操作名，$data传递数组数据
	return R(GROUP_NAME.'/Widget/'.$action, array($data));
}

/**
 * 使用当前Module下的Action
 * @param string $url action名
 * @return string
 */
function T($url) {

	return R(MODULE_NAME . '/' . $url);
}

/**
 * 返回图片地址
 * @Dec 14 2012
 * @param string $name 图片路径名
 * @param string $type 图片类型，默认为o类型
 * @return string
 */
function img($name, $type = 'o') {

	$viewPath = C('PROJ_IMAGE_VIEW_PATH');

	if(!$viewPath)
		$viewPath = '/upload/images/';

	return $viewPath . $type . '/' . $name;
}

function sizeformat($bytesize){

	$i=0;

	// 当$bytesize 大于是1024字节时，开始循环，当循环到第4次时跳出
	while(abs($bytesize) >= 1024) {

		$bytesize=$bytesize / 1024;
		$i++;

		if($i == 4)
			break;
	}
	
	$units = array('Bytes', 'KB', 'MB', 'GB', 'TB');
	$newsize = round($bytesize, 2);

	return $newsize . $units[$i];
}

function boolString($bool) {
	
	return $bool ? '<span class="label label-success">True</span>' : 'False';
}

