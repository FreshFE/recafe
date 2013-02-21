<?php

return array(

	// 控制器访问权限控制
	'AUTH_CONF' => array(

		'Admin' => array(

			'_default' => 'superadmin',
			'account/login' => 'public'
		),

		'Home' => array(
			'_default' => 'public',
			'client' => 'member',
			'client/index' => 'public'
		)
	),

	'AUTH_KEY' => 'MEMBER_AUTH',
	'AUTH_ADMIN_KEY' => 'ADMIN_AUTH'

);