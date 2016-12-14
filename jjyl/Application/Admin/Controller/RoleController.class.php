<?php
namespace Admin\Controller;
//use Think\Controller;
//import("ZHKit.Constants");
class RoleController extends CommonController {
    public function index(){
    	//获取角色列表信息
      	$cond['status'] = array('neq',-1);
        $roles = D('Role')->where($cond)->select();
        if ($roles === false){
        	return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
        }
        $this->assign('roles',$roles);
          $this->display();
    }    
    
    public function assignAuth(){
    	if($_POST){
    		$res = D('Role')->saveAuth(intval(I("role_id")),I("menu_id"));
    		if($res === false){
    			return ajaxReturn(\DATABASE_ERROR,'权限更新失败');
    		}
    		return ajaxReturn(\SUCCESS,'权限更新成功');
    	}else{
    		$id = I('id');
	    	if($id === null || $id == ''){
	    		return ajaxReturn(\ARGUMENT_ERROR,'未获取角色id');
	    	}
	    	//获取当前角色信息
			$role = D('Role')->find(intval($id));
			//获取当前角色拥有权限的id
			$role_menu_ids =explode(',',$role['role_menu_ids']);
			//获取全部权限信息
			$menus = D('Menu')->getMenus(array('status'=>array('neq',-1)));
			$this->assign('role',$role);
			$this->assign('role_menu_ids',$role_menu_ids);
			$this->assign('menus',$menus);
	    	$this->display();
    	}
    }
    
    function add(){
    	if($_POST){
    		//表单验证
    		$validData = D('Role')->create();
    		if($validData){
      			//编辑的逻辑
    			if($_POST['id']){
    				return $this->save($_POST);
    			}
      			//执行新增操作
    			$res = D('Role')->add($validData);
    			if($res === FALSE){
    				return ajaxReturn(\DATABASE_ERROR,'角色新增失败！');
    			}
    			return ajaxReturn(\SUCCESS,'角色新增成功！');
	    	}else{
	    		return ajaxReturn(\VALIDATE_ERROR,D('Menu')->getError());
	    		}
	    }else{
	    	$this->display();
	    }
	}  
	
	function edit(){
		$id = I('id');
		if($id === null || $id ===''){
			return ajaxReturn(\ARGUMENT_ERROR,'未获取角色id');
		}
		$role = D('Role')->find($id);
		if ($role === false){
			return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
		}
		$this->assign('role',$role);
		$this->display();
	} 
	
	//更新数据
   public function save($data){
    	$role_id=$data['id'];
    	unset($data['id']);
    	$res = D('Role')->where('role_id='.$role_id)->save($data);
    	if($res===false){
    		return ajaxReturn(\DATABASE_ERROR,"数据库更新失败");
    	}
    	return ajaxReturn(\SUCCESS,'菜单更新成功！');
    	
    } 
    
    //修改status的API
    public function setStatus(){
    	if($_POST){
    		$role_id=I('id');
    		$data['status']=intval(I('status'));	
	    		//到数据库更新字段
	    	$res = D('Role')->where('role_id='.$role_id)->save($data);
	    	if($res===false){
	    		return ajaxReturn(\DATABASE_ERROR,"角色删除失败");
	    	}
    		return ajaxReturn(\SUCCESS,'角色删除成功！');
    	}
    	return ajaxReturn(\ARGUMENT_ERROR,'未获取更新数据');
	}
}