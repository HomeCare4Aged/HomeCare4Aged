<?php
namespace Admin\Controller;
use Think\Controller;
import("XXKit.Constants");
import("XXKit.ImageUploader");
use XXKit\ImageUploader;

class UserController extends Controller {
    public function index(){
//  	cdebug($_POST);
    	$nav_admin = session(C(('ADMIN_SESSION')));
    	$cond = array(
			//筛选掉已经删除的数据
			'state' => array('neq',-1),
			'community_hospitals_id' => $nav_admin['community_hospitals_id'],
		);
		//分页逻辑
		$page = $_REQUEST['p'] ? $_REQUEST[p] : 1;
		$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;
		$users = D('HHospitalUserInfo')->getUsers($cond,$page,$pageSize);
		$articlesCount = D('HHospitalUserInfo')->getMenusCount($cond);
//		cdebug(I('id'));
		//获取全部权限信息
		$menus = D('HHospitalUserInfo')->getMenus(array('state' => array('neq',-1)));
		//获取当前角色拥有的权限信息
		$role_menu_ids = explode(',', $users['limit_id']);
		//分页控件
		$pageObj = new \Think\Page($articlesCount,$pageSize);
		//获取分页结果
		$pageRes = $pageObj->show();
		//绑定模板变量
		$this->assign('users',$users);
		$this->assign('pageRes',$pageRes);
		$this->assign('menus',$menus);
    	$this->display();
    }
    //角色权限获取
    public function assignAuth(){
		$data = $_POST['hospital_user_id'];
//		$userMsg = D('HHospitalUserInfo')->getAssign($data);
//  	if($_POST){
//  		try{
//  			$res = D('h_user_limit_info')->saveAuth(intval(I('hospital_user_id')),I('limit_id'));
//  			if($res === false){
//  				return ajaxReturn(\DATABASE_ERROR,'权限更新失败');
//  		}
//  				return ajaxReturn(\SUCESS,'权限更新成功');
//  			}catch(exception $e){
//  				return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
//  		}
//  		
//  	}else{
    		$id = I('hospital_user_id');
	    	if($id === null || $id == ''){
	    		return ajaxReturn(\ARGUMENT_ERROR,'未获取角色ID');
	    	}
	    	//获取当前角色权限信息
	    	$role = D('h_user_limit_info')->where($_POST)->find();
	    	//获取全部权限信息
	    	$menus = D('HHospitalUserInfo')->getMenus(array('state' => array('neq',-1)));
	    	//获取当前角色拥有的权限ID
	    	$role_menu_ids = explode(',', $role['limit_id']);
//	    	cDebug($role_menu_ids);
	    	$this->assign('menus',$menus);
	    	$this->assign('role',$role);
	    	$this->assign('role_menu_ids',$role_menu_ids);
	    	$this->display();
//  	}
    }
    //点击添加文章按钮
    public function add(){
		if($_POST){
			//表单验证
			$validData = D('HHospitalUserInfo')->create();
//			cDebug($validData);
			if($validData){
				//编辑逻辑
//				if($_POST['id']){
//					return $this->save($_POST);
//				}
				//执行新操作
				$nav_admin = session(C(('ADMIN_SESSION')));
				$validData['community_hospitals_id'] = $nav_admin['community_hospitals_id'];
				$validData['hospital_user_id'] = get_uuid();
				$res = D('HHospitalUserInfo')->inset($validData);
				if($res === false){
					return ajaxReturn(\DATABASE_ERROR,'数据库新增失败');
				}
				return ajaxReturn(\SUCCESS,'添加员工成功');
			}else{
				return ajaxReturn(\VALIDATE_ERROR,D('HHospitalUserInfo')->getError());
			}
		}else{
//			cDebug($res);
			$this->display();
		}
    }
}