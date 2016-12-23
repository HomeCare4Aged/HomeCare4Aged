<?php
namespace Admin\Controller;
class HospitalRegisterController extends CommonController {
	public function index(){
    	//分页逻辑
    	if($_POST['search'] != null){
			$cond['community_hospitals_name'] = array('like','%'.$_POST['search'].'%');
			
		}
    	$page=$_REQUEST['p'] ?$_REQUEST['p']:1;
    	$pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:10;
    	$hai=D('h_hospital_user_info')->getHospitalAccountInfo($cond,$page,$pageSize);
//  	$hai = D('h_hospital_user_info')->where($cond)->select();
    	$Count=D('h_hospital_user_info')->getMenuCount($cond);
    	//分页控件
    	$pageObj = new \Think\Page($Count,$pageSize);
    	//获取分页结果
    	$pageRes = $pageObj->show();
    	//绑定模板变量
    	$this->assign('hai',$hai);
    	$this->assign('pageRes',$pageRes);
    	//输出模板
        $this->display();
	}
	public function add(){
		if($_POST){
			$validData1 = D('h_hospitals_info')->create();
			$validData2 = D('h_hospital_user_info')->create();
    		if($validData1 && $validData2){
    			$community_hospitals_id = get_uuid();
    			$hospital_user_id = get_uuid();
    			$validData1['community_hospitals_id']=$community_hospitals_id;
    			$validData2['community_hospitals_id']=$community_hospitals_id;
    			$validData2['hospital_user_id'] = $hospital_user_id;
//  			cdebug($validData2);
    			//执行新增操作
    			$res['chi'] = D('h_hospitals_info')->add($validData1);
    			$res['hai'] = D('h_hospital_user_info')->add($validData2);
    			if($res === FALSE){
    				return ajaxReturn(\DATABASE_ERROR,'账号申请失败！');
    			}
    			return ajaxReturn(\SUCCESS,'账号申请成功！');
    		}
    			return ajaxReturn(\VALIDATE_ERROR,D('h_hospitals_info')->getError());
		}
		$this->display();
	}
	
	
	
	
}
?>