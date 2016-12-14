<?php
namespace Common\Model;
use Think\Model;  
      
class AAnnouncementInfoModel extends Model{
	
//设置表单验证规则
	protected $_validate = array(
	array('announcement_sender_id','require','发布用户不能为空！'),
	array('announcement_company_id','require','所属单位不能为空！'),
	array('announcement_title','require','公告标题不能为空！'),
	array('announcement_content','require','公告内容不能为空！'),
	array('announcement_checker_id','require','审核人员不能为空！'),
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