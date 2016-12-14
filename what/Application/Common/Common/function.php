<?php
//写一个公共函数用于check()中的逻辑判断调用
////判断参数是否为空，
function isArgumentEmpty($argName) {
	$args = !$_POST ? $_GET : $_POST;
	return (!isset($args[$argName]) || !$args[$argName]);
}

////格式化接口返回值为json
////给初始值0表示失败，''表示空
function ajaxReturn($status = 0, $message = '', $data = array()) {
	//初始化一个数组
	$result = array('status' => $status, 'message' => $message, '$data' => $data, );
	echo(json_encode($result));
	//往前台展示。把不是json转成json
}

//将字符串处理成MD5
function getMD5String($str) {
	//	return md5('what'.$str);//'what'.$str字符串拼接
	//使用C()方法调用公共配置config中的MD5混淆前缀
	return md5(C('MD5_PREFIX') . $str);
}

//可以把调试功能封装成一个公共函数
function cDebug($data) {
	echo "<pre>";
	//格式化输出
	var_dump($data);
	exit ;

}

//		$defindConstants = get_defined_constants(TRUE);
//		var_dump($defindConstants);exit;
//将Type字段转换成用户友好的数据
function getDataType($type) {
	return $type == 1 ? "后台菜单" : "前端导航";
}

//将getStatus字段转换成用户友好的数据
function getDataStatus($status) {
	//	return $status==1 ? "后台菜单" : "前端导航";
	if ($status == -1) {
		return '删除';
	}
	if ($status == 0) {
		return '关闭';
	}
	if ($status == 1) {
		return '正常';
	}
}

//根据当前页面的controller,设置侧面菜单选中状态
function getMenuActiveStatus($controller) {
	//使用strtolower()函数把大写变成小写
	$currentC = strtolower(CONTROLLER_NAME);
	if ($currentC == strtolower($controller)) {
		return 'class="active"';
	}
}
?>