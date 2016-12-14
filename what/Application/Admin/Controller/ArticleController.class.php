<?php
namespace Admin\Controller;
//在调用imageUpload()方法时,要引入ZHKit
import('ZHKit.ImageUploader');
use Think\Controller;
use ZHKit\ImageUploader;
//引入常量表
import('ZHKit.Constants');
//use Think\Controller;
//class IndexController extends Controller {
//继承commonController
//class ArticleController extends CommonController {
class ArticleController extends Controller {
	
	//index()方法展示文章首页
	public function index() {
		//新建一个常量表，用于可读性强的类判断成功与否
//		cDebug(\SUCCESS);
		//把要从数据库输出到首页的数据在控制器中先对模板赋值
//		$ArticleAdd = M('Article');
//		$articleResult = $ArticleAdd->limit(10)->select();
////		$articleResult = $this->select();
//		//把数据库中查询到的结果通过articleResult，返回给前端，前端使用voilist接收
//		$this->assign('articleResult',$articleResult);
		$this -> display();
	}

	//点击添加文章按钮后要跳转的页面，所以在这里添加一个add()方法
	//一个接口2用
	function articleAdd() {
		//判断是提交$_POST数据还是加载页面
		if($_POST){
//			cDebug($_POST);
			//取到页面表单提交的数据后，对数据进行验证.先实例化ArticleController类，然后调用框架中的模板create()
			$validData = D('Article')->create(); 
//			cDebug($validData);
			//表单验证
			if($validData){
				//把取到的数据存入数据库，执行新增操作，验证完数据是否为空后去model中添加数据
			$res = D('Article') ->insert($validData);
//			cDebug($res);
			//判断新增文章数据是否成功
				if($res === FALSE){
//					return ajaxReturn(0,'数据新增失败');
					return ajaxReturn(\DATABASE_ERROR, '数据新增失败');
				}else{
//					return ajaxReturn(1,'新增文章成功');
					return ajaxReturn(\SUCCESS, '新增文章成功');
				}
			}else{
				//验证完后去model中新增数据
//				cDebug(D('Article')->getError());
				return ajaxReturn(0,D('Article')->getError());
			}
		}else{
		//这个是输出add.html
		$this -> display();
		}
	}

	//上传封面图，制作缩略图
	function ajaxUploadImage() {
		$uploader = new ImageUploader();
		//$res变量拿到ImageUploader类中路径的返回值
		$res = $uploader -> imageUpload();
		if ($res === FALSE) {
			return ajaxReturn(\UPLOAD_FAILURE, '图片上传失败');
		}
		return ajaxReturn(\SUCCESS, '图片上传成功', $res);
		//然后去commom.js中去处理
	}

}
