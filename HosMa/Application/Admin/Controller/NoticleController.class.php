<?php
namespace Admin\Controller;
use Think\Controller;
import ('XXKit.Constants');
import ('XXKit.ImageUploader');
use XXKit\ImageUploader;
class NoticleController extends Controller {
    public function index(){
    	$admin = session(C('ADMIN_SESSION'));
    	$cond['state']=array('neq','关闭');
    	$cond['announcement_check_state'] = '未审核';
    	$cond['announcement_hospital_id'] = $admin['community_hospitals_id'];    	
    	$announcement = M('a_announcement_info')->where($cond)->select();
    	if($announcement === false){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败！');
    	}   
//  	cDebug($announcement);	
    	$this->assign('announcement',$announcement);
    	$cond['announcement_check_state']=array('neq','未审核');
    	$cond['announcement_checker_id'] = $admin['hospital_user_id'];
    	$announcement = M('a_announcement_info')->where($cond)->select();
//  	cDebug($announcement);
		$this->assign('announcemence',$announcement);
    	$this->display();
    }
     public function add(){
     	$admin = session(C('ADMIN_SESSION'));
    	if($_POST){
    		//表单验证	
    		$validData = D('AAnnouncementInfo')->create();
//    		 cDebug($_POST);	
    		if($validData){
       			//编辑菜单逻辑
       			if($_POST['announcement_id']){
       				$sourse['announcement_id'] = $_POST['announcement_id'];
       				$oldSourse = D('AAnnouncementInfo')->where($sourse)->order('announcement_version_number desc')->select();
       				if($_POST['announcement_check_state']=='未审核'){
       					$id = $oldSourse[0]['announcement_id'];
						$num = $oldSourse[0]['announcement_version_number'];      			
       					$res = D('AAnnouncementInfo')->updateMenuById($id,$num,$_POST);
//     					cDebug($res);
       					return ajaxReturn(\SUCCESS,'数据库新增成功！');
       				}
       				else{
       					$temp = intval($oldSourse[0]['announcement_version_number']);
       					$_POST['announcement_version_number'] = $temp + 1;
       					$_POST['announcement_check_state'] = '未审核';
       					$_POST['announcement_announcement_checker_id'] = '';
       					$_POST['error_message'] = '';
       					$_POST['announcement_sender_id'] = $admin['hospital_user_id'];
       					$_POST['announcement_hospital_id'] = $admin['community_hospitals_id']; 
//     					cDebug($_POST);;
       				}
       			}
       			if(!$_POST['announcement_id']){
       				$_POST['announcement_id']= get_uuid();
       			}
//     			cDebug($_POST);
       			$_POST['send_datetime'] = (date("Y-m-d H:i:s"));
       			$_POST['announcement_sender_id'] = $admin['hospital_user_id'];
       			$_POST['announcement_hospital_id'] = $admin['community_hospitals_id']; 
    			$validData = $_POST;
    			//执行新增操作
    			$res = D('AAnnouncementInfo')->insert($validData);
    			if($res === FALSE){
    				return ajaxReturn(\DATABASE_ERROR,'数据库新增失败！');
    			}
    			return ajaxReturn(\SUCCESS,'数据库新增成功！');
    		}
    		else{
    			return ajaxReturn(\VALIDATE_ERROR,D('AAnnouncementInfo')->getError());
    		}
    	}else{
    		$res = $announcement = M('a_announcement_type')->select();
    		$this->assign('announcement_type',$res);	
    		$res = $announcement = M('h_hospitals_info')->select();
    		$this->assign('hospital_id',$res);	
    		$res = $announcement = M('a_announcement_info')->select();
    		$this->assign('announcement_sender_id',$res);	
//  		cDebug($res);
	    	$time= time()+30*24*3600;
	    	$data=date('Y-m-d',$time);
			$this->assign('endTime',$data);
    		$this->display();
    	}
    	
    }
    public function review(){ 	
//  	cDebug($_GET);
    	$cond['state']=array('neq','关闭');
    	$admin = session(C('ADMIN_SESSION'));
    	
//  	cDebug(111);
    	$cond['announcement_sender_id'] = $admin['hospital_user_id'];
    	
    	
    	$announcement = M('a_announcement_info')->order(array('announcement_title','send_datetime'=>'desc'))->where($cond)->select();
    	if($announcement === false){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败！');
    	}
    	
    	//////////////////////////////////////
//  	$page=$_REQUEST['p'] ?$_REQUEST['p']:1;
//  	$pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:2;
//  	
//  	$schedule=D('AAnnouncementInfo')->getSchedules($cond,$page,$pageSize);
////		cDebug($schedule);	
//  	
//  	$scheduletateCount=D('AAnnouncementInfo')->getMenusCount($cond);
//  	//分页控件
//  	$pageObj = new \Think\Page($scheduletateCount,$pageSize);
//  	//获取分页结果
//  	$pageRes = $pageObj->show();
//		$this->assign('pageRes',$pageRes);
    	$this->assign('announcement',$announcement);   	
       	$this->display();
    }

