<?php
namespace Admin\Controller;
use Think\Controller;
import("ZHKit.Constants");
class CommonController extends Controller {
	public function __construct(){
		parent::__construct();
		//登录限制
//		$this->loginVerify();
//		//访问过滤
//		$this->authrize();
	}
	
	public function loginVerify(){
		$admin = session(C('ADMIN_SESSION'));
		$currentCA = strtolower(CONTROLLER_NAME.'-'.ACTION_NAME);
		$loginCA = strtolower('login-index,login-check,login-out,login-verifyImg,');
		if (!$admin && strpos($loginCA,$currentCA) === false){
			return $this->redirect('Login/index');
		}
	}
	
    public function authrize(){
    	$currentCA = strtolower(CONTROLLER_NAME.'-'.ACTION_NAME);
    	//获取当前管理员拥有的权限信息
    	$admin = session(C('ADMIN_SESSION'));
    	$role = D('Role')->find($admin['admin_role_id']);
    	$role_menu_path = strtolower($role['$role_menu_path']);
    	//所有用户都可以访问的权限
    	$allowCA = strtolower('login-index,login-check,login-out,login-verifyImg,index-index');
    	if (strpos($role_menu_path,$currentCA ) === false && strpos($allowCA,$currentCA) === false){
    		exit('没有访问权限');
    	} 
	}
}