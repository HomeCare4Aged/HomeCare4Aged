<?php
namespace Common\Model;
use Think\Model;

class h_hospital_user_infoModel extends Model{
	//设置表单验证规则
	protected $_validate = array(
	array('hospital_user_no','require','账号不能为空！'),
	array('hospital_user_psw','require','密码不能为空！'),
	);
	
	// 是否批处理验证
    protected $patchValidate = true;
	
	
	public function findAdminByName($adminName){
		if (!$adminName){
			throw_exception('管理员账号不合法');
		}
		$condition['hospital_user_no'] = $adminName;
		$res = $this->where($condition)->find();
		return $res;
	}
	
	
	public function getAdminInfo($cond=array(),$page,$pageSize){
		 $this->where($cond) //查询条件
			->order('admin_id asc') ;     //排序规则
			//处理分页的业务
			if ($page === null || $pageSize === null){
				$page = $page !== null  ? $page : 1 ;
				$pageSize = $pageSize !== null  ? $pageSize : 10 ;
				$offset = ($page-1) * $pageSize; //每页的起点(偏移量)
				$this->limit($offset,$pageSize);	 //查询条数
			}
			$list=$this->select();
		return $list;
	}
	
	public function getAdminInfoCount($cond=array()){
		return $this->where($cond)->count();
	}
	
	
	//新增管理员
	public function insert($data){
	if (!$data || !is_array($data)){
			throw_exception('新增菜单信息不合法');
		}
	
		//如果新增成功，会返回新增记录的主键值
		return $this->add($data);
	}
	
	
	//按照ID去更新数据
	public function updateAdminById($id,$data){
		if($id===null||!is_numeric($id)){
			throw_exception('管理员ID不合法');
		}
		if($data===null||!is_array($data)){
			throw_exception('管理员不合法');
		}
		return $this->where('admin_id='.$id)->save($data);
	}
	
	public function getHospitalAccountInfo($cond=array(),$page,$pageSize){
			
			if ($page === null || $pageSize !== null){
				$page = $page !== null  ? $page : 1 ;
				$pageSize = $pageSize !== null  ? $pageSize : 10 ;
				$offset = ($page-1) * $pageSize; //每页的起点(偏移量)
			}
			
			$list=M('h_hospital_user_info')->order('community_hospital_numbers desc')->limit($offset,$pageSize)->join('h_hospitals_info on h_hospital_user_info.community_hospitals_id=h_hospitals_info.community_hospitals_id')->where($cond)->select();
//			cdebug($list);
		return $list;
	}
	
	public function getMenuCount(){
		return $this->count();
	}
}
?>