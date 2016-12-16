<?php
	//公告管理
namespace Admin\Controller;
import("ZHKit.ImageUploader");
import('ZHKit.Constants');
use Think\Controller;
use ZHKit\ImageUploader;
//use ZHKit\constants;
class AnnouncementController extends CommonController{
	public function index(){
		//获取公告信息
		$cond=array(
		    'announcement_check_state'=>array('eq',1),
			);
//		$cond=array(
//			 'announcement_check_state'=>array('eq',1),
//			 'announcement_check_state'=>array('eq',0),
//		    '_complex'=>$cond1, // 复合查询
//		    '_logic'=>'or'       // 关系为or
//			);
//		
		if($_POST['search'] != null){
			$cond['announcement_title'] = array('like','%'.$_POST['search'].'%');
		}
//		cdebug($cond);
        $ancheckstate = D('a_announcement_info')->where($cond)->select();
//      cDebug($ancheckstate);
        if($ancheckstate === false){
            return ajaxReturn(\DATABASE_ERROR,'数据库查询失败！');
        }
        //分页
        $page=$_REQUEST['p'] ?$_REQUEST['p']:1;
    	$pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:1;
    	$ancheckstate=D('a_announcement_info')->getAncheckstates($cond,$page,$pageSize);
    	$ancheckstatesCount=D('a_announcement_info')->getAncheckstatesCount($cond);
    	//分页控件
    	$pageObj = new \Think\Page($ancheckstatesCount,$pageSize);
    	//获取分页结果
    	$pageRes = $pageObj->show();
    	$this->assign('pageRes',$pageRes);
    	
        $this->assign('ancheckstate',$ancheckstate);
		$this->display();
	}
	public function add(){
		if($_POST){
			$validData = D('a_announcement_info')->create();
			if($validData){
				if($_POST['id']){
					return $this->save($_POST);
				}
				$validData['announcement_creat_time']=date('Y-m-d H:i:s');
				$res = D('a_announcement_info')->insert($validData);
				if($res){
					return ajaxReturn(\SUCCESS,'公告发布成功');
				}else{
					return ajaxReturn(\UPLOAD_FAILURE,'公告发布失败');
				}
			}else{
				return ajaxReturn(\VALIDATE_ERROR,D('a_announcement_info')->getError());
			}
		}
		$this->display();
	}
	
	function ajaxUploadImage(){
    	$uploader = new ImageUploader();
    	$res = $uploader->imageUpload();
    	if($res === false){
    		return ajaxReturn(\UPLOAD_FAILURE,'图片上传失败');
    	}
    	return ajaxReturn(\SUCCESS,'图片上传成功',$res);
    }
    
    function edit(){
    	$announcement_id= I('id');
    	try{
    		$announcement = D('a_announcement_info')->findArticleById($announcement_id);
    	}catch(Exception $e){
    		return ajaxReturn(\QUERY_ERROR,$e->getMessage());
    	}
    	if($announcement === false){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
    	}
//  	cdebug($announcement);
    	$this->assign('announcement',$announcement);
    	$this->display();
    }
    
    public function save($data){
    	$announcement_id=$data['id'];
    	unset($data['id']);
    	$res = D('a_announcement_info')->where('announcement_id='.$announcement_id)->save($data);
    		if($res===false){
    		return ajaxReturn(\DATABASE_ERROR,'修改失败');
    	}
    	return ajaxReturn(\SUCCESS,'修改成功！');
    
    }
    
    
}
?>