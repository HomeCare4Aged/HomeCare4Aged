<?php
namespace Admin\Controller;
use Think\Controller;
import("XXKit.Constants");
class LoginController extends Controller {
	//登录页面
	public function index() {
		if (session(C('DOCTOR_SESSION'))) {
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
		if (isArgumentEmpty('community_hospital_numbers')) {
			//这里的0 1 是处理业务的信息
			return ajaxReturn(0, '医院编号不能为空啊');
		}
		if (isArgumentEmpty('hospital_user_no')) {
			return ajaxReturn(0, '员工工号不能为空啊');
		}
		if (isArgumentEmpty('hospital_user_psw')) {
			return ajaxReturn(0, '登录密码不能为空啊');
		}
		//验证码校验
//		$verify = new \Think\Verify();
//		if (!$verify -> check(I('admin_verify'))) {
//			return ajaxReturn(0, '验证码错误');
//		}
		//到数据库中查询对应管理员
		//I()处理get和post 情况，如果是get 按get去取
		//医院编号
		$hospitalNumber = I('community_hospital_numbers');
		//		var_dump($hospitalNumber);exit;
		//医院内码，医院内码是查到的不是输入的，怎么把查到的字段取出来用？
		$hospitalCode = I('community_hospitals_id');
		//		var_dump($hospitalNumber);exit;
		//员工工号
		$employeeNumber = I('hospital_user_no');
		//登录密码
		$loginPassword = I('hospital_user_psw');
		try {
			//查询HHospitalsInfo中的医院内码（传入医院编号）
			$res = D('HHospitalsInfo') -> findHospitalID($hospitalNumber);
			//在这里判断，$res是否为空
			if ($res == null) {
				//医院编号输入有误
				return ajaxReturn(0, '医院编号输入有误');
			} else {
				$result = D('HHospitalUserInfo') -> findUserPassword($res, $employeeNumber);
				//员工内码
//				$loginReturnValue['hospital_user_id'] = $result['hospital_user_id']
//				//医院内码
//				$loginReturnValue['community_hospitals_id'] = $result['community_hospitals_id']
//				//员工姓名
//				$loginReturnValue['hospital_user_name'] = $result['hospital_user_name']
//				//员工工号
//				$loginReturnValue['hospital_user_no'] = $result['hospital_user_no']
//				//登录密码
//				$loginReturnValue['hospital_user_psw'] = $result['hospital_user_psw']
//				//状态
//				$loginReturnValue['state'] = $result['state']
				if ($result == null) {
					//医院编号与员工工号不匹配，说明该医院没有该员工
					return ajaxReturn(0, '医院编号与员工工号不匹配');
				} else {
					//获取密码成功
					$loginPsw = $result['hospital_user_psw'];
					//如果输入的密码与数据库中查到的字段密码相同，就存储在session缓存中
					if ($loginPassword === $loginPsw) {
						//成功登录，存储数据（医院内码，员工编号，等信息），缓存信息有时间限制
						//使用C()方法读取配置文件中的会话,把$result值存在ADMIN_SESSION下 去登陆时判断会话，登录过就重定向到其它页面
						session(C('DOCTOR_SESSION'), $result);
					} else {
						//密码错误
						return ajaxReturn(0, '员工工号的密码错误');
					}
				}
			}
		} catch(Exception $e) {
			return ajaxReturn(0, $e -> getMessage());
		}
		return ajaxReturn(1, '登录成功啦');
	}

	//写一个退出的方法,退出登录
	public function loginOut() {
		//把会话清空然后重定向
		session(C('DOCTOR_SESSION'), null);
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
