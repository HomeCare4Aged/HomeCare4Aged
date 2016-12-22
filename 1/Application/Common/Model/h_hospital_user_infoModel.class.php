<?php
namespace Common\Model;
use Think\Model;

class h_hospital_user_infoModel extends Model{
	
	public function findAdminByName($adminName){
		if (!$adminName){
			throw_exception('管理员账号不合法');
		}
		$condition['hospital_user_no'] = $adminName;
		$res = $this->where($condition)->find();
		return $res;
	}
	
public function getHospitalAccountInfo($page,$pageSize){
			$this->order('community_hospitals_id desc') ;     //排序规则
			//处理分页的业务
			if ($page === null || $pageSize !== null){
				$page = $page !== null  ? $page : 1 ;
				$pageSize = $pageSize !== null  ? $pageSize : 10 ;
				$offset = ($page-1) * $pageSize; //每页的起点(偏移量)
				$this->limit($offset,$pageSize);	 //查询条数
			}
			$list=$this->select();
		return $list;
	}
	
	public function getMenuCount(){
		return $this->count();
	}
}
?>