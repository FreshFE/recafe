<?php

class AccountAction extends AdminExtendAction {

	public function login() {

		// 已经登录用户无法操作该功能
		if($this->auth->checkLogin())
			$this->error('您已经登录，无法执行本操作', U('index/index'));

		// 处理表单
		if($this->isPost()) {

			// 获得表单数据，并根据数据查询数据库
			$user = M('User');
			$data = $user->create();
			$id = $user->where("username='".$data['username']."' and password='".sha1($data['password'])."' and isadmin='1'")->find();

			// 如果存在该记录，则表示存在该账号，执行登录
			if(!empty($id)) {

				$this->auth->member($id);
				$this->auth->superadmin($id);
				$this->success('登录成功', U('index/index'));
			}
		}

		$this->display();
	}

	public function logout() {

		$this->auth->check();

		$this->auth->member(null);
		$this->auth->superadmin(null);
		$this->success('退出成功', U('index/index'));
	}
}