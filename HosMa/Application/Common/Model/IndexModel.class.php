<?php
namespace Common\Model;
use Think\Model;

class IndexModel extends Model{
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
			throw_exception('医生ID不合法');
		}
		$cond['article_id'] = intval($id);
		return $this->where($cond)->find();
	}
}
?>