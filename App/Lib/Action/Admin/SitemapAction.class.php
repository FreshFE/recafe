<?php

class SitemapAction extends AdminExtendAction {

	/**
	 * 页面索引
	 */
	public function index() {

		$cid = $this->_get('cid');
		$cid = ($cid) ? $cid : 0;

		$this->assignCategory($cid);
		// 输出模板
		$this->display();
	}

	/**
	 * 创建分类
	 */
	public function create() {

		if($this->isPost()) {

			$this->_editCategory();
			$this->success('创建成功', U('index'));

		} else {

			$this->assignCategory();
			$this->display('edit');
		}
	}

	/**
	 * 编辑分类
	 */
	public function edit() {

		$cid = $this->_get('cid');

		if($this->isPost()) {

			$this->_editCategory();
			$this->success('编辑成功', U('index'));

		} else {

			$data = M('Category')->find($cid);
			$this->assign('data', $data);

			$this->assignCategory();
			$this->display('edit');
		}
	}

	/**
	 * 删除分类
	 */
	public function delete() {

		$cid = $this->_get('cid');

		import("ORG.Util.Category");
		$Category = new Category('Category');
		$Category->del($cid);

		$this->success('删除成功');
	}

	private function _editCategory() {

		// 获得表单
		$Category = M('Category');
		$data = $Category->create();

		// 添加category
		import("ORG.Util.Category");
		$Category = new Category('Category');
	
		if(empty($data['cid'])) {
			$id = $Category->add($data);
		} else {
			$id = $Category->edit($data);	
		}

		return $id;
	}
}