<?php
namespace Common\Model;
use Think\Model;

class HHospitalOfficeInfoModel extends Model{
	//设置表单验证规则
	protected $_validate = array(
		array('hospital_office_name','require','科室名称不能为空'),
		array('hospital_office_id','require','科室编号不能为空'),
		array('hospital_office_introduction','require','科室简介不能为空'),
	);
//	//是否批量处理验证
	protected $patchValidate = true;
//	private $_db = '';
	
	//构造方法
//	public function __construct(){
//		parent::__construct();
//		$this->_db = M('doctor_base_info');
//	}
	//新增菜单数据
	public function inset($data){
		if(!$data || !is_array($data)){
			throw_exception('新增的菜单信息不合法');
		}
		//如果新增成功，会返回新增记录的主键值
		return $this->add($data);
	}
//	
	//获取菜单信息
	public function getDoctors($cond=array(),$page=1,$pageSize=10){
			$this->where($cond); //查询条件
//				->order('list_order desc,article_id desc');     //排序规则
		//处理分页的业务
		if($page === null || $pageSize !== null){
			$page = $page !== null ? $page : 1;
			$pageSize = $pageSize !== null ? $pageSize : 10;
			//每页的起点（偏移量）
			$offset = ($page - 1) * $pageSize;
			$this->limit($offset,$pageSize);    //查询条数
		}
			$list = $this->select();
		return $list;
	}
	//获取菜单组数
	public function getMenusCount($cond=array()){
		return $this->where($cond)->count();
	}
	
	//按照id查询
	public function findMenuById($id){
		if($id == null){
			throw_exception('菜单ID不合法');
		}
		$cond['article_id'] = intval($id);
		return $this->where($cond)->find();
	}
	
	//按照id更新数据
	public function updateMenuById($id,$data){
		if($id === null || !is_numeric($id)){
			throw_exception('菜单ID不合法');
		}
		if($data === null){
			throw_exception('菜单数据不合法');
		}
		$updataData = array(
			'hospital_office_id' => $data,
		);
		return M('h_hospital_office_list')->where('community_hospitals_id='.$id)->save($updataData);
	}
	//更新权限
	function saveAuth($role_id,$data){
		if($role_id === null || !is_numeric($role_id)){
			throw_exception('角色ID不合法');
		}
		if($data === null || !is_array($data)){
			throw_exception('角色数据不合法');
		}
		$role_menu_ids = implode(',',$data);
		$menus = D('Menu')->select($role_menus_ids);
		$role_menu_path = '';
		foreach($menus as $k => $menu){
			$role_menu_path.= $menu['menu_controller'].'-'.$menu['menu_action'].',';
		}
		$role_menu_path = rtrim($role_menu_path,',');
		$updateData = array(
			'role_menu_ids' => $role_menu_ids,
			'role_menu_path' => $role_menu_path,
		);
//		cDebug($updateData);
		return $this->where('role_id='.$role_id)->save($updateData);
		
	}
}
?>