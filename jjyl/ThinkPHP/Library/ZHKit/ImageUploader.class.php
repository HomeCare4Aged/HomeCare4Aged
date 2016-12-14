<?php

namespace ZHKit;

class ImageUploader{
	
	private $_uploadObj = '';
	
	function __construct(){
		$config = array(
			'rootPath' =>'./UploadImages/',
			'subName' => date(Y).'/'.date(m).'/'.date(d),
		);
		$this->_uploadObj = new \Think\Upload($config);
	}
	
	//上传图片，制作缩略图
	function imageUpload(){
		$res = $this->_uploadObj->upload();
		if($res){
			$imagePath = $this->_uploadObj->rootPath.$res['file']['savepath'].$res['file']['savename'];
			$thumbPath = $this->_uploadObj->rootPath.$res['file']['savepath'].'small_'.$res['file']['savename'];
			//制作缩略图
			$image = new \Think\Image();
			$image->open($imagePath);
			$image->thumb('150','150');
			if($image->save($thumbPath)){
				$fullImagePath = SITE_HOST.ltrim($imagePath,'./');
				$fullThumbPath = SITE_HOST.ltrim($thumbPath,'./');
				return array(
					'image_path' => $fullImagePath,
					'thumb_path' => $fullThumbPath,
				);
			}else{
				return false;
			}
		}
//		else{
//			return false;
//		}

	}
}


?>