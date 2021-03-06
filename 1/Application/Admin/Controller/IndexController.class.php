<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
	
   public function index(){
   	//加载医院列表
       $cond = array(
    	
    	//筛选掉已经删除的数据
    	    'state' => array('neq',-1),
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
    	
    
    //加载商户列表
       $cond = array(
    	
    	//筛选掉已经删除的数据
    	    'status' => array('neq',-1),
    	);
 
    	//分页逻辑
    	$page = $_REQUEST['p'] ? $_REQUEST['p'] : 1 ;
    	$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10 ;
    	$storeshopinfos = D('s_store_shop_info')->getStoreShopInfos($cond,$page,$pageSize);
    	$storeshopinfoCount = D('s_store_shop_info')->getStoreShopInfoCount($cond);
    	
    	//分页控件
    	$pageObj = new \Think\Page($storeshopinfoCount,$pageSize);
    	
    	//获取分页结果
    	$pageRes2 = $pageObj->show();
    	
    	//绑定模板变量        
    	$this->assign('storeshopinfos',$storeshopinfos);
    	$this->assign('pageRes2',$pageRes2);
    	
    	//输出模板
        $this->display();
    }
    
    public function nav(){
    	$session = (session(C('ADMIN_SESSION')));
    	$admin_name = $session['admin_name'];
    	$this->assign('admin_name',$admin_name);
    	$this->display();
    }
}