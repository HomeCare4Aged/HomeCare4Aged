<?php
namespace Common\Model;
use Think\Model;

class h_hospitals_infoModel extends Model{
	
	//设置表单验证规则
	protected $_validate = array(
	array('community_hospitals_name','require','医院名不能为空！'),
	array('community_hospital_numbers','require','医院编号不能为空！'),
	);
	
	// 是否批处理验证
    protected $patchValidate = true;
	
	//新增菜单数据
	public function insert($data){
	if (!$data || !is_array($data)){
			throw_exception('新增菜单信息不合法');
		}
	
		//如果新增成功，会返回新增记录的主键值
		return $this->add($data);
	}
	
	public function getMenus($cond=array(),$page,$pageSize){
		 $this->where($cond) //查询条件
			->order('list_order desc,menu_id desc') ;     //排序规则
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
	
	public function getMenuCount($cond=array()){
		return $this->where($cond)->count();
	}
	
	public function findMenuById($id){
		if($id === null){
			throw_exception('菜单ID不合法');
		}
		$cond['menu_id'] = intval($id);
		return $this->where($cond)->find();
	}
	
	//按照ID去更新数据
	public function updateMenuById($id,$data){
		if($id===null||!is_numeric($id)){
			throw_exception('菜单ID不合法');
		}
		if($data===null||!is_array($data)){
			throw_exception('菜单数据不合法');
		}
		return $this->where('menu_id='.$id)->save($data);
	}
	//获取医院信息
	public function getCommunityHospitalsInfos($cond=array(),$page,$pageSize){
		$this->where($cond)           //查询条件
		        ->order('community_hospitals_id desc');            //排序规则
		//处理分页的业务
		if ($page!== null || $pageSize !== null){
			$page = $page !== null ? $page : 1;
			$pageSize = $pageSize !== null ? $pageSize : 15;
			//每页的起点（偏移量）
		    $offset = ($page-1) * $pageSize;
		    $this->limit($offset,$pageSize);         //查询条数
		}   
		$list = $this->select();
		return $list;
	}
	
	//获取医院总数
	public function getCommunityHospitalsInfoCount($cond=array()){
		return $this->where($cond)->count();
	}
	
//	public function getMenuCount($where){
//		
//		return $this->where($where)->count();
//	}
}
?>