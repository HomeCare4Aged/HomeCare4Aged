<?php
namespace Common\Model;
use Think\Model;

class a_announcement_infoModel extends Model{
	protected $_validate = array(
	array('announcement_title','require','标题不能为空！'),
	array('announcement_content','require','内容不能为空！'),
	);
	
	// 是否批处理验证
    protected $patchValidate = true;
    
    //新增
	public function insert($data){
	if (!$data || !is_array($data)){
			throw_exception('新增信息不合法');
		}
	
		//如果新增成功，会返回新增记录的主键值
		return $this->add($data);
	}
	
	//	获取菜单信息
	public function getAncheckstates($cond=array(),$page,$pageSize){

		$this->where($cond)
				->order('announcement_creat_time desc');
		//处理分页的业务
		if($page === null||$pageSize !== null){
			$page = $page!==null ? $page : 1;
			$pageSize = $pageSize!==null ? $pageSize : 10;
			
			//每页的起点
			$offset = ($page-1)*$pageSize;
			$this->limit($offset,$pageSize);
		}

		$list = $this->select();
		return $list;
	}
	//获取菜单总数
	public function getAncheckstatesCount($cond=array()){
		return $this->where($cond)->count();
	}
	
	//按照id查询
	public function findArticleById($id){
		if($id===null){
			throw_exception("菜单id不合法");
		}
		$cond['announcement_id']=intval($id);
		return $this->where($cond)->find();
	}
}