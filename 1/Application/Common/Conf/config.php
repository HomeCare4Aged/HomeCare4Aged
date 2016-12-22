<?php
return array(
	
	/* 数据库设置 */
	'LOAD_EXT_CONFIG'       =>  'db',
	
    //管理员session信息键名
	'ADMIN_SESSION'         =>   'AdminSession',
	
	//自定义模板的字符串替换
	'TMPL_PARSE_STRING'     =>   array(
	    '__CSS__' => __ROOT__.'/public/css',
	    '__JS__' => __ROOT__.'/public/js',
	    '__IMAGES__' => __ROOT__.'/public/images',
	),
	
	//开启页面跟踪功能
//	'SHOW_PAGE_TRACE' => TURE,

);