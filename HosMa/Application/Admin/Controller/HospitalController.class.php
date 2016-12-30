<?php
namespace Admin\Controller;
use Think\Controller;
import("XXKit.Constants");
import("XXKit.ImageUploader");
use XXKit\ImageUploader;

class HospitalController extends Controller {
    public function index(){
    	$nav_admin = session(C(('ADMIN_SESSION')));
    	$admin = array(
			'community_hospitals_id' => $nav_admin['community_hospitals_id'],
		);
		$hospitals = D('HHospitalsInfo')->where($admin)->select();
//		cDebug($hospitals);
		//绑定模板变量
		$this->assign('hospitals',$hospitals[0]);
    	if($_POST){
			//表单验证
			$validData = D('HHospitalsInfo')->create();
//			cDebug($validData);
			if($validData){
				//编辑逻辑
				if($_POST['id']){
					return $this->save($_POST);
				}
				//执行新操作
				$res = D('HHospitalsInfo')->inset($validData);
				if($res === false){
					return ajaxReturn(\DATABASE_ERROR,'数据库新增失败');
				}
				return ajaxReturn(\SUCCESS,'添加文章成功');
			}else{
				return ajaxReturn(\VALIDATE_ERROR,D('HHospitalsInfo')->getError());
			}
		}else{
//			cDebug($res);
			$this->display();
		}
    }
    //更新数据的接口
    public function save($data){
		$community_hospitals_id = $data['id'];
		unset($data['id']);
		try{
			$res = D('HHospitalsInfo')->updateMenuById($community_hospitals_id,$data );
		}catch(exception $e){
			return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
		}
		if($res === false){
			return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
		}
			return ajaxReturn(\SUCCESS,'更新医院信息成功');
	}
}