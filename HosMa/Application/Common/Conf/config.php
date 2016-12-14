<?php
return array(
	
	//配置数据库
	'LOAD_EXT_CONFIG' => 'db',
    
    //md5混淆前缀
    'MD5_PREFIX' => 'login',
    
    //管理员session键名
    'ADMIN_SESSION' => 'AdminSession',
    
    //自定义模板的字符串替换
    'TMPL_PARSE_STRING' => array(
    	'__CSS__' => __ROOT__.'/Public/css',
    	'__JS__' => __ROOT__.'/Public/js',
    	'__IMARGES__' => __ROOT__.'/Public/images',
    ),
    //开启页面跟踪功能
//  'SHOW_PAGE_TRACE' => TURE,
);