    //上传封面图，制作缩略图
    
    function ajaxUploadImage(){

    	$uploader = new ImageUploader();
    	// cDebug($uploader);
    	$res = $uploader->imageUpload();
    	if($res === false){
    		return ajaxReturn(\UPLOAD_FAILURE,'图片上传失败');
    	}
    	return ajaxReturn(\SUCCESS,'图片上传成功',$res);
    }


	public function edit(){
    	$cond['announcement_id'] = I('id');
//  	cDebug($cond['announcement_id']);
    	$cond['announcement_version_number'] = I('num');
		$announcement =  M('a_announcement_info')->join('a_announcement_type on a_announcement_info.announcement_type_id=a_announcement_type.announcement_type_id')->where($cond)->select();
		if($announcement[0]['announcement_checker_id']!=null){
//			cDebug($announcement);
			$announcement =  M('a_announcement_info')->join('h_hospital_user_info on a_announcement_info.announcement_checker_id=h_hospital_user_info.hospital_user_id')->join('a_announcement_type on a_announcement_info.announcement_type_id=a_announcement_type.announcement_type_id')->where($cond)->select();
		}
		$this->assign('announcement',$announcement[0]);
//		$this->assign('type',$announcement[0]);
//		cDebug($announcement[0]);
		//a_announcement_type类型
		$res = M('a_announcement_type')->select();		
		$this->assign('announcement_type',$res);
		$this->display();
    }
    public function setStatus(){
		if($_POST){
//			cDebug($_POST);
			//到数据库中更新字段
		}
		try{
			$res = D('AAnnouncementInfo')->updateMenuById($_POST['id'],$_POST['num'],$_POST);
		
			if($res === FALSE){
				return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
			}
			return ajaxReturn(\SUCCESS,'更新菜单成功');
		}catch(Exception $e){
			return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
		}
		return ajaxReturn(\ARGUMENT_ERROR,'未获取更多数据');
	}

	public function save($data){
    	$announcement_id=$data['id'];
    	unset($data['id']);
    	try{
    		$res = D('AAnnouncementInfo')->updateMenuById($announcement_id,$data);
    	}catch(Exception $e){
    		return ajaxReturn(\UPDATA_ERROR,$e->getMessage());
    	}
    	if($res===false){
    		return ajaxReturn(\DATABASE_ERROR,"数据库查询失败");
    	}
    	return ajaxReturn(\SUCCESS,'公告更新成功！');
    	
    }
    
