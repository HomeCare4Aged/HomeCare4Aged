<?php
namespace Admin\Controller;
use Think\Controller;
class CommunityController extends CommonController {
	//显示添加社区
   public function index(){
   		//分页逻辑
   		if($_POST['search'] != null){
			$cond['community_name'] = array('like','%'.$_POST['search'].'%');
			
		}
		
        if($ancheckstate === false){
            return ajaxReturn(\DATABASE_ERROR,'数据库查询失败！');
        }
		
    	$page=$_REQUEST['p'] ?$_REQUEST['p']:1;
    	$pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:10;
    	$community=D('a_community_info')->getHospitalAccountInfo($page,$pageSize);
    	$community = D('a_community_info')->where($cond)->select();
    	$Count=D('a_community_info')->getMenuCount($cond);
    	//分页控件
    	$pageObj = new \Think\Page($Count,$pageSize);
    	//获取分页结果
    	$pageRes = $pageObj->show();
    	//绑定模板变量
    	$this->assign('community',$community);
    	$this->assign('pageRes',$pageRes);
    	//输出模板
   		$this->display();
   }
   public function add(){
   	if($_POST){
   		$validData = D('a_community_info')->create();
   		if($validData){
   			if($_POST['area'] == 723){
   				return ajaxReturn(\DATABASE_ERROR,'所在县区未选择！');
   			}
   			$community_id = get_uuid();
   			$validData['community_id'] = $community_id;
   			$validData['community_address'] = $_POST['area'].$_POST["community_address"];
   			$validData['send_datetime']=date('Y-m-d H:i:s');
// 			cdebug($validData);
   			//添加
   			$res = D('a_community_info')->add($validData);
   			if($res === FALSE){
    				return ajaxReturn(\DATABASE_ERROR,'社区添加失败！');
    			}
    			return ajaxReturn(\SUCCESS,'社区添加成功！');
   		}else{
   			return ajaxReturn(\VALIDATE_ERROR,D('a_community_info')->getError());
   		}
   	}
   	$this->display();
   }
      
}