<?php
namespace Admin\Controller;
import('ZHKit.ImageUploader');
import('ZHKit.Constants');
use Think\Controller;
use ZHKit\ImageUploader;
class ArticleController extends Controller {
    public function index(){
    	$cond = array(
    	//筛选掉已删除的数据	
    		'status'=> array('neq',-1),
    	);
    	//搜索
//  	if(isset($_REQUEST['type']) && $_REQUEST['type'] != -100){
//  		$cond['type'] = intval($_REQUEST['type']);
//			$this->assign('type',$cond['type']);
//  	}else{
//  		$this->assign('type',-100);
//  	} 

		$keywords = '%'.$_GET['k'].'%';
		$where['title|keywords'] = array('like',$keywords);
		$data = M('Article')->where($where)->select();
		
		
    	//分页逻辑
    	//拿到页面上传过来的页数和行数
    	$page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
    	$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 15;
    	//获取到选定的数据  放入menus数组     
    	$articles = D('Article')->getMenus($cond,$page,$pageSize);
    	$articlesCount = D('Article')-> getMenusCount($cond);
//  	cDebug($articles);
    	//分页控件
    	$pageObj = new \Think\Page($articlesCount,$pageSize);
    	$pageRes = $pageObj->show();//获取分页结果
    	//两个参数   （界面里面的名字，数据源）  绑定模板变量
    	$this->assign('articles',$articles);
    	$this->assign('pageRes',$pageRes);
    	$this->display();
    }
    
    function add(){
    	
	    if($_POST){

				$validData = D('Article')->create();
//				cDebug($validData);
				if($validData){
					//编辑的逻辑
					if($_POST['id']){
						return $this->save($_POST);
					}
					//执行新增操作
					$articleRes = D('Article')->insert($validData); //article  id
					if($articleRes === FALSE){
						
						return ajaxReturn(\DATABASE_ERROR,'数据库新增失败');
					}
					$contentData = array(
						
						'article_id' => $articleRes,
						'content' => $_POST['content'],
						'create_time' => date("Y-m-d H:i:s", time()),
						'update_time' => date("Y-m-d H:i:s", time()),
					);
//					cDebug($contentData);
					$res = D('ArticleContent')->insert($contentData); //content  id
					$data['article_content_id'] = $res;
					$res = D('Article')->addArticleContentIdById($articleRes,$data);
					return ajaxReturn(\SUCCESS,'新增菜单成功');
				}else{
	//				cDebug(D('Menu')->getError());
					//获取错误信息 
					return ajaxReturn(\VALIDATE_ERROR, D('Article')->getError());
				}
	    	}else{
	    		$this->display();
	    	}
    }
    //上传封面图，制作缩略图
    function ajaxUploadImage(){
    	$uploader = new ImageUploader();
    	$res = $uploader->imageUpload();
    	if($res === false){
    		return ajaxReturn(\UPLOAD_FAILURE,'图片上传失败');
    	}
    	return ajaxReturn(\SUCCESS,'图片上传成功',$res);
    }
    
    
     public function edit(){
		
    	$article_id = I('id');
    	try{
    		$article = D('Article')->findMenuById($article_id);    		
    		$articleContentid = $article['article_content_id'];
    		$articleContent = D('ArticleContent')->findMenuById($articleContentid);
//  		cDebug($articleContent['content']);
    	}catch(Exception $e){
    		return ajaxReturn(\QUERY_ERROR,$e->getMessage());
    	}
    	if($menu === false){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
    	}
    	
    	$this->assign('article',$article);
    	$this->assign('articleContent',$articleContent);
    	$this->display();
    }
    
    public function setStatus(){
    	if($_POST){
    		$artcile_id = I('id');
    		$data['status'] = intval(I('status'));
    		//到数据库中更新字段
    		try{
    			$res = D('Article')->updateMenuById($artcile_id,$data);
				if($res === false){
    				return ajaxReturn(\DATABASE_ERROR,'数据库查询失败');
    			}
    			return ajaxReturn(\SUCCESS,'删除成功');
			}catch(Exception $e){
				return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
			} 
    	}
    	return ajaxReturn(\ARGUMENT_ERROR,'未获取更新数据');
    }
    
    
    //排序
    public function listOrder(){
    	if($_POST){
    		$errors = array();
    		foreach(I('list_order') as $menuId => $listOrder){
    			$menu_id = intval($menuId);
    			$data['list_order'] = intval($listOrder);
    			try{
    			    $res = D('Article')->updateMenuById($menu_id,$data);
    				if($res === false){
    					$errors[] = $menu_id;
    				}
    			}catch(Exception $e){
					$errors[] = $menu_id;
				} 
    		}
    		if($errors){
    			return ajaxReturn(\UPDATE_ERROR,'菜单ID为：'.implode(',',$errors).'的数据排序失败');
    		}
    		return ajaxReturn(\SUCCESS,'排序成功');
    	}
    	return ajaxReturn(\ARGUMENT_ERROR,'未获取更新数据');
    }
}