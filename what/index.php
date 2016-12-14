<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if (version_compare(PHP_VERSION, '5.3.0', '<'))
	die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG', True);

// 定义前台应用目录
define('APP_PATH', './Application/');

//设置当前文件定位的默认模块，前台模块
define('BIND_MODULE', 'Home');
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
//创建目录安全文件，结果为false
//define('BUILD_DIR_SECURE', $value)
//把所有安全文件改为secure.html
//define('DIR_SECURE_FILENAME', 'SECURE.HTML')
// 亲^_^ 后面不需要任何代码了 就是如此简单
