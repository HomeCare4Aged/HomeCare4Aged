<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	
	//加载登录首页
    public function index(){
    	$defindConstants = get_defined_constants(TRUE);
    	
    	if (session(C('ADMIN_SESSION'))){
//  		cdebug(session(C('ADMIN_SESSION')));
    		$this->assign('session',session(C('ADMIN_SESSION')));
    		$this->redirect('Admin/Index/index');
    	}
        $this->display();
      }
      public function check(){
      	//验证参数是否合法
      	if (isArgumentEmpty('hospital_user_no')){
      		return ajaxReturn(0,'账户名不能为空');
      	}
      	if (isArgumentEmpty('hospital_user_psw')){
      		return ajaxReturn(0,'密码不能为空');
      	}
      	//验证码校验
      	$very = new \Think\Verify();
      	if(!$very->check(I('admin_val'))){
      		return ajaxReturn(0,'验证码错误');
      	}
      	$adminName = I('hospital_user_no');
      	$adminPsw = I('hospital_user_psw');
      	//到数据库中查询对应管理员
      	try {
      		$res = D('h_hospital_user_info')->findAdminByName($adminName);
      	}catch(Exception $e){
      		//异常处理
      		return ajaxReturn(0,$e->getMessage());
      	}
        if ($res === false){
        	return ajaxReturn(0,'查询出错');
        }
        if ($res === null){
        	return ajaxReturn(0,'该用户不存在');
       }
        if ($adminPsw != $res['hospital_user_psw']){
        	return ajaxReturn(0,'密码错误');
        }
        session(C('ADMIN_SESSION'),$res);
//      $adminName = session(C('ADMIN_SESSION'))['admin_name'];
//      $this->assign('adminName'.$adminName);
//      cdebug($adminName);
        return ajaxReturn(1,'登录成功');
      }
      public function logout(){
      	session(C('ADMIN_SESSION'),NULL);
      	return $this->redirect('Admin/Login/index');
      }
      
     
     
     //生成验证码
     public function verifyImg(){
     	$config = array(
     		 'fontSize'  =>  20,              // 验证码字体大小(px)
     		 'imageH'    =>  40,               // 验证码图片高度
	         'imageW'    =>  140,               // 验证码图片宽度
	         'length'    =>  4,               // 验证码位数
	         'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
     	);
     	$verify = new \Think\Verify($config);
     	ob_clean();
     	$verify->entry();
     } 
}
?>