<?php

class CaseAction extends Action {

    // 31 - 品牌管理及提升
    // 32 - VI设计/宣传海报/样本设计/包装设计
    // 33 - 网站建设/UI设计/视频动画/PPT模板/电子杂志
    // 34 - 插画绘制/专业摄影/创意小礼品

    public function index() {
	   
        $model = M('Case');

        // 设置分类
        $caseCat = array(31, 32, 33, 34);
        $caseName = array('caseBrand', 'caseVi', 'caseSite', 'casePic');

        // 遍历分类并输出
        foreach ($caseCat as $key => $value) {
            
            $data = $model->where("cid='$value' and hidden='1'")->order('customline DESC')->limit(4)->select();
            $this->assign($caseName[$key], $data);
        }

        // 输出Banner Slide
        $slide = M('Banner')->where("cid='45' and hidden='1'")->order('priority ASC')->select();
        $this->assign('slide', $slide);

    	$this->display();
    }

    public function brand() {

    	$cid = $this->_get('cid');

    	$data = M('Case')->where("cid='$cid' and hidden='1'")->order('customline DESC')->select();
        $this->assign('data', $data);

    	$this->display();
    }

    public function detail() {

        $id = $this->_get('id');
        $model = M('Case');

        // 本案例
        $data = $model->find($id);
        $this->assign('data', $data);

        // 相关案例
        $related = $model->where("cid='$data[cid]' and id!='$id'")->order('customline DESC')->limit(24)->select();
        $this->assign('related', $related);

        // 上一篇和下一篇
        $prev = $model->where("customline<$data[customline] and cid='$data[cid]' and hidden='1'")->order('customline DESC')->limit(1)->find();
        $next = $model->where("customline>$data[customline] and cid='$data[cid]' and hidden='1'")->order('customline ASC')->limit(1)->find();
        $this->assign('prev', $prev);
        $this->assign('next', $next);

        $this->display();
    }


}