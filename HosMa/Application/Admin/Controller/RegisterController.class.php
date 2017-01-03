<?php
namespace Admin\Controller;
use Think\Controller;
class RegisterController extends Controller {
	//挂号信息显示页面
	public function hang() {
		//分类模糊搜索逻辑
		if (isset($_REQUEST['keywords']) && $_REQUEST['keywords'] != '') {
			$condition['registration_state|hospital_doctor_name|community_user_name|user_appointment_date|user_appointment_time|user_registration_date'] = array('like','%'.$_REQUEST['keywords'].'%');
		}
//		var_dump($condition);
		$registration = D('HRegistrationInfo') -> findRegistrationID($condition);
//		var_dump($registration);
		//系统提供了assign方法对模板变量赋值，无论何种变量类型都统一使用assign赋值。
		$res = $this -> assign('registration', $registration);
		//显示模板加载页面
		$this -> display();
	}

	//输液信息显示页面
	public function infusion() {
//		var_dump($_POST);
		//模糊查询
		$condition = array();
		if(isset($_REQUEST['keywords']) && $_REQUEST['keywords'] !=''){
//			var_dump(isset($_REQUEST['keywords']) && $_REQUEST['keywords'] !='');
			$condition['transfusion_state|community_user_name'] = array('like','%'.$_REQUEST['keywords'].'%');
		} 
//		var_dump($condition);
		//分页处理
		$page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
		//2条分一页
//		var_dump($condition);exit;
		$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;
		$transfusion = D('HTransfusionInfo') -> findRransfusionID($condition,$page, $pageSize);
		$infusionCount = D('HTransfusionInfo') -> getInfusionCount($cond);
//		var_dump($condition);exit;
		//系统提供了assign方法对模板变量赋值，无论何种变量类型都统一使用assign赋值。
		$pageObj = new \Think\Page($infusionCount, $pageSize);
		//显示分页控件
		$pageResult = $pageObj -> show();
		$this -> assign('pageResult', $pageResult);
		$this -> assign('transfusion', $transfusion);
		$this -> display();
	}

	//挂号状态显示更新方法
	public function updateState(){
		if($_POST){
			//var_dump($_POST['data']);
			//拿到键才能拿到值
			$resultHang = $_POST['data'];
			$cond = array(
			//已完成 未完成
			'registration_state'=>'已完成',
			);
//			$condition['user_registration_id'] = $resID['user_registration_id'];
//			$condition['community_user_id'] = '0000';
			$condition['user_registration_id'] = $resultHang[0];
			$condition['community_user_id'] = $resultHang[1];
//			var_dump($cond);
			$registration = M('HRegistrationInfo')->where($condition)->save($cond);
//			$sql = 'update HRegistrationInfo SET  registration_state="已完成" where user_registration_id='.$resID['user_registration_id'];
//			$registration = D('HRegistrationInfo')->query($sql);
//			var_dump($sql);
//			var_dump($registration);exit;
//			return $registration;
			echo json_encode($registration);
		}
	} 
	//输液信息状态显示更新
	public function updateInfusionState(){
		if($_POST){
			$result = $_POST['data'];
			//var_dump($result);
			//已完成 未完成
			$condition1 = array(
				'transfusion_state'=>'已完成',
			);
//			$condition['user_transfusion_id'] = $result['user_transfusion_id'];
//			$condition['community_user_id'] = $result['community_user_id'];
			$condition2['user_transfusion_id'] = $result[0];
			$condition2['community_user_id'] = $result[1];
//			var_dump($condition2);
			$resultInfusion = M('HTransfusionInfo')->where($condition2)->save($condition1);
			//var_dump($condition1);
			//var_dump($condition2);
//			var_dump($resultInfusion);
			echo json_encode($resultInfusion);//在控制台显示是否插入
//			var_dump(json_encode($resultInfusion));
//			return $resultInfusion;
		}
	}
	
}
