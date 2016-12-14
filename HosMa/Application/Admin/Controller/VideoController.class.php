<?php
namespace Admin\Controller;
use Think\Controller;
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


}