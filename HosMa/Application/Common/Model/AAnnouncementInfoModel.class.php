<?php
namespace Common\Model;
use Think\Model;  
      
class AAnnouncementInfoModel extends Model{
	
//设置表单验证规则
	protected $_validate = array(
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
//	cDebug($data);
		//如果新增成功，会返回新增记录的主键值
		return $this->add($data);
	}
	public function findMenuById($id){
		if($id === null){
			throw_exception('菜单ID不合法');
		}  
		$cond['announcement_id'] = intval($id);
		return $this->where($cond)->find(); 
	}
	
	//按照ID去更新数据
	public function updateMenuById($id,$num,$data){
		
		if($id===null){
			
			throw_exception('菜单ID不合法');
		}
		if($data===null||!is_array($data)){
			throw_exception('菜单数据不合法');
		}
		$res['announcement_id'] = $id;
		$res['announcement_version_number'] = $num;
//		cDebug($data);
		return $this->where($res)->save($data);
	}
	public function getSchedules($cond=array(),$page=1,$pageSize=10){
			$this->where($cond); //查询条件
//				->order('hospital_doctor_id desc,schedule_date desc');     //排序规则
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
	public function updateMenuByArray($cond,$data){
		if($cond===null||!is_array($cond)){
			
			throw_exception('菜单条件不合法');
		}
		if($data===null||!is_array($data)){
			throw_exception('菜单数据不合法');
		}
		return $this->where($cond)->save($data);
	}
}
?>