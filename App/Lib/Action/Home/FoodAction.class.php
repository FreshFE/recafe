<?php

class FoodAction extends Action {

    public function index() {
		
    	// 输出所有产品
        $data = M('Food')->select();
        $this->assign('data', $data);
        $this->display();
    }

}