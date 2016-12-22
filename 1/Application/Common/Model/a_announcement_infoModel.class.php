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
	
	//按照ID去更新数据
	public function updateMenuById($id,$data){
		if($id===null||!is_numeric($id)){
			throw_exception('菜单ID不合法');
		}
		if($data===null||!is_array($data)){
			throw_exception('菜单数据不合法');
		}
		return $this->where('announcement_id='.$id)->save($data);
	}
}