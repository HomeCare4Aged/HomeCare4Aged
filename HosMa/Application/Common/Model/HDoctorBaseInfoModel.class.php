<?php
namespace Common\Model;
use Think\Model;

class HDoctorBaseInfoModel extends Model{
	//设置表单验证规则
	protected $_validate = array(
		array('hospital_doctor_name','require','医生姓名不能为空'),
		array('hospital_doctor_identity','require','医生职称不能为空'),
		array('hospital_offic_id','require','科室编号不能为空'),
		array('hospital_doctor_introduction','require','简介不能为空'),
		array('hospital_doctor_phone','require','联系方式不能为空'),
		array('hospital_doctor_picture','require','照片必须上传'),
		array('registration_predict_money','require','挂号费用不能为空'),
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
			throw_exception('新增的医生信息不合法');
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
			$pageSize = $pageSize !== null ? $pageSize : 5;
			//每页的起点（偏移量）
			$offset = ($page - 1) * $pageSize;
//			$this->limit($offset,$pageSize);    //查询条数
		}
			$list = M('h_doctor_base_info')->limit($offset,$pageSize)-> join('h_hospital_office_info on h_doctor_base_info.hospital_office_id=h_hospital_office_info.hospital_office_id')
			->join('h_indentity_info on h_doctor_base_info.hospital_doctor_identity=h_indentity_info.identity_id')
			 ->select();
//		cdebug($list);
		return $list;
	}
	//获取菜单组数
	public function getMenusCount($cond=array()){
		return $this->where($cond)->count();
	}
	
	//按照id查询
	public function findMenuById($id){
		if($id == null){
			throw_exception('医生ID不合法');
		}
		$cond['article_id'] = intval($id);
		return $this->where($cond)->find();
	}
	
	//按照id更新数据
	public function updateMenuById($id,$data){
		if($id === null || !is_numeric($id)){
			throw_exception('医生ID不合法');
		}
		if($data === null || !is_array($data)){
			throw_exception('医生数据不合法');
		}
		return $this->where('article_id='.$id)->save($data);
	}
}
?>