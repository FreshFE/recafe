<?php

class CommonAction extends Action {

	/**
	 * 根据cid获得category的内容，并assign到模板
	 * @param int $cid 默认为0
	 * @return void
	 */
	protected function assignCategory($cid = 0) {

		import("ORG.Util.Category");
		$Category = new Category('Category');
		$category = $Category->getList('', $cid, 'priority ASC');
		$this->assign('category', $category);
	}

	/**
	 * 加载Page类，输出导航栏
	 * @param int $totalRows 总条数
	 * @param int $listRows 列出条数
	 * @return void
	 */
	protected function assignPage($totalRows, $listRows) {

		import("COM.Page");
		$page = new Page($totalRows, $listRows);

		$page->rollPage = 9;
		$page->setConfig('prev', 'Prev');
		$page->setConfig('next', 'Next');
		$page->setConfig('theme', $this->fetch('Bases:page'));

		$this->assign('pageShow', $page->show());
	}

	/**
	 * 图片上传类
	 * @param array $image 图片文件
	 * @param string $thumbTypeName 缩略图模式，存在值则生产缩略图
	 * @return array 图片信息
	 */
	protected function uploadImg($image, $thumbTypeNames) {

		// 路径和文件名
		$imagepath = date('Y') . '/' . date('W') . '/';
		$basePath = './upload/images/';

		// 实例化
		import("COM.UploadFile");
		$handle = new UploadFile(array(

				// 基本
				'maxSize'			=> 4 * pow(1024, 3),
				'allowExts' 		=> array('jpg', 'jpeg', 'png', 'gif'),

				// 保存路径
				'basePath'			=> $basePath,
				'typePath'			=> 'o/',
				'subPath' 			=> $imagepath,

				// 缩略图设置
				'uploadReplace' 	=> true,
				'imageClassPath'	=> 'COM.Image'
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
		$status['id'] = M('Image')->add($status);

		return $status;
	}
}