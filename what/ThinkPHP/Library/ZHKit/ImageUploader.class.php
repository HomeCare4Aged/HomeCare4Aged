<?php
namespace ZHKit;
class ImageUploader {
	private $_uploadObject = '';
	function __construct() {
		$config = array('rootPath' => './UploadImages/', 'subName' => date(Y) . '/' . date(m) . '/' . date(d), );
		$this -> _uploadObject = new \Think\Upload($config);
		//		cDebug($this->_uploadObject);
	}

	//构造方法写完后暴露接口.用于上传图片制作缩略图
	function imageUpload() {
		$res = $this -> _uploadObject -> upload();
		//调用这个方法实现文件保存
		//		cDebug($res);
		if ($res) {
			//构建正常图片路径
			$imagePath = $this -> _uploadObject -> rootPath . $res['Filedata']['savepath'] . $res['Filedata']['savename'];
			//制作缩略图片的路径
			$thumbPath = $this -> _uploadObject -> rootPath . $res['Filedata']['savepath'] . 'small_' . $res['Filedata']['savename'];
			//制作缩略图
			$image = new \Think\Image();
			$image -> open($imagePath);
			//打开当前路径下打开$imagePath大图去存小图
			$image -> thumb('150', '150');
			//等比例缩放
			//把图片存放在save()方法中
			if ($image -> save($thumbPath)) {
				$fullImagePath = SITE_HOST . ltrim($imagePath, './');
				$fullThumbPath = SITE_HOST . ltrim($thumbPath, './');
				//使用一个数组来返回
				return array('image_path' => $fullImagePath, 'thumb_path' => $fullThumbPath, );
			} else {
				return FALSE;
			}
			//			cDebug($imagePath);
			//切掉./  即./UploadImages/2016/12/07/5847eb2287fd4.png
			//$fullImagePath = SITE_HOST.ltrim($imagePath,'./');
			//cDebug($fullImagePath);
		} else {
			return FALSE;
		}
		//拼接接收的值作为路径，即取键和值
		//		cDebug($res['Filedata']['savepath'].$res['Filedata']['savename'])
	}

}
?>