<?php
namespace Common\Model;
use Think\Model;

class RoleModel extends Model{
	
	//设置表单验证规则
	protected $_validate = array(
	array('role_name','require','角色名不能为空！'),
	);
	
	// 是否批处理验证
    protected $patchValidate = true;
	
	public function saveAuth($role_id,$data){
		if($role_id===null||!is_numeric($role_id)){
			throw_exception('角色ID不合法');
		}
		if($data===null||!is_array($data)){
			throw_exception('角色数据不合法');
		}
		$role_menu_ids = implode(',',$data);
//		cDebug($role_menu_ids);
		$menus = D('Menu')->select($role_menu_ids);
		$role_menu_path='';
		foreach ($menus as $k =>$menu){
			$role_menu_path .=$menu['menu_controller'].'-'.$menu['menu_action'].',';
		}
		$role_menu_path = rtrim($role_menu_path,',');
		$updateData = array(
			'role_menu_ids' => $role_menu_ids,
			'role_menu_path' => $role_menu_path,
		);
		
		return $res  = $this->where('role_id='.$role_id)->save($updateData);
	 
	}
}
?>