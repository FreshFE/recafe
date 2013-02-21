<?php

class ImageAction extends AdminExtendAction {

	private $basePath = './upload/images/';

	private $model;

	/**
	 * 初始化
	 * @return void
	 */
	public function _initialize() {

		// 创建Image模型
		$this->model = M('Image');
	}

	/**
	 * 页面索引
	 */
	public function index() {

		// 获得索引条件
		$page = $this->_get('page');
		if(!$page)
			$page = 1;

		// 每页显示多少行
		$listRows = 6;

		// 设置page样式并输出
		$totalRows = $this->model->where($condition)->count();
		$this->assignPage($totalRows, $listRows);



		// 获得内容
		$data = $this->model->where($condition)->page($page, $listRows)->order('id DESC')->select();
		$this->assign('image', $data);

		$this->display();
	}

	public function create() {

		if($this->isPost()) {

			$thumbType = $this->_post('thumbtype');
			$thumbType = join($thumbType, ',');

			$info = $this->uploadImg($_FILES['image_field'], $thumbType);

			$this->success('上传成功', U('index'));

		} else {

			// 缩略图分类
			$thumbType = C('PROJ_THUMB_TYPE');
			$thumbType = array_keys($thumbType);
			$this->assign('thumbType', $thumbType);

			$this->display('edit');
		}
	}

	/**
	 * Flash上传接口
	 */
	public function flash() {

		$info = $this->uploadImg($_FILES['uploadify_file']);

		$this->ajaxReturn($info);
	}

	/**
	 * 内部上传调用接口
	 */
	public function upload($imageName = 'uploadify_file') {

		// return $this->uploadImg($_FILES[$imageName]);

		return 'ss';
	}

	/**
	 * 图片上传类
	 * @param string $thumbTypeName 缩略图模式，存在值则生产缩略图
	 * @return array 图片信息
	 */
	private function uploadImg2($image, $thumbTypeNames) {

		// 路径和文件名
		$imagepath = date('Y') . '/' . date('W') . '/';
		// $imagehash = uniqid();

		// 实例化
		import("COM.UploadFile");
		$handle = new UploadFile(array(

				// 基本
				'maxSize'			=> 4 * pow(1024, 3),
				'allowExts' 		=> array('jpg', 'jpeg', 'png', 'gif'),

				// 保存路径
				'basePath'			=> $this->basePath,
				'typePath'			=> 'o/',
				'subPath' 			=> $imagepath,

				// 缩略图设置
				'uploadReplace' 	=> true,
				'imageClassPath'	=> 'ORG.Image'
			));

		// 如果需要生成缩略图
		if(!empty($thumbTypeNames)) {

			$handle->thumb = true;
			$handle->thumbTypeNames = $thumbTypeNames;
		}

		// 执行上传操作
		$status = $handle->uploadOne($image);

		// 如果上传错误，返回错误信息
		if(!$status)
			return $handle->getErrorMsg();

		// 插入数据库
		$status['id'] = $this->model->add($status);

		return $status;
	}

	private function deleteImg() {}

	public function decodeurl() {

		echo urldecode('\u6ca1\u6709\u9009\u62e9\u4e0a\u4f20\u6587\u4ef6');
	}

}