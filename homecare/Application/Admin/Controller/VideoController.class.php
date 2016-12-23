<?php
namespace Admin\Controller;
use Think\Controller;
import("ZHKit.Constants");
import("ZHKit.ImageUploader");
class VideoController extends Controller {
	public function index(){
    //分页逻辑
    $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1 ;
    $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10 ;
    $articles = D('a_video_info')->getArticles($cond,$page,$pageSize);
    $articleCount = D('a_video_info')->getArticleCount($cond);
    	
    //分页控件
    $pageObj = new \Think\Page($articleCount,$pageSize);
    	
    //获取分页结果
    $pageRes = $pageObj->show();
    	
    //绑定模板变量        
    $this->assign('articles',$articles);
    $this->assign('pageRes',$pageRes);
    	
    //输出模板
    $this->display();
    }
     //展示新增页面&新增数据
    public function add(){
    	if($_POST){
    		
    		//表单验证
    		$validData = D('a_video_info')->create();
    		if($validData){
    			
    			//执行新增操作
    			$res = D('a_video_info')->insert($validData);
    			if($res === FALSE){
    				return ajaxReturn(\DATABASE_ERROR,'数据库新增失败！');
    			}
    			return ajaxReturn(\SUCCESS,'数据库新增成功！');
    		}else{
    			return ajaxReturn(\VALIDATE_ERROR,D('a_video_info')->getError());
    		}
    	}else{
    		$this->display();
    	}
    }
    
     //上传视频
    function ajaxUploadImage(){
    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('mov', 'mp4', 'avi', 'rmvb');// 设置附件上传类型
    $upload->rootPath  =     './UploadAudios/'; // 设置附件上传根目录
    $upload->savePath  =     ''; // 设置附件上传（子）目录
    // 上传文件 
    $info   =   $upload->upload();
    cDebug($info);
    if(!$info) {
        return ajaxReturn(\UPLOAD_FAILURE,'视频上传失败');
    }else{
        $info = $upload->rootPath.$info['file']['savepath'].$info['file']['savename'];
        $fullAudioPath = SITE_HOST.ltrim($info,'./');
        return ajaxReturn(\SUCCESS,'视频上传成功',$fullAudioPath);
    }
   }
   
   //编辑页展示API
    public function edit(){
    	$video_id = I('id');
    	try{
    		$menu = D('a_video_info')->findAVideoInfoById($video_id);
    	}catch(Exception $e){
    		return ajaxReturn(\QUERY_ERROR,$e->getMessage());
    	}
    	if ($menu === fales){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
    	}
    	$this->assign('menu',$menu);
    	$this->display();
    } 
    
    //更新数据API
    public function save($data){
    	$menu_id = $data['id'];
    	unset($data['id']);
    	try{
    		$res = D('a_video_info')->updateAVideoInfoById($menu_id,$data);
    	}catch(Exception $e){
    		return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
    	}
    	if ($res === fales){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
    	}
    	return ajaxReturn(\SUCCESS,'更新菜单成功');
    }
   
   //修改状态API
    public function setStatus(){
    	if ($_POST){
    		$menu_id = I('id');
    		$data['status'] = intval(I('status'));
    		cDebug($data['status']);
    		//到数据库中更新字段
    		try{
    			$res = D('a_video_info')->updateAVideoInfoById($menu_id,$data);
    			cDebug($res);
    			if ($res === fales){
    		        return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
    	        }
    	        return ajaxReturn(\SUCCESS,'更新菜单成功');
    		}catch(Exception $e){
    		    return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
    	    }	
    	}
    	return ajaxReturn(\ARGUMENT_ERROR,'未获取更新数据');
    }
}
?>