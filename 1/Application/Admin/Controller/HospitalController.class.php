<?php
namespace Admin\Controller;

class HospitalController extends CommonController {
	
	//加载医院管理模块的首页
    public function index(){
    	//分页逻辑
    	$page = $_REQUEST['p'] ? $_REQUEST['p'] : 1 ;
	    $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10 ;
	    $articles = D('h_community_hospitals_info')->getCommunityHospitalsInfos($cond,$page,$pageSize);
	    $articleCount = D('h_community_hospitals_info')->getCommunityHospitalsInfoCount($cond);
	    	
	    //分页控件
	    $pageObj = new \Think\Page($articleCount,$pageSize);
	    	
	    //获取分页结果
	    $pageRes = $pageObj->show();
//	    $this->assign('articleCount',$articleCount)	
	    //绑定模板变量     
	    $this->assign('articles',$articles);
	    $this->assign('pageRes',$pageRes);
	    	
	    //输出模板
        $this->display();
    }
    
    public function edit(){
    	$this->display();
    }
}
?>