<?php
namespace Common\Model;
use Think\Model;

class a_community_infoModel extends Model{
	
	//获取社区信息
	public function getACommunityInfos($cond=array(),$page,$pageSize){
		$this->where($cond)           //查询条件
		        ->order('community_id desc');            //排序规则
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
	
	//获取社区总数
	public function getACommunityInfoCount($cond=array()){
		return $this->where($cond)->count();
	}
	
	//按照id查询
	public function findMenuById($id){
		if ($id === null){
			throw_exception('社区ID不合法');
		}
		$cond['community_id'] = intval($id);
		return $this->where($cond)->find();
	}
	
	//按照ID更新数据
	public function updateMenuById($id,$data){
		if ($id === null || !is_numeric($id)){
			throw_exception('社区ID不合法');
		}
		if ($data === null || !is_array($data)){
			throw_exception('社区数据不合法');
		}
		return $this->where('community_id='.$id)->save($data);
	}
}
?>