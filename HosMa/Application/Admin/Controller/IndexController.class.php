<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
//  	$cond = array(
//			//筛选掉已经删除的数据
//			'status' => array('neq',-1),
//		);
//		//分页逻辑
//		$page = $_REQUEST['p'] ? $_REQUEST[p] : 1;
//		$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;
//		$doctors = D('HDoctorBaseInfo')->getDoctors($cond,$page,$pageSize);
//		$articlesCount = D('HDoctorBaseInfo')->getMenusCount($cond);
//		//分页控件
//		$pageObj = new \Think\Page($articlesCount,$pageSize);
//		//获取分页结果
//		$pageRes = $pageObj->show();
//		//绑定模板变量
//		$this->assign('doctors',$doctors);
//		$this->assign('pageRes',$pageRes);
    	$this->display();
    }
}