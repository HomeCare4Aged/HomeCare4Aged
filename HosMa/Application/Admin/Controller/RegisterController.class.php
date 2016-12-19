<?php
namespace Admin\Controller;
use Think\Controller;
class RegisterController extends Controller {
	public function hang(){
		$this->display();
	}
	public function infusion(){
		$this->display();
	}
	//号池信息录入页面
	public function pool(){
		if($_POST){
			//表单验证
			//HRegistrationInfo,h_registration_info
			$validData = D('HRegistrationInfo')->create();
//			cDebug($validData);
			if($validData){
				//编辑逻辑
//				if($_POST['id']){
//					return $this->save($_POST);
//				}
				//执行新操作
				$res = D('HRegistrationInfo')->inset($validData);
				if($res === false){
					return ajaxReturn(\DATABASE_ERROR,'数据库新增失败');
				}
				return ajaxReturn(\SUCCESS,'添加文章成功');
			}else{
				return ajaxReturn(\VALIDATE_ERROR,D('HRegistrationInfo')->getError());
			}
		}else{
//			cDebug($res);
			$this->display();
		}
	}
}