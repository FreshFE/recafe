<?php

class SchoolAction extends Action {

	public function index() {

		if($this->isPost()) {

			$model = M('SchoolApply');
			$data = $model->create();
			$data['createline'] = time();
			$model->add($data);

			echo "报名成功，我们会尽快联系你。";

		} else {

			$this->display();
		}
	}
}