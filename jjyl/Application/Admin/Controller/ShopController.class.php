<?php
namespace Admin\Controller;

class ShopController extends CommonController {
	
	//加载店铺管理模块的首页
    public function index(){
    	//分页逻辑
    	$page = $_REQUEST['p'] ? $_REQUEST['p'] : 1 ;
	    $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10 ;
	    $articles = D('s_store_shop_info')->getStoreShopInfos($cond,$page,$pageSize);
	    $articleCount = D('s_store_shop_info')->getStoreShopInfoCount($cond);
	    	
	    //分页控件
	    $pageObj = new \Think\Page($articleCount,$pageSize);
	    	
	    //获取分页结果
	    $pageRes = $pageObj->show();
	    	
	    //绑定模板变量        
	    $this->assign('articles',$articles);
	    $this->assign('pageRes',$pageRes);
	    	
	    //输出模板
        $this->display();
    }
}
?>