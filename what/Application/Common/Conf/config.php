<?php
return array(
//'配置项'=>'配置值'

//加载额外配置文件，LOAD_EXT_CONFIG,即数据库配置文件
'LOAD_EXT_CONFIG' => 'db',
//MD5混淆前缀
'MD5_PREFIX' => 'what',
//管理员session键名
'ADMIN_SESSION' => 'AdminSession',
//自定义模板的字符串替换
'TMPL_PARSE_STRING' => array(
//替换css路径
'__CSS__' => __ROOT__ . '/Public/css', '__JS__' => __ROOT__ . '/Public/js', '__IMAGE__' => __ROOT__ . '/Public/image', ),
//开启页面跟踪功能
//	'SHOW_PAGE_TRACE' => TRUE,
);
