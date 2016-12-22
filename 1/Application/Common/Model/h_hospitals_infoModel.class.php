<?php
namespace Common\Model;
use Think\Model;

class h_hospitals_infoModel extends Model{
	
	//设置表单验证规则
	protected $_validate = array(
	array('community_hospitals_name','require','医院名不能为空！'),
	);
	
	// 是否批处理验证
    protected $patchValidate = true;

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
	
	//	获取视频信息
	public function getAncheckstates($cond=array(),$page,$pageSize){

		//处理分页的业务
		if($page === null||$pageSize !== null){
			$page = $page!==null ? $page : 1;
			$pageSize = $pageSize!==null ? $pageSize : 10;
			
			//每页的起点
			$offset = ($page-1)*$pageSize;
		}

		$list = M('h_hospitals_info')->limit($offset,$pageSize)
		->join('h_hospital_user_info on h_hospitals_info.community_hospitals_id=h_hospital_user_info.community_hospitals_id')
		->join('a_announcement_info on h_hospitals_info.community_hospitals_id=a_announcement_info.announcement_hospital_id')
		->order('send_datetime desc')
		->select();
		return $list;
	}
	//按照id查询
	public function findAVideoInfoById($id,$cond){
		if ($id === null){
			throw_exception('菜单ID不合法');
		}
		return $this->where($cond)->find();
	}
	
	//按照ID更新数据
	public function updateAVideoInfoById($id,$data){
		if ($id === null){
			throw_exception('医院ID不合法');
		}
		if ($data === null || !is_array($data)){
			throw_exception('医院数据不合法');
		}
		$cond['community_hospitals_id']=$id;
		return $this->where($cond)->save($data);
	}

}
?>