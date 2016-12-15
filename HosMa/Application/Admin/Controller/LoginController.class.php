<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	//登录页面
	public function login() {
		if (session(C('ADMIN_SESSION'))) {
			//重定向到首页index.html
			$this -> redirect('Admin/Index/index');
		}
		$this -> display();
	}

	//注册页面
	public function register() {
		$this -> display();
	}

	//后台数据验证
	public function check() {

		//验证参数是否合法
		if (isArgumentEmpty('hospital_account_num')) {

			return ajaxReturn(0, '帐户名不能为空');
		}
		if (isArgumentEmpty('hospital_account_password')) {
			//			return '密码不能为空';
			return ajaxReturn(0, '密码不能为空啊');
		}
		//验证码校验
		$verify = new \Think\Verify();
		if(!$verify->check(I('admin_verify'))){
			return ajaxReturn(0,'验证码错误');
		}
		//到数据库中查询对应管理员
		$adminName = I('hospital_account_num');

		$adminPws = I('hospital_account_password');
		try {
//			$result = D('HospitalAccountInfo') -> findAdminByName($adminName);
			$result = D('HHospitalAccountInfo') -> findAdminByName($adminName);
		} catch(Exception $e) {
			return ajaxReturn(0, $e -> getMessage());
		}
		if ($result === FALSE) {
			//return '查询出错';//return是字符串，我们要return一个json所以我们写一个公共函数
			return ajaxReturn(0, '查询出错');
		}
		if ($result === null) {
			return ajaxReturn(0, '该用户不存在');
		}
		if ($adminPws != $result['hospital_account_password']) {
			return ajaxReturn(0, '密码错2213误');
		}
		//使用C()方法读取配置文件中的会话,把$result值存在ADMIN_SESSION下 去登陆时判断会话，登录过就重定向到其它页面
		session(C('ADMIN_SESSION'), $result);
		return ajaxReturn(1, '登录成功啦');
	}

	//写一个退出的方法,退出登录
	public function loginOut() {
		//把会话清空然后重定向
		session(C('ADMIN_SESSION'), null);
		return $this -> redirect('Admin/Login/index');
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
		//entry()获取验证码图片
		//ob_clean();清空当前缓冲区的数据
		$verify -> entry();
	}
}
