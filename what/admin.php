<?php
// 后台入口文件

// 检测PHP环境
if (version_compare(PHP_VERSION, '5.3.0', '<'))
	die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG', True);

// 定义前台应用目录
define('APP_PATH', './Application/');

//定义图片上传的路径
define('SITE_HOST', 'http://127.0.0.1/what/');

//设置当前文件定位的默认模块,后台模块
define('BIND_MODULE', 'Admin');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
//定义路径__ROOT__
//define('__ROOT__', '');
// 亲^_^ 后面不需要任何代码了 就是如此简单
?>