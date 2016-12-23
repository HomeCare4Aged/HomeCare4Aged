<?php
namespace Admin\Controller;
use Think\Controller;

class ExamineController extends Controller {
	
	//加载店铺审核模块的首页
    public function index(){
    	
        $this->display();
    }
    //加载公告审核模块的首页
    public function announcement(){
    	//加载医院列表
       $cond = array(
    	
    	//筛选掉已经删除的数据
    	    'status' => array('neq',-1),
    	);
 
    	//分页逻辑
    	$page = $_REQUEST['p'] ? $_REQUEST['p'] : 1 ;
    	$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10 ;
    	$ancheckstates = D('h_hospitals_info')->getAncheckstates($cond,$page,$pageSize);
    	$ancheckstatesCount = D('a_announcement_info')->getAncheckstatesCount($cond);
    	
    	//分页控件
    	$pageObj = new \Think\Page($ancheckstatesCount,$pageSize);
    	
    	//获取分页结果
    	$pageRes = $pageObj->show();
    	
    	//绑定模板变量        
    	$this->assign('ancheckstates',$ancheckstates);
    	$this->assign('pageRes',$pageRes);
    	
        $this->display();
    }
    //编辑页展示API
    public function edit2(){
    	$menu_id = I('id');
    	
    	try{
    		$menu = D('a_announcement_info')->findArticleById($menu_id);
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
    	$menu_id = $data['id'];
    	unset($data['id']);
    	try{
    		$res = D('a_announcement_info')->updateMenuById($menu_id,$data);
    	}catch(Exception $e){
    		return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
    	}
    	if ($res === fales){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
    	}
    	return ajaxReturn(\SUCCESS,'更新菜单成功');
    } 
}
?>