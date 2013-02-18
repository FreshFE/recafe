<?php

class ArticleModel extends Model {

	// 默认数据
	protected $data = array('title' => '未命名');

	// 模型自动完成
	protected $_auto = array (
		
		// 是否公开
		array('hidden', 0, 1),

		// 系统记录时间
		array('updateline', 'time', 3, 'function'),
		array('createline', 'time', 1, 'function'),

		// 自定义时间
		array('customline', 'time', 1, 'function'),
		array('customline', 'strtotime', 2, 'function')
	);

	/**
	 * 创建默认数据
	 */
	public function createDefault() {

		// 默认数据
		$data = $this->data;

		// 关闭表单验证（临时方法）
		C('TOKEN_ON', false);

		// 创建数据，设置自动完成
		$this->create($data, 1);

		// 打开表单验证（临时方法）
		C('TOKEN_ON', true);

		// 添加到数据库
		return $this->add();
	}

}