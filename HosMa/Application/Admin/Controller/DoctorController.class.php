<?php
namespace Admin\Controller;
use Think\Controller;
import("XXKit.Constants");
import("XXKit.ImageUploader");
use XXKit\ImageUploader;
class DoctorController extends Controller {
    public function index(){
    	$cond = array(
			//筛选掉已经删除的数据
			'status' => array('neq',-1),
		);
		//分类搜索逻辑
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
    
    //点击添加文章按钮
    public function add(){
		if($_POST){
			//表单验证
			$validData = D('HDoctorBaseInfo')->create();
//			cDebug($validData);
			if($validData){
				//编辑逻辑
//				if($_POST['id']){
//					return $this->save($_POST);
//				}
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