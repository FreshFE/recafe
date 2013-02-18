<?php

class IndexAction extends Action {

    public function index() {
		
        if($this->isPost()) {

            $data = M('Food')->select();
            $key = array_rand($data, 1);

            $this->assign('value', $data[$key]);
        }


    	$this->display();
    }

}