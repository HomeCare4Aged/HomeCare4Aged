<?php
namespace Admin\Controller;
//use Think\Controller;
//import("ZHKit.Constants");

class MenuController extends CommonController {
	
	//加载菜单管理模块的首页
    public function index(){
    	$cond=array(
    		//筛选掉已经删除的数据
    		'status'=>array('neq',-1),
    	);
    	
    	//分类搜索逻辑
    	if(isset($_REQUEST['type'])&& $_REQUEST['type'] != -100){
    		$cond['type'] = intval($_REQUEST['type']);
    		$this->assign('type',$cond['type']);
    	}else{
    		$this->assign('type',-100);
    	}
    	//分页逻辑
    	$page=$_REQUEST['p'] ?$_REQUEST['p']:1;
    	$pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:10;
    	$menus=D('Menu')->getMenus($cond,$page,$pageSize);
    	$menusCount=D('Menu')->getMenuCount($cond);
    	//分页控件
    	$pageObj = new \Think\Page($menusCount,$pageSize);
    	//获取分页结果
    	$pageRes = $pageObj->show();
    	//绑定模板变量
    	$this->assign('menus',$menus);
    	$this->assign('pageRes',$pageRes);
    	//输出模板
        $this->display();
    }
    public function add(){
    	if($_POST){
    		//表单验证
    		$validData = D('Menu')->create();
    		if($validData){
    			//编辑的逻辑
    			if($_POST['id']){
    				return $this->save($_POST);
    			}
    			//执行新增操作
    			$res = D('Menu')->insert($validData);
    			if($res === FALSE){
    				return ajaxReturn(\DATABASE_ERROR,'数据库新增失败！');
    			}
    			return ajaxReturn(\SUCCESS,'数据库新增成功！');
    		}
    		else{
    			return ajaxReturn(\VALIDATE_ERROR,D('Menu')->getError());
    		}
    	}else{
    		$this->display();
    	}
    	
    }
    //编辑显示页
    public function edit(){
    	$menu_id = I('id');
    	try{
    		$menu = D('Menu')->findMenuById($menu_id);
    	}catch(Exception $e){
    		return ajaxReturn(\QUERY_ERROR ,$e->getMessage());
    	}
    	if($menu === false){
    		return ajaxReturn(\DATABASE_ERROR,"数据库查询失败");
    	}
    	$this->assign("menu",$menu);
    	$this->display();
    }
      //更新数据
   public function save($data){
    	$menu_id=$data['id'];
    	unset($data['id']);
    	try{
    		$res = D('Menu')->updateMenuById($menu_id,$data);
    	}catch(Exception $e){
    		return ajaxReturn(\UPDATA_ERROR,$e->getMessage());
    	}
    	if($res===false){
    		return ajaxReturn(\DATABASE_ERROR,"数据库查询失败");
    	}
    	return ajaxReturn(\SUCCESS,'菜单新增成功！');
    	
    }
    
    //修改status的API
    public function setStatus(){
    	if($_POST){
    		$menu_id=I('id');
    		$data['status']=intval(I('status'));	
	    		//到数据库更新字段
	    	try{
	    		$res =D('Menu')->updateMenuById($menu_id,$data);
	    		if($res===false){
	    			return ajaxReturn(\DATABASE_ERROR,"数据库查询失败");
	    		}
	    		return ajaxReturn(\SUCCESS,'删除菜单成功！');
	    	}catch(Exception $e){
	    		return ajaxReturn(\UPDATA_ERROR,$e->getMessage());
	    	}
    	}
    	return ajaxReturn(\ARGUMENT_ERROR,'未获取更新数据');
    }
    
    //排序
    
    public function listOrder(){
    	if($_POST){
    		$errors = array();
    		foreach(I('list_order') as $menuId =>$listOrder){
    			$menu_id = intval($menuId);
    			$data['list_order'] = intval($listOrder);
    			try{
		    		$res = D('Menu')->updateMenuById($menu_id,$data);
		    		if($res===false){
	    			$errors[] = $menu_id;
	    		}
		    	}catch(Exception $e){
		    		$errors[] = $menu_id;
		    		
		    	}
    		}
    		if ($errors){
    			return ajaxReturn(\UPDATA_ERROR,'菜单id为:'.implode(',',$errors).'的数据排序失败');
    		}
    		return ajaxReturn(\SUCCESS,'排序成功');
    	}
    	return ajaxReturn(\ARGUMENT_ERROR,'未获取跟新数据');
    }
    
}
?>