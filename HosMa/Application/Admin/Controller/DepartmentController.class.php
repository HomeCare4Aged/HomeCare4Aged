<?php
namespace Admin\Controller;
use Think\Controller;
import("XXKit.Constants");
import("XXKit.ImageUploader");
use XXKit\ImageUploader;

class DepartmentController extends Controller {
    public function index(){
    	$cond = array(
			//筛选掉已经删除的数据
			'state' => array('neq',-1),
		);
		$nav_admin = session(C(('ADMIN_SESSION')));
    	$admin = array(
			'community_hospitals_id' => $nav_admin['community_hospitals_id'],
		);
		$officesList = D('h_hospital_office_list')->where($admin)->find();
		$cond = array(
			'hospital_office_id' => array('not in',$officesList['hospital_office_id']),
		);
		$hospital_office_ids = $officesList['hospital_office_id'];
		$useroffices = D('h_hospital_office_info')->select($hospital_office_ids);
		$offices = D('h_hospital_office_info')->where($cond)->select();
//		cDebug($offices);
		//绑定模板变量
		$this->assign('useroffices',$useroffices);
		$this->assign('offices',$offices);
		$this->assign('pageRes',$pageRes);
    	$this->display();
    }
    //点击添加科室按钮
    public function add(){
		if($_POST){
			//表单验证
			$validData = D('HHospitalOfficeInfo')->create();
			if($validData){
//				编辑逻辑
//				if($_POST['id']){
//					return $this->save($_POST);
//				}
				//执行新操作
				$validData['hospital_office_id'] = get_uuid();
				$res = D('HHospitalOfficeInfo')->inset($validData);
				if($res === false){
					return ajaxReturn(\DATABASE_ERROR,'数据库新增失败');
				}
				return ajaxReturn(\SUCCESS,'新增科室成功');
			}else{
				return ajaxReturn(\VALIDATE_ERROR,D('HHospitalOfficeInfo')->getError());
			}
		}else{
//			cDebug($res);
			$this->display();
		}
    }
    public function assignAuth(){
    	if($_POST){
    		try{
    			$res = D('Role')->saveAuth(intval(I('role_id')),I('menu_id'));
    			if($res === false){
    				return ajaxReturn(\DATABASE_ERROR,'权限更新失败');
    		}
    				return ajaxReturn(\SUCESS,'权限更新成功');
    			}catch(exception $e){
    				return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
    		}
    		
    	}else{
    		$id = I('id');
//  		cdebug($id);
	    	if($id === null || $id == ''){
	    		return ajaxReturn(\ARGUMENT_ERROR,'未获取角色ID');
	    	}
	    	//获取当前角色信息
	    	$role = D('Role')->find(intval($id));
	    	//获取全部权限信息
	    	$menus = D('Menu')->getMenus(array('status' => array('neq',-1)));
	    	//获取当前角色拥有的权限ID
	    	$role_menu_ids = explode(',', $role['role_menu_ids']);
	    	$this->assign('menus',$menus);
	    	$this->assign('role',$role);
	    	$this->assign('role_menu_ids',$role_menu_ids);
	    	$this->display();
    	}
    }
    //更新数据的API
	public function save(){
		$nav_admin = session(C(('ADMIN_SESSION')));
		$menu_id = $nav_admin['community_hospitals_id'];
    	$admin = array(
			'community_hospitals_id' => $nav_admin['community_hospitals_id'],
		);
		$officesList = D('h_hospital_office_list')->where($admin)->find();
		$hospital_office_ids = $officesList['hospital_office_id'];
			$officeSave = D('h_hospital_office_info')->where($_POST)->find();
			$officeData = array(
				'office1' => $hospital_office_ids,
				'office2' => $officeSave['hospital_office_id'],
			);
			$role_menu_ids = implode(',',$officeData);
//			cdebug($nav_admin);
			unset($data['hospital_doctor_id']);
			try{
				$res = D('HHospitalOfficeInfo')->updateMenuById($menu_id,$role_menu_ids);
			}catch(exception $e){
				return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
			}
			if($res === false){
				return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
			}
				return ajaxReturn(\SUCCESS,'添加科室成功');
		}
}