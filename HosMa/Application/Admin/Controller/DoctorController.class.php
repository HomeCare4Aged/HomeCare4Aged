<?php
namespace Admin\Controller;
use Think\Controller;
import("XXKit.Constants");
import("XXKit.ImageUploader");
use XXKit\ImageUploader;
class DoctorController extends Controller {
    public function index(){
    	$nav_admin = session(C(('ADMIN_SESSION')));
		$officesList = D('h_hospital_office_list')->where($nav_admin)->find();
		$hospital_office_id = $officesList['hospital_office_id'];
		$useroffices = D('h_hospital_office_info')->select($hospital_office_id);
		$indentityList = D('h_indentity_info')->where($nav_admin)->find();
		$identity_id = $officesList['identity_id'];
		$userindentity = D('h_indentity_info')->select($identity_id);
//		cdebug($userindentity);
		$this->assign('useroffices',$useroffices);
		$this->assign('userindentity',$userindentity);
    	$cond = array(
			//筛选掉已经删除的数据
			'state' => array('neq',-1),
			'community_hospitals_id' => $nav_admin['community_hospitals_id'],
		);
		$cond1 = array(
			'community_hospitals_id' => array('not in',$nav_admin['community_hospitals_id']),
		);
		$officesList = D('h_hospital_office_list')->where($admin)->select();
		//分类搜索逻辑
		//模糊查询
		if(isset($_REQUEST['keywords']) && $_REQUEST['keywords'] != ''){
			$cond['hospital_office_id|hospital_doctor_name']= array('like','%'.$_REQUEST['keywords'].'%');
			$this->assign('keywords',$cond['hospital_office_id|hospital_doctor_name']);
		}
		//分页逻辑
		$page = $_REQUEST['p'] ? $_REQUEST[p] : 1;
		$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;
		$doctors = D('HDoctorBaseInfo')->getDoctors($cond,$page,$pageSize);
		$articlesCount = D('HDoctorBaseInfo')->getMenusCount($cond);
		//分页控件
		$pageObj = new \Think\Page($articlesCount,$pageSize);
		//获取分页结果
		$pageRes = $pageObj->show();
		//绑定模板变量
		$this->assign('doctors',$doctors);
		$this->assign('pageRes',$pageRes);
    	$this->display();
    }
    
    //点击新增按钮
    public function add(){
		if($_POST){
//			cDebug($_POST);exit;
			//表单验证
			$validData = D('HDoctorBaseInfo')->create();
//			cDebug($validData);
			if($validData){
				//编辑逻辑
				if($_POST['hospital_doctor_id']){
					return $this->save($_POST);
				}
				//执行新操作
				$validData['hospital_doctor_id'] = get_uuid();
				$res = D('HDoctorBaseInfo')->inset($validData);
				if($res === false){
					return ajaxReturn(\DATABASE_ERROR,'数据库新增失败');
				}
				return ajaxReturn(\SUCCESS,'新增医生成功');
			}else{
				return ajaxReturn(\VALIDATE_ERROR,D('HDoctorBaseInfo')->getError());
			}
		}else{
//			cDebug($res);
			$this->display();
		}
    }
    //更新数据的API
	public function save($data){
			$menu_id = $data['hospital_doctor_id'];
//			$dataArray1 = array(
//				'identity_name' => $data['identity_name'],
//			);
			$data1 = D('h_indentity_info')->where($data)->find();
			$data2 = D('h_hospital_office_info')->where($data)->find();
			$data['hospital_doctor_identity'] = $data1['identity_id'];
			$data['hospital_office_id'] = $data2['hospital_office_id'];
//			cDebug($data);
			unset($data['hospital_doctor_id']);
			try{
				$res = D('HDoctorBaseInfo')->updateMenuById($menu_id,$data );
			}catch(exception $e){
				return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
			}
			if($res === false){
				return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
			}
				return ajaxReturn(\SUCCESS,'更新医生成功');
		}
    //编辑页展示
	public function edit(){
		$doctor_id = I('id');
		try{
			$doctor = D('HDoctorBaseInfo')->findMenuById($doctor_id);
		}catch(exception $e){
			return ajaxReturn(\QUERY_ERROR,$e->getMessage());
		}
		if($menu === false){
			return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
		}
		$this->assign('doctor',$doctor);
		$this->display();
	}
	//修改状态的API(删除)
	public function setStatus(){
		if($_POST){
			$role_id = I('id');
			$data['state'] = intval(I('status'));
			//到数据库中更新字段
			$res = D('HDoctorBaseInfo')->where('hospital_doctor_id='.$role_id)->save($data);
			if($res === false){
				return ajaxReturn(\DATABASE_ERROR,'数据库删除失败');
			}
			return ajaxReturn(\SUCCESS,'删除角色成功');
		}
		return ajaxReturn(\ARGUMENT_ERROR,'未获取更新数据');
	}
    //上传封面图，制作缩略图
    function ajaxUploadImage(){
    	 $uploader = new ImageUploader();
    	 $res = $uploader->imageUpload();
    	 if($res === false){
    	 	return ajaxReturn(\UPLOAD_FALURE,'图片上传失败');
    	 }
    	 return ajaxReturn(\SUCCESS,'图片上传成功',$res);
    } 
}