    //模态框修改
    public function saveAnother(){   	
    	$announcement_id=$_POST['announcement_id'];
    	unset($_POST['announcement_id']);
    	try{
    		$res = D('AAnnouncementInfo')->updateMenuById($announcement_id,$_POST);
    	}catch(Exception $e){
    		return ajaxReturn(\UPDATA_ERROR,$e->getMessage());
    	}
    	if($res===false){
    		return ajaxReturn(\DATABASE_ERROR,"数据库查询失败");
    	}
    	return ajaxReturn(\SUCCESS,'审核成功！');
    	
    }
    public function datatable(){
    	$this->display();
    }
    public function getData(){   	
    	$selectedValue = I('selectedValue');
//  	cDebug($_GET);
    	$admin = session(C('ADMIN_SESSION'));
    	///////////////////////history
    	$cond['state']=array('neq','关闭');
    	$announcement = D('AAnnouncementInfo')->where($cond)->select();
    	if($announcement === false){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败！');
    	}
    	if($selectedValue == 0){
    		$cond['announcement_sender_id'] = $admin['hospital_user_id'];
    		$announcement = M('a_announcement_info')->order(array('announcement_title','send_datetime'=>'desc'))->where($cond)->select();
		
	
			//cDebug($announcement);
		
    	}
    	if($selectedValue == 1){
    		$cond['announcement_check_state'] = '未审核';
    		$cond['announcement_sender_id'] = $admin['hospital_user_id'];
    		$announcement = M('a_announcement_info')->order(array('announcement_title','send_datetime'=>'desc'))->where($cond)->select();
//  		cDebug($announcement);

    	}
    	if($selectedValue == 2){
    		$cond['announcement_check_state'] = '通过';
    		$cond['announcement_sender_id'] = $admin['hospital_user_id'];
    		$announcement = M('a_announcement_info')->order(array('announcement_title','send_datetime'=>'desc'))->where($cond)->select();
    		
    	}
    	if($selectedValue == 3){
    		$cond['announcement_check_state'] = '未通过';
    		$cond['announcement_sender_id'] = $admin['hospital_user_id'];
    		$announcement = M('a_announcement_info')->order(array('announcement_title','send_datetime'=>'desc'))->where($cond)->select();
    	}
//  	$page=$_REQUEST['p'] ?$_REQUEST['p']:1;
//  	$pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:2;
//  	
//  	$schedule=D('AAnnouncementInfo')->getSchedules($cond,$page,$pageSize);	
//  	
//  	$scheduletateCount=D('AAnnouncementInfo')->getMenusCount($cond);
//  	//分页控件
//  	$pageObj = new \Think\Page($scheduletateCount,$pageSize);
//  	//获取分页结果
//  	$pageRes = $pageObj->show();
//  	$res['pageRes'] = $pageRes;
//  	$res['schedule'] = $schedule;
//  	cDebug($res);

    	echo json_encode($announcement);
    	
    }
     public function getSourse(){
     	$admin = session(C('ADMIN_SESSION'));
     	$selectedValue = I('selectedValue');
     	$cond['state']=array('neq','关闭');
    	$announcement = D('AAnnouncementInfo')->where($cond)->select();
    	if($announcement === false){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败！');
    	}
    	if($selectedValue == 0){
    		$cond['announcement_sender_id'] = $admin['hospital_user_id'];
    		$announcement = M('a_announcement_info')->order(array('announcement_title','send_datetime'=>'desc'))->where($cond)->select();
//  		cDebug($announcement);
    	}
    	if($selectedValue == 1){
    		
    		$announcement = M('a_announcement_info')->order(array('announcement_title','send_datetime'=>'desc'))->where($cond)->select();
    		
    	}
    	
    	echo json_encode($announcement);
    }
    public function getHistory(){
    	$admin = session(C('ADMIN_SESSION'));
    	$id = session('announcement_id');	
     	$selectedValue = I('selectedValue');
    	$cond['state']=array('neq','关闭');
    	$announcement = D('AAnnouncementInfo')->where($cond)->select();
    	if($announcement === false){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败！');
    	}
    	if($selectedValue == 0){
    		$cond['announcement_id'] = $id;//{S}
    		$cond['announcement_sender_id'] = $admin['hospital_user_id'];    		
    		$announcement = M('a_announcement_info')->join('a_announcement_type on a_announcement_info.announcement_type_id=a_announcement_type.announcement_type_id')->order(array('announcement_title','send_datetime'=>'desc'))->where($cond)->select();
//  		cDebug($announcement);
    	}
    	if($selectedValue == 1){
    		$cond['announcement_check_state'] = '未审核';
    		$cond['announcement_id'] = $id;
    		$cond['announcement_sender_id'] = $admin['hospital_user_id'];
    		$announcement = M('a_announcement_info')->join('a_announcement_type on a_announcement_info.announcement_type_id=a_announcement_type.announcement_type_id')->order(array('announcement_title','send_datetime'=>'desc'))->where($cond)->select();
//  		cDebug($announcement);
    	}
    	if($selectedValue == 2){
    		$cond['announcement_check_state'] = '通过';
    		$cond['announcement_id'] = $id;
    		$cond['announcement_sender_id'] = $admin['hospital_user_id'];
			$announcement = M('a_announcement_info')->join('a_announcement_type on a_announcement_info.announcement_type_id=a_announcement_type.announcement_type_id')->order(array('announcement_title','send_datetime'=>'desc'))->where($cond)->select();    	}
    	if($selectedValue == 3){
    		$cond['announcement_check_state'] = '未通过';
    		$cond['announcement_id'] = $id;
    		$cond['announcement_sender_id'] = $admin['hospital_user_id'];
    		$announcement = M('a_announcement_info')->join('a_announcement_type on a_announcement_info.announcement_type_id=a_announcement_type.announcement_type_id')->order(array('announcement_title','send_datetime'=>'desc'))->where($cond)->select();
    	}
    	
    	echo json_encode($announcement);
    }
    public function modelShow(){
    	$showID = I('id');
    	$cond['announcement_id'] = $showID;
    	$announcement = M('a_announcement_info')->join('a_announcement_type on a_announcement_info.announcement_type_id=a_announcement_type.announcement_type_id')->where($cond)->select();
    	echo json_encode($announcement);
    }
     public function history(){
     	$cond['state']=array('neq','关闭');
		$showID = I('id');
    	$cond['announcement_id'] = $showID;
    	$announcement = M('a_announcement_info')->join('a_announcement_type on a_announcement_info.announcement_type_id=a_announcement_type.announcement_type_id')->order(array('announcement_title','send_datetime'=>'desc'))->where($cond)->select();
    	$this->assign('announcement',$announcement);
    	session('announcement_id', $showID);
//  	cDebug(session('announcement_id'));
    	$this->display();

    }
    public function manage(){
    	$admin = session(C('ADMIN_SESSION'));
    	$cond['announcement_id'] = I('id');
//  	cDebug($cond['announcement_id']);
    	$cond['announcement_version_number'] = I('num');			
		$announcement =  M('a_announcement_info')->join('a_announcement_type on a_announcement_info.announcement_type_id=a_announcement_type.announcement_type_id')->where($cond)->select();
		if($announcement[0]['announcement_checker_id']!=null){
//			cDebug($announcement);
			$announcement =  M('a_announcement_info')->join('h_hospital_user_info on a_announcement_info.announcement_checker_id=h_hospital_user_info.hospital_user_id')->join('a_announcement_type on a_announcement_info.announcement_type_id=a_announcement_type.announcement_type_id')->where($cond)->select();
		}
		$this->assign('announcement',$announcement[0]);
//		$this->assign('type',$announcement[0]);
//		cDebug($announcement[0]);
		//a_announcement_type类型
		$res = M('a_announcement_type')->select();
//		
    	$this->assign('announcement_type',$res);
    	if($announcement[0]['announcement_sender_id'] == $admin['hospital_user_id']){
    		$this->assign('result',1);
    	}
    	else{
    		$this->assign('result',0);
    	}
		$this->display();
    }
    public function getSearch(){
    	$search = I('search');
    	$cond['state']=array('neq','关闭');
    	$admin = session(C('ADMIN_SESSION'));
    	$cond['announcement_title'] = array('like','%'.$search.'%');
    	if(I('select-user') == 0){
    		$cond['announcement_sender_id'] = $admin['hospital_user_id'];
    		if(I('select-type') == 0){
    			
    		}
    		if(I('select-type') == 1){
    			$cond['announcement_check_state'] = '未审核';
    		}
    		if(I('select-type') == 2){
    			$cond['announcement_check_state'] = '通过';
    		}
    		if(I('select-type') == 3){
    			$cond['announcement_check_state'] = '未通过';
    		}
    	}
    	if(I('select-user') == 1){
    		
    	}    	
    	$announcement = M('a_announcement_info')->order(array('announcement_title','send_datetime'=>'desc'))->where($cond)->select();
//  	cDebug($announcement);
    	echo json_encode($announcement);
    	
    }
    public function detail(){
    	$admin = session(C('ADMIN_SESSION'));
    	$cond['announcement_id'] = I('id');
//  	cDebug($cond['announcement_id']);
    	$cond['announcement_version_number'] = I('num');			
		$announcement =  M('a_announcement_info')->join('a_announcement_type on a_announcement_info.announcement_type_id=a_announcement_type.announcement_type_id')->where($cond)->select();
//		cDebug(I('num'));
		if($announcement[0]['announcement_checker_id']!=null){
//			cDebug($announcement);
			$announcement =  M('a_announcement_info')->join('h_hospital_user_info on a_announcement_info.announcement_checker_id=h_hospital_user_info.hospital_user_id')->join('a_announcement_type on a_announcement_info.announcement_type_id=a_announcement_type.announcement_type_id')->where($cond)->select();
		}
		$this->assign('announcement',$announcement[0]);
//		$this->assign('type',$announcement[0]);
//		cDebug($announcement[0]);
		//a_announcement_type类型
		$res = M('a_announcement_type')->select();
//		
    	$this->assign('announcement_type',$res);
    	if($announcement[0]['announcement_check_state'] == '未审核'){
    		$this->assign('result',1);
//  		cDebug('123');
    	}
    	else{
    		$this->assign('result',0);
    	}
		$this->display();
    }
    public function pass(){
    	$admin = session(C('ADMIN_SESSION'));
		$cond = M('a_announcement_info')->where($_POST)->select();
		$cond['announcement_checker_id'] = $admin['hospital_user_id'];
		$cond['announcement_check_state'] = '通过';
		$res = D('AAnnouncementInfo')->updateMenuByArray($_POST,$cond);
		if($res===false){
    		return ajaxReturn(\DATABASE_ERROR,"审核失败");
    	}
    	return ajaxReturn(\SUCCESS,'审核成功！');
		
    }
    public function back(){
    	$admin = session(C('ADMIN_SESSION'));
    	
    	if($_POST['error_message']==='' || !$_POST){
    		return ajaxReturn(\VALIDATE_ERROR,"请输入未通过原因");
    	}
    	$res['announcement_id'] = $_POST['id'];
    	$res['announcement_version_number'] = $_POST['num'];
		$cond['announcement_checker_id'] = $admin['hospital_user_id'];
		$cond['announcement_check_state'] = '未通过';
		$cond['error_message'] = $_POST['error_message'];
		$res = D('AAnnouncementInfo')->updateMenuByArray($res,$cond);
//		cDebug($cond);
		if($res===false){
    		return ajaxReturn(\DATABASE_ERROR,"审核失败");
    }
    	return ajaxReturn(\SUCCESS,'审核成功');
    }
    

     
}