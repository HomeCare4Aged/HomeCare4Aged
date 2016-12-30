<?php
namespace Common\Model;
use Think\Model;

class h_user_scheduling_listModel extends Model{
//	//设置表单验证规则
	protected $_validate = array(
		array('open_registration_number','require','号池数量不能为空'),
		array('open_registration_number','number','请输入数字'),
		
	);
//	//是否批量处理验证
	protected $patchValidate = true;


//	新增菜单数据
	public function insert($data){
	if (!$data || !is_array($data)){
			throw_exception('新增菜单信息不合法');
		}
	
		//如果新增成功，会返回新增记录的主键值
		return $this->add($data);
	}
//	
	//获取菜单信息
	public function getSchedules($cond=array(),$page=1,$pageSize=10){
			$this->where($cond) //查询条件
				 ->order('schedule_date desc,hospital_doctor_id desc');     //排序规则
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
	//获取在班医生信息
	public function getDoctors($cond=array(),$page=1,$pageSize=10){
		//处理分页的业务
		if($page === null || $pageSize !== null){
			$page = $page !== null ? $page : 1;
			$pageSize = $pageSize !== null ? $pageSize : 10;
			//每页的起点（偏移量）
			$offset = ($page - 1) * $pageSize;
			$this->limit($offset,$pageSize);    //查询条数
		}
			$list = M('h_doctor_base_info')->where($cond)
			->join('h_user_scheduling_list on h_doctor_base_info.hospital_doctor_id=h_user_scheduling_list.hospital_doctor_id')
			->join('h_indentity_info on h_doctor_base_info.hospital_doctor_identity=h_indentity_info.identity_id')
			->join('h_hospital_office_info on h_doctor_base_info.hospital_office_id=h_hospital_office_info.hospital_office_id')
			->select();
		return $list;
	}
	//获取菜单组数
	public function getMenusCount($cond=array()){
		return $this->where($cond)->count();
	}
	
//	//按照id查询
//	public function findMenuById($id){
//		if($id == null){
//			throw_exception('菜单ID不合法');
//		}
//		$cond['article_id'] = intval($id);
//		return $this->where($cond)->find();
//	}
//	
//	//按照id更新数据
//	public function updateMenuById($id,$data){
//		if($id === null || !is_numeric($id)){
//			throw_exception('菜单ID不合法');
//		}
//		if($data === null || !is_array($data)){
//			throw_exception('菜单数据不合法');
//		}
//		return $this->where('article_id='.$id)->save($data);
//	}
}
?>