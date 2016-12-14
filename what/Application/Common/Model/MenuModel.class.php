<?php
////这个类的名字要和数据库 的表名要一致
namespace Common\Model;
use Think\Model;
class MenuModel extends Model{
	
	//写一个成员变量,设置表单验证规则
	protected $_validate = array(
	//array('验证字段'，'验证规则'，'错误信息',【验证条件，附近规则，验证时间】)
		array('menu_name','require','菜单名不能为空'),
		array('menu_module','require','模块名不能为空'),
		array('menu_controller','require','控制器名不能为空'),
		array('menu_action','require','操作名不能为空'),
		//验证条件可以用正则表达式确定
//		array('menu_action','index','操作名只能是index',0,'equal'),
	);
	 // 是否批处理验证
    protected $patchValidate    =   true;
 	//删除代码，即修改这个模型类
//	private $_db='';//定义一个数据库私有变量
//	//重写一个构造方法
//	public function __construct(){
//		//调用父类的构造方法
//		parent::__construct();
//		//调用一个成员变量,M();方法是thinkphp中的方法，它的作用是实例化一个数据库表
//		$this->_db = M('menu');//把一个表转化为实例化对象
//	}
	//执行新增菜单数据的函数和方法
	public function insert($data){
		if(!$data || !is_array($data)){
			throw_exception('新增的菜单信息不合法');
		}
		//如果没有不合法的情况就新增，如果新增成功会返回新增记录的主键
//		return $this->_db->add($data);
		return $this->add($data);
	}
//	//获取菜单信息   $cond 按条件 $page指页数，$pageSize指第几行,给默认值1,10
//	public function getMenus($cond,$page=1,$pageSize=10){
////		//每页的起点 $offset指偏移量
//		$offset = ($page-1) * pageSize;
////		//order('')排序 desc降序 //查询条件$cond//排序规则order//查询条数limit
//		$list = $this->_db->where($cond)  
//				->order('list_oder desc, menu_id desc')    
//				->limit($offset,$pageSize)  
//				->select();
//		return $list;
//	}
	//获取菜单信息新写法
	public function getMenus($cond,$page,$pageSize){
//		$this->_db->where($cond)//查询条件
		$this->where($cond)//查询条件
			 ->order('list_oder desc, menu_id desc');//排序规则   
			 //处理分页的业务 
			 if($page ===null || $pageSize ===null){
//			 	$page = $page !==null ? $page : 1;
//				 $pageSize = $pageSize !== null || ? $pageSize :10;
				$page = $page !== null ? $page : 1;
				$pageSize = $pageSize !== null ? $pageSize : 10;
			 	//每页的起点(偏移量)
			 	$offset = ($page-1) * pageSize;
				$this->limit($offset,$pageSize);//查询条数
//				$this->_db->limit($offset,$pageSize);//查询条数
			 }
//			 $list = $this->_db->select();
			 $list = $this->select();
			 return $list;
	}
//	//获取菜单总数   获得页数总数
	public function getMenusCount($cond = array()){
//		return $this->_db->where($cond)->count();
		return $this->where($cond)->count();
	}
	//安装id 查询
	public function findMenuById($id){
		if($id === null){
//			var_dump($id);exit;
			throw_exception('菜单id不合法');
		}
		//menu_id代表去数据库中查询
		$cond['menu_id'] = intval($id);
//		var_dump($cond);
//		return $this->_db->where($cond)->find();
		return $this->where($cond)->find();
	}
	
	//按照id去更新数据
	public function updateMenuById($id,$data){
		//is_numeric不是数字
		if($id === null || !is_numeric($id)){
//			var_dump($id);exit;
//			cDebug($id);
			throw_exception('菜单id不合法aa');
		}
		if($data === null || !is_array($data)){
			throw_exception('菜单数据不合法');
		}
//		return $this->_db->where('menu_id='.$id)->save($data);
		return $this->where('menu_id='.$id)->save($data);
	}
	//按照id
}
?>