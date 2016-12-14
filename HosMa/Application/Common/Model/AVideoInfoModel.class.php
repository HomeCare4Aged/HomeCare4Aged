<?php
namespace Common\Model;
use Think\Model;        
class AVideoInfoModel extends Model{
	
//设置表单验证规则
	protected $_validate = array(
	array('community_hospitals_id','require','单位名不能为空！'),
	array('video_title','require','标题不能为空！'),
	array('video_url','require','视频不能为空！'),
	array('video_introduction','require','简介不能为空！'),
	
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
	
	
	
}
?>