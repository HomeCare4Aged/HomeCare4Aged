<?php
namespace Admin\Controller;
use Think\Controller;
class AccountController extends CommonController {
	//显示账号信息
   public function index(){
   		$admin = session(C('ADMIN_SESSION'));
   		$community_hospitals_name = D('h_hospitals_info')->where('community_hospitals_id='.$admin['community_hospitals_id'])->select();
   		$community_hospitals_name = $community_hospitals_name[0]["community_hospitals_name"];
   		$this->assign('admin',$admin);
   		$this->assign('community_hospitals_name',$community_hospitals_name);
// 		$where = array(
// 			'hospital_user_no' => array(
// 			'eq',$admin['hospital_user_no'],
// 			),
// 		);
   		if($_POST){
// 			$res = D('h_hospital_user_info')->where($where)->select();
// 			cDebug($_POST);
   			if($_POST['old_user_psw'] != $admin['hospital_user_psw']){
   				return ajaxReturn(\DATABASE_ERROR,'原密码输入错误！');
   			}
   			if($_POST['hospital_user_psw1'] != $_POST['hospital_user_psw2']){
   				return ajaxReturn(\DATABASE_ERROR,'两次密码输入不一致！');
   			}
   			if($_POST['hospital_user_psw1'] === $_POST['hospital_user_psw2']){
   				$data['hospital_user_psw'] =$_POST['hospital_user_psw1'];
// 				cDebug($data);
   				$res = D('h_hospital_user_info')->where('hospital_user_id='.$admin['hospital_user_id'])->save($data);
// 				cdebug($res);
   				return ajaxReturn(\SUCCESS,'密码更改成功！请重新登录');
   			}
   			

   		}
   		$this->display();
   }
      
}