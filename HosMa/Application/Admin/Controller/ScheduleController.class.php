<?php
namespace Admin\Controller;
use Think\Controller;
import("XXKit.Constants");

class ScheduleController extends Controller {
    public function index(){
    	$cond = array(
			//筛选掉已经删除的数据
			'status' => array('neq',-1),
		);
		//分页逻辑
		$page = $_REQUEST['p'] ? $_REQUEST[p] : 1;
		$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;
		$schedules = D('HSchedulingInfo')->getSchedules($cond,$page,$pageSize);
		$articlesCount = D('HSchedulingInfo')->getMenusCount($cond);
		//分页控件
		$pageObj = new \Think\Page($articlesCount,$pageSize);
		//获取分页结果
		$pageRes = $pageObj->show();
		//绑定模板变量
		$this->assign('schedules',$schedules);
		
		$this->assign('pageRes',$pageRes);
    	$this->display();
    }
     //点击添加文章按钮
    public function add(){
		if($_POST){
			//表单验证
			$validData = D('HSchedulingInfo')->create();
//			cDebug($validData);
			if($validData){
				//编辑逻辑
//				if($_POST['id']){
//					return $this->save($_POST);
//				}
				//执行新操作
				$res = D('HSchedulingInfo')->inset($validData);
				if($res === false){
					return ajaxReturn(\DATABASE_ERROR,'数据库新增失败');
				}
				return ajaxReturn(\SUCCESS,'添加文章成功');
			}else{
				return ajaxReturn(\VALIDATE_ERROR,D('HSchedulingInfo')->getError());
			}
		}else{
//			cDebug($res);
			$this->display();
		}
    }
}