<?php

class NewsAction extends CommonAction {

	// 默认分类编号
	protected $cid = 23;

	// 默认模型名称
	protected $modelName = 'Article';

	// 默认模型
	protected $model;

	// 默认id
	protected $id;

	// 默认封面图片上传缩略图编号
	protected $coverThumbSize = '212x137';

	/**
	 * 初始化
	 */
	public function _initialize() {

		// 创建Article模型
		$this->model = D($this->modelName);

		// 如果存在id的get，则创建
		$this->id = $this->_get('id');
	}

	/**
	 * News列表
	 */
	public function index() {

		// 获得索引条件
		$page = $this->_get('page');
		if(!$page)
			$page = 1;

		$cid = $this->_get('cid');
		if($cid)
			$condition['cid'] = $cid;

		// 每页显示多少行
		$listRows = 20;

		// 设置page样式并输出
		$totalRows = $this->model->where($condition)->count();
		$this->assignPage($totalRows, $listRows);

		// 获得内容
		$data = $this->model->where($condition)->page($page, $listRows)->select();
		$this->assign('news', $data);

		$this->display();
	}

	/**
	 * 创建Article
	 */
	public function create() {

		// Post提交后的执行
		if($this->isPost()) {

			$data = $this->model->create();
			$this->model->add($data);

			$this->success('创建成功', U('index'));

		// 未执行Post时的默认行为
		} else {

			$this->assignCategory($this->cid);
			$this->display('edit');
		}
	}

	/**
	 * 在数据创建默认的新数据，并跳转到编辑状态
	 */
	public function add() {

		$id = $this->model->createDefault();
		$this->success('创建成功，请编辑', U('edit', array('id' => $id)));
	}

	/**
	 * 编辑Article
	 */
	public function edit() {

		if($this->isPost()) {

			$data = $this->model->create();
			$this->model->save($data);

			$this->success('编辑成功', U('index'));

		} else {

			$data = $this->model->find($this->id);
			$this->assign('data', $data);

			$this->assignCategory($this->cid);

			$this->display();
		}
	}

	/**
	 * 编辑文章是否显示
	 */
	public function enable() {

		$this->model->find($this->id);
		$this->model->hidden = !$this->model->hidden;
		$this->model->save();

		$this->success('状态发布成功');
	}

	/**
	 * 删除文章
	 */
	public function delete() {

		$this->model->delete($this->id);

		$this->success('删除成功');
	}

	/**
	 * 侧边栏调用小组件
	 */
	public function sidebar() {

		// 侧边分栏
		import("ORG.Util.Category");
		$Category = new Category('Category');
		$category = $Category->getList('', $this->cid, 'priority ASC');
		$this->assign('category', $category);

		return $this->fetch('sidebar');
	}

	/**
	 * 文章内图片上传接口
	 */
	public function image() {

		$info = $this->uploadImg($_FILES['uploadify_file'], '120x120');
		$this->ajaxReturn($info);
	}

	/**
	 * 封面上传机制
	 */
	public function cover() {

		// 上传图片
		$info = $this->uploadImg($_FILES['uploadify_file'], $this->coverThumbSize);

		// 建立数据表
		$id = $_POST['id'];
		$this->model->where("id='$id'")->save(array('coverpath' => $info['name']));

		// 输出JSON
		$this->ajaxReturn($info);
	}

}