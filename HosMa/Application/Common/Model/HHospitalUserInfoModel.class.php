<?php
namespace Common\Model;
use Think\Model;

class HHospitalUserInfoModel extends Model{
	//登录部分
//	private $_db='';//定义一个数据库私有变量
//		//写一个构造方法
//		public function __construct(){
//			//既能调用父类也能调用子类方法
////			parent::__construct();
//			//调用一个成员变量,M();方法是thinkphp中的方法，它的作用是实例化一个数据库表
//			$this->_db = M('h_hospital_user_info');//把一个表转化为实例化对象
//		}
		//查询医院内码的方法
	public function findHospitalCode($hospitalCode) {
		//做判断 是为了防止服务器挂掉
		//如果传入的值为空就抛出异常  管理员账号不合法
		if (!$hospitalCode) {
			throw_exception('查询医院内码时超级管理员账号不合法');
		}
		//操作数据库,这个字段（hospital_user_no）=传进来的值（$adminName）这个字段等于传进来的值
		$condition['community_hospital_numbers'] = $hospitalCode;
		//$res = $this->_db->where($condition)->find();//连贯去掉，查询一个用户名
		$res = $this->where($condition) -> find();
//		$res = $this->_db->join('h_hospitals_info on h_hospital_user_info')
//		$list = M('h_hospital_user_info')-> join('h_hospitals_info on h_hospital_user_info.community_hospitals_id=h_user_limit_info.hospital_user_id')->select();
//		var_dump($res);exit;
//		cDebug($res);
		return $res;
	}
	
	//查找登录密码方法
	public function findUserPassword($hospitalID,$employeeNumber) {
		//做判断 是为了防止服务器挂掉
		//如果传入的值为空就抛出异常  管理员账号不合法
		if (!$hospitalID || !$employeeNumber) {
			throw_exception('错误信息');
		}
		//操作数据库,这个字段（hospital_user_no）=传进来的值（$adminName）这个字段等于传进来的值
		$condition['community_hospitals_id'] = $hospitalID;
		$condition['hospital_user_no'] = $employeeNumber;
		//$res = $this->_db->where($condition)->find();//连贯去掉，查询一个用户名
		$res = $this->where($condition) -> find();
//		var_dump($res);exit;
		return $res;
	}
	//登录部分结束
	
	//设置表单验证规则
	protected $_validate = array(
		array('hospital_user_name','require','员工姓名不能为空'),
		array('hospital_user_no','require','员工工号不能为空'),
		array('hospital_offic_id','require','科室编号不能为空'),
		array('hospital_user_phone','require','联系方式不能为空'),
	);
//	//是否批量处理验证
	protected $patchValidate = true;
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
	public function getUsers($cond=array(),$page=1,$pageSize=10){
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
		if($data === null || !is_array($data)){
			throw_exception('菜单数据不合法');
		}
		return $this->where('article_id='.$id)->save($data);
	}
	
	
	
}
?>