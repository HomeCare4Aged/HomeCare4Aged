<?php
namespace Admin\Controller;
use Think\Controller;
import ('XXKit.Constants');
import ('XXKit.ImageUploader');
use XXKit\ImageUploader;
class NoticleController extends Controller {
    public function index(){
    	$cond['status']=array('neq',-1);
    	$announcement = D('AAnnouncementInfo')->where($cond)->select();
    	if($announcement === false){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败！');
    	}
    	$this->assign('announcement',$announcement);
    	$this->display();
    }
     public function add(){
    	if($_POST){
    		//表单验证	
    		$validData = D('AAnnouncementInfo')->create();
    		// cDebug($validData);	
    		if($validData){
       			//编辑菜单逻辑
   //  			cDebug($_POST);
       			if($_POST['id']){
       				return $this->save($_POST);
       			}
    			
    			//执行新增操作
    			$res = D('AAnnouncementInfo')->insert($validData);
    			// cDebug($res);	
    			if($res === FALSE){
    				return ajaxReturn(\DATABASE_ERROR,'数据库新增失败！');
    			}
    			return ajaxReturn(\SUCCESS,'数据库新增成功！');
    		}
    		else{
    			return ajaxReturn(\VALIDATE_ERROR,D('AAnnouncementInfo')->getError());
    		}
    	}else{
    		$this->display();
    	}
    	
    }
    public function review(){
    	$cond['status']=array('neq',-1);
    	$announcement = D('AAnnouncementInfo')->where($cond)->select();
    	if($announcement === false){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败！');
    	}
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
    	$announcement_id = I('id'); 
		
		try{
			$announcement = D('AAnnouncementInfo')->findMenuById($announcement_id);
		}catch(Exception $e){
			return ajaxReturn(\QUERY_ERROR,$e->getMessage());
		}
		if($announcement === false){
			return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
		}
		
		$this->assign('announcement',$announcement);
		$this->display();
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
}