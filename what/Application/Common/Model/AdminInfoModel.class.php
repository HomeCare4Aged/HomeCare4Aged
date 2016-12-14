<?php
////这个类的名字要和数据库 的表名要一致
namespace Common\Model;
use Think\Model;
class AdminInfoModel extends Model {
	//修改这个模型类
	//	private $_db='';//定义一个数据库私有变量
	//	//写一个构造方法
	//	public function __construct(){
	//		parent::__construct();
	//		//调用一个成员变量,M();方法是thinkphp中的方法，它的作用是实例化一个数据库表
	//		$this->_db = M('admin_info');//把一个表转化为实例化对象
	//	}
	//	//查询用户方法
	public function findAdminByName($adminName) {
		////		//做判断 是为了防止服务器挂掉
		if (!$adminName) {
			throw_exception('管理员账号不合法');
		}
		////		//操作数据库
		////		//构造查询条件，查询$adminName等于传入的admin_name
		$condition['admin_name'] = $adminName;
		//查询一个$adminName传入的值等于admin_name输入 的值
		//		$res = $this->_db->where($condition)->find();//连贯去掉，查询一个用户名
		//		$res = $this->_db->where($condition)->find();
		//修改后代码
		$res = $this -> where($condition) -> find();
		return $res;
	}

}
?>