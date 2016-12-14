<?php
namespace Admin\Controller;
//use Think\Controller;
//引用常量文件路径
//import("ZHKit.Constants");
//class MenuController extends Controller{
//继承commonController
class MenuController extends CommonController {
	//加载菜单管理模块首页
	public function index() {
		//构造条件
		//		$model1 = D();//什么都不代表，代表原生代码。大D()实例化要写sql语句，因此很不方便，代码比较原生
		////		cDebug($model);
		////		$model->execute('select*from w_admin_info');
		//		$model2 = D('admin_info');//代表一个表
		//		//$model2可以对指定的表进行操作
		////		$model2->select();//M()方法是封装在D()方法中的
		////		cDebug($model2);
		//		$model3 = D('Role');//即代表一个表也代表一个模型类，模型类可以随便扩展,它有$model1 = D()和$model2 = D('admin_info')全部方法
		//		cDebug($model3);
		$cond = array(
		//		//status不能于负一，作为一个条件
		//		//筛选掉已经删除的数据不能于-1
		'status' => array('neq', -1), );
		//分类搜索逻辑
		//type就是点击搜索按钮时的情况
		if (isset($_REQUEST['type']) && $_REQUEST['type'] != 100) {
			//intval()是转成整形
			$cond['type'] = intval($_REQUEST['type']);
			//来一个模板输出
			$this -> assign('type', $cond['type']);
		} else {
			$this -> assign('type', -100);
		}
		//		//分页逻辑，$_REQUEST是表单发送，不是异步
		$page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
		$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 15;
		//分15页
		$menus = D('Menu') -> getMenus($cond, $page, $pageSize);
		$menusCount = D('Menu') -> getMenusCount($cond);
		//		//分页控件，中thinkphp中
		$pageObj = new \Think\Page($menusCount, $pageSize);
		//获取分页结果
		$pageResult = $pageObj -> show();
		//绑定模板变量
		$this -> assign('menus', $menus);
		$this -> assign('pageResult', $pageResult);
		//公共空间中访问加\
		$this -> display();
	}

	//写一个方法2用，都是用于地址获取，做逻辑判断就行
	public function add() {
		if ($_POST) {
//						cDebug($_POST);exit;
			//表单验证
			$validData = D('Menu') -> create();
			//使用D()方法调用模板中的create()方法
			//			cDebug($validData);
			if ($validData) {
				//编辑的逻辑
				//				cDebug($_POST);
				if ($_POST['id']) {
					return $this -> save($_POST);
				}
				//执行新增操作
				$res = D('Menu') -> insert($validData);
				if ($res === FALSE) {
					//					return ajaxReturn(0,'数据新增失败');
					return ajaxReturn(\DATABASE_ERROR, '数据新增失败');
				}
				//				return ajaxReturn(1,'新增菜单成功');
				return ajaxReturn(\SUCCESS, '新增菜单成功');
			} else {
				//执行报错信息
				//				$msg = D('Menu')->getError();
				//				return ajaxReturn(0,$msg);
				//可以简写
				//				cDebug(D('Menu')->getError());//测试报错信息
				//				return ajaxReturn(0,D('Menu')->getError());
				//0使用自定义常量替换即（VALIDATE_ERROR）

				return ajaxReturn(\VALIDATE_ERROR, D('Menu') -> getError());
			}
		} else {
			$this -> display();
		}
	}

	// 编辑展示页API
	public function edit() {
		$menu_id = I('id');
		//取到值后到数据库查一下
		//		cDebug(findMenuById($menu_id));
		try {
			$menu = D('Menu') -> findMenuById($menu_id);
			//			var_dump($menu);exit;
		} catch(Exception $e) {
			return ajaxReturn(\QUERY_ERROR, $e -> getMessage());
		}
		if ($menu === false) {
			return ajaxReturn(\DATABASE_ERROR, '数据库查询失败');
		}
		$this -> assign('menu', $menu);
		$this -> display();
	}

	//更新数据API
	public function save($data) {
		$menu_id = I('id');
		//把id 释放掉
		unset($data['id']);
		try {
			$res = D('Menu') -> updateMenuById($menu_id, $data);
		} catch(Exception $e) {
			return ajaxReturn(\UPDATE_ERROR, $e -> getMessage());
		}
		if ($res === FALSE) {
			return ajaxReturn(\DATABASE_ERROR, '数据库查询失败');
		}
		return ajaxReturn(\SUCCESS, '更新菜单成功');
	}

	//修改状态的API
	public function setStatus() {
		//		cDebug($_POST);
		if ($_POST) {
			$menu_id = I('id');
			$data['status'] = intval(I('status'));
			//到数据库中跟新字段
			try {
				$res = D('Menu') -> updateMenuById($menu_id, $data);
				if ($res === FALSE) {
					return ajaxReturn(\DATABASE_ERROR, '数据库查询失败');
				}

			} catch(Exception $e) {
				return ajaxReturn(\UPDATE_ERROR, $e -> getMessage());
			}
			return ajaxReturn(\SUCCESS, '更新菜单成功');
		}
		return ajaxReturn(\ARGUMENT_ERROR, '未获取更新数据');
	}

	public function listOrder() {
		//		cDebug($_POST);
		if ($_POST) {
			$errors = array();
			//			$listOrder = I('list_oder');
			//			cDebug($listOrder);
			//使用foreach循环拿键值
			//			foreach($listOrder as $key => $value){
			//
			//			}
			foreach (I('list_oder') as $menuId => $listOrder) {
				$menu_id = intval($menuId);
				$data['list_oder'] = intval($listOrder);
				try {
					$res = D('Menu') -> updateMenuById($menu_id, $data);
					//数据库出错
					if ($res === FALSE) {
						$errors[] = $menu_id;
					}
				} catch(Exception $e) {
					//				return ajaxReturn(\UPDATE_ERROR,$e->getMessage());
					$errors[] = $menu_id;

				}
			}
			if ($errors) {
				//implode('', $errors)把错误信息变成字符串连接起来
				return ajaxReturn(\UPDATE_ERROR, '菜单id为:' . implode('', $errors) . '的数据排序失败');
			}
			return ajaxReturn(\SUCCESS, '菜单排序成功');
		}
		return ajaxReturn(\ARGUMENT_ERROR, '未获取更新数据');
	}

}
?>