<?php
namespace Admin\Controller;
use Think\Controller;
import("ZHKit.Constants");
class CommonController extends Controller {
	function __construct() {
		//先执行父类的构造方法，然后才执行子类的构造方法
		parent::__construct();
		//登录限制
		$this -> loginVerify();
		//访问过滤
		//		$this->authorize();
	}

	function loginVerify() {
		$admin = session(C('ADMIN_SESSION'));
		$currentController = strtolower(CONTROLLER_NAME . '-' . ACTION_NAME);
		$loginController = strtolower('login-index,login-check,login-loginOut,login-veriyfyImg');
		if (!$admin && strpos($loginController, $currentController) === FALSE) {
			//			return $this->redirect('Login/index');
		}
	}

	function authorize() {
		//		 CONTROLLER_NAME
		//		cDebug(ACTION_NAME);
		//		 cDebug(CONTROLLER_NAME);
		//strtolower()方法，把大写转换为全小写
		$currentController = strtolower(CONTROLLER_NAME . '-' . ACTION_NAME);
		//		 cDebug(CONTROLLER_NAME.'-'.ACTION_NAME);
		//获取当前管理员拥有的权限信息
		$admin = session(C('ADMIN_SESSION'));
		//拿到角色id去当前表查这个角色
		$role = D('Role') -> find($admin['admin_role_id']);
		$role_menu_path = strtolower($role['role_menu_path']);
		//所有用户都能访问的权限
		$allowController = strtolower('login-index,login-check,login-loginOut,login-veriyfyImg,index-index');
		//strpos($haystack, $needle)方法一个字符串在父字符串中第一次出现的位置
		//		if(strpos($role_menu_path, $currentController) === false && strpos($allowController, $currentController) === false){
		//			exit('对不起，你没有访问权限！');
		//		}
		if (strpos($role_menu_path, $currentController) === false && strpos($allowController, $currentController) === false) {
			exit('对不起，你没有访问权限！');
		}
	}

}
?>