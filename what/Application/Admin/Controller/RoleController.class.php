<?php
namespace Admin\Controller;
//use Think\Controller;
//import("ZHKit.Constants");
//class RoleController extends Controller {
//继承commonController
class RoleController extends CommonController {
	public function index() {
		//获取角色列表信息
		$cond['status'] = array('neq', -1);
		$roles = D('Role') -> where($cond) -> select();
		if ($roles === FALSE) {
			return ajaxReturn(\DATABASE_ERROR, '数据库查询失败');
		}
		$this -> assign('roles', $roles);
		//把模板变量输出出去
		$this -> display();
	}

	//创建assignAuth方法
	public function assignAuth() {
		if ($_POST) {
			//			cDebug($_POST);
			try {
				$res = D('Role') -> saveAuth(intval(I('role_id')), I('menu_id'));
				if ($res === FALSE) {
					return ajaxReturn(\DATABASE_ERROR, '权限更新失败');
				}
				return ajaxReturn(\SUCCESS, '权限更新成功');
			} catch(Exception $e) {
				return ajaxReturn(\UPDATE_ERROR, $e -> getMessage());
			}
		} else {
			$id = I('id');
			//	cDebug($id);
			if ($id === null || $id == '') {
				return ajaxReturn(\ARGUMENT_ERROR, '未获取角色id');
			}
			//获取当前角色信息
			$role = D('Role') -> find(intval($id));
			//获取全部权限信息
			$menus = D('Menu') -> getMenus(array('status' => array('neq', -1)));
			//获取当前角色拥有的id权限
			//			$role_menu_ids = $role['role_menu_ids'];
			//使用explode()方法来分割
			$role_menu_ids = explode(',', $role['role_menu_ids']);
			$this -> assign('menus', $menus);
			$this -> assign('role', $role);
			$this -> assign('role_menu_ids', $role_menu_ids);
			$this -> display();
		}
	}

	function add() {
		if ($_POST) {
			//			cDebug($_POST);
			//表单验证
			$validData = D('Role') -> create();
			//使用D()方法调用模板中的create()方法
			//			cDebug($validData);
			if ($validData) {
				//编辑的逻辑
				//				cDebug($_POST);
				if ($_POST['id']) {
					return $this -> save($_POST);
				}
				//执行新增操作
				$res = D('Role') -> add($validData);
				//如果验证通过就把数据存在这个role表里面
				if ($res === FALSE) {
					//					return ajaxReturn(0,'数据新增失败');
					return ajaxReturn(\DATABASE_ERROR, '数据新增失败');
				}
				//				return ajaxReturn(1,'新增菜单成功');
				return ajaxReturn(\SUCCESS, '新增角色成功');
			} else {
				//执行报错信息
				//				$msg = D('Menu')->getError();
				//				return ajaxReturn(0,$msg);
				//可以简写
				//				cDebug(D('Menu')->getError());//测试报错信息
				//				return ajaxReturn(0,D('Menu')->getError());
				//0使用自定义常量替换即（VALIDATE_ERROR）

				return ajaxReturn(\VALIDATE_ERROR, D('Role') -> getError());
			}
		} else {
			$this -> display();
		}

	}

	function edit() {
		$id = I('id');
		if ($id === null || $id === '') {
			return ajaxReturn(\ARGUMENT_ERROR, '未获取角色id');
		}
		$role = D('Role') -> find($id);
		if ($role === FALSE) {
			return ajaxReturn(\DATABASE_ERROR, '数据库查询失败');
		}
		$this -> assign('role', $role);
		$this -> display();
	}

	//更新数据API
	public function save($data) {
		//		$menu_id = I('id');
		$role_id = I('id');
		//把id 释放掉
		unset($data['id']);
		$res = D('Role') -> where('role_id=' . $role_id) -> save($data);
		//		try{
		////		 $res = D('Menu')->updateMenuById($menu_id,$data);
		//		 $res = D('Menu')->where('role_id='.$role_id)->save($data);
		//		}catch(Exception $e){
		//			return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
		//		}
		if ($res === FALSE) {
			return ajaxReturn(\DATABASE_ERROR, '数据库更新失败');
		}
		return ajaxReturn(\SUCCESS, '更新角色成功');
	}

	//修改状态的API
	public function setStatus() {
		//		cDebug($_POST);
		if ($_POST) {
			$role_id = I('id');
			$data['status'] = intval(I('status'));
			//到数据库中跟新字段
			//			try{
			//			$res = D('Menu')->updateMenuById($menu_id,$data);
			//			if($res === FALSE){
			//			return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
			//			}
			//
			//			}catch(Exception $e){
			//				return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
			//			}
			$res = D('Role') -> where('role_id=' . $role_id) -> save($data);
			if ($res === FALSE) {
				return ajaxReturn(\DATABASE_ERROR, '数据库删除失败');
			}
			return ajaxReturn(\SUCCESS, '删除角色成功');
		}
		return ajaxReturn(\ARGUMENT_ERROR, '未获取更新数据');
	}

}
?>