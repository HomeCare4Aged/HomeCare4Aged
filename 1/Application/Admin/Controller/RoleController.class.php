<?php
namespace Admin\Controller;
//use Think\Controller;
//import("ZHKit.Constants");
class RoleController extends CommonController {
    public function index(){
    	//加载医院列表
       $cond = array(
    	
    	//筛选掉已经删除的数据
    	    'status' => array('neq',-1),
    	    'community_hospital_numbers' => array('neq',9999),
    	);
 
    	//分页逻辑
    	$page = $_REQUEST['p'] ? $_REQUEST['p'] : 1 ;
    	$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10 ;
    	$communityhospitalsinfos = D('h_hospitals_info')->getCommunityHospitalsInfos($cond,$page,$pageSize);
    	$communityhospitalsinfoCount = D('h_hospitals_info')->getCommunityHospitalsInfoCount($cond);
    	
    	//分页控件
    	$pageObj = new \Think\Page($communityhospitalsinfoCount,$pageSize);
    	
    	//获取分页结果
    	$pageRes = $pageObj->show();
    	
    	//绑定模板变量        
    	$this->assign('communityhospitalsinfos',$communityhospitalsinfos);
    	$this->assign('pageRes',$pageRes);
    	
    	//加载社区列表
       $cond = array(
    	
    	//筛选掉已经删除的数据
    	    'status' => array('neq',-1),
    	);
 
    	//分页逻辑
    	$page = $_REQUEST['p'] ? $_REQUEST['p'] : 1 ;
    	$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10 ;
    	$acommunityinfos = D('a_community_info')->getACommunityInfos($cond,$page,$pageSize);
    	$acommunityinfoCount = D('a_community_info')->getACommunityInfoCount($cond);
    	
    	//分页控件
    	$pageObj = new \Think\Page($communityhospitalsinfoCount,$pageSize);
    	
    	//获取分页结果
    	$pageRes = $pageObj->show();
    	
    	//绑定模板变量        
    	$this->assign('acommunityinfos',$acommunityinfos);
    	$this->assign('pageRes',$pageRes);
    	
    	//输出模板
    	$this->display();
    }
    
    public function assignAuth(){
    	$community_hospitals_id = I('id');
		$cond =array(
		'community_hospitals_id'=>array('eq',$community_hospitals_id)
		);
    	try{
    		$menu = D('h_hospitals_info')->findAVideoInfoById($community_hospitals_id,$cond);
    	}catch(Exception $e){
    		return ajaxReturn(\QUERY_ERROR,$e->getMessage());
    	}
    	if ($menu === fales){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
    	}
    	$this->assign('menu',$menu);
    	$this->display();
    }
    	
    //更新数据API
    public function save($data){
    	$community_hospitals_id = $data['id'];
    	unset($data['id']);
    	try{
    		$res = D('h_hospitals_info')->updateAVideoInfoById($community_hospitals_id,$data);
    	}catch(Exception $e){
    		return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
    	}
    	if ($res === fales){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
    	}
    	return ajaxReturn(\SUCCESS,'更新菜单成功');
    }
}