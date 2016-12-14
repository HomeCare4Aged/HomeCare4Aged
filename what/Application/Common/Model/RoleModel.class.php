<?php
////这个类的名字要和数据库 的表名要一致
namespace Common\Model;
use Think\Model;
class RoleModel extends Model {

	//写一个成员变量,设置表单验证规则
	protected $_validate = array(
	//array('验证字段'，'验证规则'，'错误信息',【验证条件，附近规则，验证时间】)
	array('role_name', 'require', '角色名不能为空'),
	//验证条件可以用正则表达式确定
	//		array('menu_action','index','操作名只能是index',0,'equal'),
	);
	// 是否批处理验证
	protected $patchValidate = true;
	//	function getRoleById(){
	//		$this->select();
	//	}
	function saveAuth($role_id, $data) {
		if ($role_id === null || !is_numeric($role_id)) {
			//			var_dump($id);exit;
			//			cDebug($id);
			throw_exception('角色id不合法aa');
		}
		if ($data === null || !is_array($data)) {
			throw_exception('角色数据不合法');
		}
		$role_menu_ids = implode(',', $data);
		//这个经常用
		//		cDebug($role_menu_ids);
		$menus = D('Menu') -> select($role_menu_ids);
		$role_menu_path = '';
		foreach ($menus as $k => $menu) {
			$role_menu_path .= $menu['menu_controller'] . '-' . $menu['menu_action'] . ',';
		}
		$role_menu_path = rtrim($role_menu_path, ',');
		//去掉右边的逗号，经常用
		//		cDebug($role_menu_path);
		$updateData = array('role_menu_ids' => $role_menu_ids, 'role_menu_path' => $role_menu_path, );
		return $this -> where('role_id=' . $role_id) -> save($updateData);
		//		cDebug($role_menu_path);
	}

}
?>