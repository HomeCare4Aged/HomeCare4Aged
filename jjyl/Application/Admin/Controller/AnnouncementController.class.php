<?php
	//公告管理
namespace Admin\Controller;
import("ZHKit.ImageUploader");
import('ZHKit.Constants');
use Think\Controller;
use ZHKit\ImageUploader;
//use ZHKit\constants;
class AnnouncementController extends Controller{
	public function index(){
		$this->display();
	}
	
	public function add(){
		if($_POST){
			cdebug($_POST);
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
}
?>