<?php
namespace Admin\Controller;
use Think\Controller;
import("XXKit.Constants");

class CommonController extends Controller {
	
	
    function __construct(){
    	parent::__construct();
    	//登录限制
		$this->loginVerify();
    	//访问过滤
//  	$this->authorize();
    }
    
    function loginVerify(){
    	$admin = session(C('ADMIN_SESSION'));
    	$currentCA = strtolower(CONTROLLER_NAME.'-'.ACTION_NAME);
    	$loginCA = strtolower('login-index,login-check,login-logout,login-verifyImg');
    	if(!$admin && strpos($loginCA,$currentCA) === false){
    		return $this->redirect('Login/index');
    	}
    }
    
    
    function authorize(){
//  	CONTROLLER_NAME
//		$currentCA = strtolower(CONTROLLER_NAME.'-'.ACTION_NAME);
		//获取当前管理员拥有的权限信息
		$admin = session(C(('ADMIN_SESSION')));
		$role = D('h_user_limit_info')->find($admin['hospital_user_id']);
		$role_menu_path = strtolower($role['role_menu_path']);
		//所有用户都能访问的权限
		$allowCA = strtolower('login-index,login-check,login-logout,login-verifyImg,index-index');
		if(strpos($role_menu_path,$currentCA) === false && strpos($allowCA,$currentCA) === false){
			exit('对不起，您没有访问权限！');
		}
    }
    
}