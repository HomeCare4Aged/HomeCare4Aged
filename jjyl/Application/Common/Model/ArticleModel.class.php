<?php
namespace Common\Model;
use Think\Model;

class ArticleModel extends Model{
		
	//设置表单验证规则
	protected $_validate = array(
	array('menu_name','require','菜单名不能为空！'),
	array('menu_module','require','模块名不能为空！'),
	array('menu_controller','require','控制器名不能为空！'),
	array('menu_action','require','方法名不能为空！'),
	);
	
	public function insert($data){
		if (!$data || !is_array($data)){
				throw_exception('新增菜单信息不合法');
			}
		
			//如果新增成功，会返回新增记录的主键值
			return $this->add($data);
	}
}
?>