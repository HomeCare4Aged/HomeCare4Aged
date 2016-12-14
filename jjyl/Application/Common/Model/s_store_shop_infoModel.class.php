<?php
namespace Common\Model;
use Think\Model;

class s_store_shop_infoModel extends Model{
	//获取商户信息
	public function getStoreShopInfos($cond=array(),$page,$pageSize){
		$this->where($cond)           //查询条件
		        ->order('store_shop_id desc');            //排序规则
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
	
	//获取商户总数
	public function getStoreShopInfoCount($cond=array()){
		return $this->where($cond)->count();
	}
}
?>