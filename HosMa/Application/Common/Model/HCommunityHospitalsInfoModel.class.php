<?php
namespace Common\Model;
use Think\Model;

class HCommunityHospitalsInfoModel extends Model{
	//设置表单验证规则
	protected $_validate = array(
		array('community_hospitals_name','require','医院名称不能为空'),
		array('community_hospitals_address','require','医院地址不能为空'),
		array('community_hospitals_principal','require','医院负责人不能为空'),
		array('principal_contact_phone','require','联系方式不能为空'),
		array('hospital_bad_number','require','输液床位不能为空'),
		array('hospital_seat_number','require','输液座位不能为空'),
		array('hospital_business_time','require','营业时间不能为空'),
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
	//获取医院信息
	public function getHospitals($cond=array(),$page=1,$pageSize=10){
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
	//按照id更新医院数据
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