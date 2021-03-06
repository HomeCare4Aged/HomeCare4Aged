<?php
//判断参数是否为空
function isArgumentEmpty($argName){
	$args = !$_POST ? $_GET : $_POST;
	return (!isset($args[$argName]) || !$args[$argName]);
}

//格式化接口返回值为json
function ajaxReturn($status=0,$msg='',$data=array()){
	$result = array(
	    'status' => $status,
	    'msg' => $msg,
	    'data' => $data,
	);
	echo(json_encode($result));
}

//将字符串处理成md5
function getMD5String($str){
	return md5(C('MD5_PREFIX').$str);
}

//开发者调试方法
function cDebug($data){
	echo "<pre>";
    	var_dump($data);exit;
    }
    
 //将type字段转换成用户友好的类型
 function getDataType($type){
 	return $type == 1 ? '后台菜单' : '前端导航';
 }
 //将type字段转换成用户友好的类型
 function getDataStatus($status){
 	if($status == -1){
 		return '删除';
 	}
 	if($status == 0){
 		return '关闭';
 	}
 	if($status == 1){
 		return '正常';
 	}
 }
 //根据当前页面的controller,设置菜单选中的状态
 function getMenuActiveStatus($controller){
 	$currentC = strtolower(CONTROLLER_NAME);
 	if($currentC == strtolower($controller)){
 		return 'class = "active"';
 	}
 }
 
 //根据角色id得到角色名
 function getRoleById($admin_role_id){
 	$role = D('Role')->find($admin_role_id);
 	$roleName = $role['role_name'];
 	return $roleName;
 }
?>