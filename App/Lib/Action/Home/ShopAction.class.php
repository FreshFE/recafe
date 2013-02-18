<?php

class ShopAction extends Action {

	public function index() {

		$model = M('Shop');

		// 只显示发布的
		$condition['hidden'] = 1;

		// 判断分类
		$cid = $this->_get('cid');
		if($cid)
			$condition['cid'] = $cid;

		// 每页显示多少行
		$listRows = 12;

		// 设置page样式并输出
		$totalRows = $model->where($condition)->count();
		$this->assignPage($totalRows, $listRows);

		// 获得
		$data = $model->where($condition)->select();
		$this->assign('data', $data);

		$this->getCategory();
		$this->display();
	}

	private function getCategory() {

		import("ORG.Util.Category");
		$Category = new Category('Category');
		$category = $Category->getList('', 36, 'priority ASC');
		$this->assign('category', $category);
	}

	private function assignPage($totalRows, $listRows) {

		import("COM.Page");
		$page = new Page($totalRows, $listRows);

		$page->rollPage = 9;
		$page->setConfig('prev', 'Prev');
		$page->setConfig('next', 'Next');
		$page->setConfig('theme', $this->fetch('page'));
		$this->assign('pageShow', $page->show());
	}

	public function detail() {

		$id = $this->_get('id');
		$model = M('Shop');

		// 主要商品
		$data = $model->find($id);
		$this->assign('data', $data);

		// 相关商品
        $related = $model->where("cid='$data[cid]' and id!='$id' and hidden='1'")->order('customline DESC')->limit(4)->select();
        $this->assign('related', $related);

		$this->display();
	}
}