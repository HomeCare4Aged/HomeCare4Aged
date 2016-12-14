<?php
namespace Admin\Controller;
//use Think\Controller;
//use Think\Verify;使用这种方式引用很耗时
//class LoginController extends Controller{
//继承commonController
class LoginController extends CommonController {
	//加载首页

	public function index() {
		//查看全部常量
		//		$defindConstants = get_defined_constants(TRUE);
		//		var_dump($defindConstants);exit;
		//		var_dump($defindConstants['user']['__MODULE__']);exit;
		//		echo "<pre>";//格式化输出
		//可以把调试封装成一个公共函数
		if (session(C('ADMIN_SESSION'))) {
			//使用重定向
			$this -> redirect('Admin/Index/index');
		}
		$this -> display();
	}

	//验证用户新信息
	public function check() {
		//		$_POST是超级全局变量
		//		var_dump($_POST);exit;//能把一个函数打印在界面,这里出现问题，有一个对象没有密码
		//		//isset查询当前$_post中有没有这个值
		//		if(!isset()||!$_POST['admin_name']){
		//			return '帐户名不能为空';
		//		}
		//		if(!isset($_POST['admin_pws']))||!$_POST['admin_pws']){
		//			return '密码不能为空';
		//		}
		//		//当重复的写某个代码时我们把它抽成一个函数
		//		//验证参数是否为空
		if (isArgumentEmpty('admin_name')) {
			return ajaxReturn(0, '帐户名不能为空');
		}
		if (isArgumentEmpty('admin_pws')) {
			//			return '密码不能为空';
			return ajaxReturn(0, '密码不能为空');
		}
		//验证码校验
		$verify = new \Think\Verify();
		if (!$verify -> check(I('admin_val'))) {
			return ajaxReturn(0, '验证码错误');
		}
		//		$_POST['admin_pws'];
		//		var_dump($_POST);
		//		if(I('admin_pws')){
		//			return ajaxReturn(0,'密码不能为空');
		////			return '密码不能为空';
		//		}
		//		//I();方法是处理get和post取值，如果是get就按get去取，如果是post就按post去取
		$adminName = I('admin_name');
		$adminPws = I('admin_pws');
		//		//到数据库中查询对应的管理员
		//		//实例化AdminInfoModel类，使用D();
		try {
			//			//因为接收过来的AdminInfoModel类有异常处理，所以进行异常捕捉
			$result = D('AdminInfo') -> findAdminByName($adminName);
			//这个方法是有返回值的就用$result来接收
			////		var_dump($result);
		} catch(Exception $e) {
			//			//处理异常
			//			return $e->getMessage();//获取异常消息
			return ajaxReturn(0, $e -> getMessage());
		}
		//		//如果没有异常时就进行判断
		if ($result === FALSE) {
			//			return '查询出错';//return是字符串，我们要return一个json所以我们写一个公共函数
			return ajaxReturn(0, '查询出错');
		}
		if ($result === null) {
			return ajaxReturn(0, '该用户不存在');
		}
		//		//admin_pws取密码字段
		//		if($adminPws!=$result['admin_pws']){
		//			return ajaxReturn(0,'密码错误');
		////			return '密码错误';
		//		}
		if (getMD5String($adminPws) != $result['admin_pws']) {//$adminPws用MD5方法替换
			//		var_dump(getMD5String($adminPws));
			return ajaxReturn(0, '密码错2213误');
		}
		//登录成功后使用 保持登录状态的session
		//			session('AdminSession',$result);
		//使用C()方法读取adminsession
		session(C('ADMIN_SESSION'), $result);
		return ajaxReturn(1, '登录成功');
		//		return '登录成功';
	}

	//生成验证码
	public function veriyfyImg() {
		$config = array('fontSize' => 15, // 验证码字体大小(px)
		'imageH' => 35, // 验证码图片高度
		'imageW' => 100, // 验证码图片宽度
		'length' => 4, // 验证码位数
		'fontttf' => '4.ttf', // 验证码字体，不设置随机获取
		);
		$verify = new \Think\Verify($config);
		//这是构造方法
		//entry()获取验证码图片
		//		ob_clean();
		$verify -> entry();
	}

	//定义一个重定向函数，退出登录
	public function loginOut() {
		session(C('ADMIN_SESSION'), null);
		return $this -> redirect('Admin/Login/index');
	}
	
}
?>