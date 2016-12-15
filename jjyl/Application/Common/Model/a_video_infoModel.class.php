<?php
namespace Common\Model;
use Think\Model;

class a_video_infoModel extends Model{
	
	//设置表单验证规则
	protected $_validate = array(
	array('community_hospitals_id','require','视频发布单位不能为空！'),
	array('video_title','require','视频标题不能为空！'),
	array('video_introduction','require','视频简介不能为空！'),
	);
	
	// 是否批处理验证
    protected $patchValidate = true;
    
    //新增菜单数据
	public function insert($data){
	if (!$data || !is_array($data)){
			throw_exception('新增视频信息不合法');
		}
		
		//如果新增成功，会返回新增记录的主键值
		return $this->add($data);
	}
	
	//获取视频信息
	public function getArticles($cond=array(),$page,$pageSize){
		$this->where($cond)           //查询条件
		        ->order('video_id desc');            //排序规则
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
	
	//获取视频总数
	public function getArticleCount($cond=array()){
		return $this->where($cond)->count();
	}
	
	//按照id查询
	public function findAVideoInfoById($id){
		if ($id === null){
			throw_exception('菜单ID不合法');
		}
		$cond['video_id'] = intval($id);
		return $this->where($cond)->find();
	}
	
	//按照ID更新数据
	public function updateAVideoInfoById($id,$data){
		if ($id === null || !is_numeric($id)){
			throw_exception('视频ID不合法');
		}
		if ($data === null || !is_array($data)){
			throw_exception('视频数据不合法');
		}
		return $this->where('video_id='.$id)->save($data);
	}
}