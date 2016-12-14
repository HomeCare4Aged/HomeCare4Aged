<?php
namespace Admin\Controller;
use Think\Controller;
import("XXKit.ImageUploader");
import('XXKit.Constants'); 
class VideoController extends Controller {
    public function index(){
    	$cond['status']=array('neq',-1);
    	$video = D('AVideoInfo')->where($cond)->select();
    	if($video === false){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败！');
    	}
    	$this->assign('video',$video);
    	$this->display();
    }

    public function add(){
    	if($_POST){
    		//表单验证	
    		$validData = D('AVideoInfo')->create();
    		// cDebug($validData);	
    		if($validData){
//     			//编辑菜单逻辑
// //  			cDebug($_POST);
//     			if($_POST['id']){
//     				return $this->save($_POST);
//     			}
    			
    			//执行新增操作
    			$res = D('AVideoInfo')->insert($validData);
    			if($res === FALSE){
    				return ajaxReturn(\DATABASE_ERROR,'数据库新增失败！');
    			}
    			return ajaxReturn(\SUCCESS,'数据库新增成功！');
    		}
    		else{
    			return ajaxReturn(\VALIDATE_ERROR,D('AVideoInfo')->getError());
    		}
    	}else{
    		$this->display();
    	}
    	
    }
    public function ajaxUploadImage(){
    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('mov', 'mp4', 'avi', 'rmvb');// 设置附件上传类型
    $upload->rootPath  =     './UploadAudios/'; // 设置附件上传根目录
    $upload->savePath  =     ''; // 设置附件上传（子）目录
    // 上传文件 
    $info   =   $upload->upload();
    if(!$info) {// 上传错误提示错误信息
        // $this->error($upload->getError());
        return ajaxReturn(\UPLOAD_FAILURE,'视频上传失败');
    }else{// 上传成功
        // $this->success('上传成功！');
        $info = $upload->rootPath.$info['file']['savepath'].$info['file']['savename'];
        $fullAudioPath = SITE_HOST.ltrim($info,'./');
        // cDebug($fullAudioPath);
        return ajaxReturn(\SUCCESS,'视频上传成功',$fullAudioPath);
    }
}


}