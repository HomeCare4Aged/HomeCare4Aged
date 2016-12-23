<?php
namespace Admin\Controller;
class AdminInfoController extends CommonController {
	//加载管理员管理模块的首页
    public function index(){
    	$cond=array(
    		//筛选掉已经删除的数据
    		'status'=>array('neq',-1),
    	);
//  	$admininfo = D('AdminInfo')->where($cond)->select();
////  	cDebug($res);
//  	$this->assign('admininfo',$admininfo);
//  	
    	//分类搜索逻辑
    	if(isset($_REQUEST['type'])&& $_REQUEST['type'] != -100){
    		$cond['type'] = intval($_REQUEST['type']);
    		$this->assign('type',$cond['type']);
    	}else{
    		$this->assign('type',-100);
    	}
    	//分页逻辑
    	$page=$_REQUEST['p'] ?$_REQUEST['p']:1;
    	$pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:10;
    	$admininfo=D('AdminInfo')->getAdminInfo($cond,$page,$pageSize);
    	$admininfoCount=D('AdminInfo')->getAdminInfoCount($cond);
    	//分页控件
    	$pageObj = new \Think\Page($admininfoCount,$pageSize);
    	//获取分页结果
    	$pageRes = $pageObj->show();
    	//绑定模板变量
    	$this->assign('admininfo',$admininfo);
    	$this->assign('pageRes',$pageRes);
      	//输出模板
        $this->display();
    }
    
    //添加管理员
    public function add(){
    	if($_POST){
    		//表单验证
    		$validData = D('AdminInfo')->create();
    		if($validData){
    			//编辑的逻辑
    			if($_POST['id']){
    				return $this->save($_POST);
    			}
    			//执行新增操作
    			$validData[admin_psw] = md5($validData[admin_psw]);
    			//cDebug($validData[admin_psw]);
    			
    			$res = D('AdminInfo')->insert($validData);
    			
    			
    			if($res === FALSE){
    				return ajaxReturn(\DATABASE_ERROR,'数据库更新失败！');
    			}
    			return ajaxReturn(\SUCCESS,'管理员更新成功！');
    		}
    		else{
    			return ajaxReturn(\VALIDATE_ERROR,D('AdminInfo')->getError());
    		}
    	}else{
    		$this->display();
    	}
    }
    //更改status (删除)
    public function setStatus(){
    	if($_POST){
    		$Admin_id=I('id');
    		$data['status']=intval(I('status'));	
	    		//到数据库更新字段
	    	try{
	    		$res =D('AdminInfo')->updateAdminById($Admin_id,$data);
	    		if($res===false){
	    			return ajaxReturn(\DATABASE_ERROR,"数据库查询失败");
	    		}
	    		return ajaxReturn(\SUCCESS,'删除管理员成功！');
	    	}catch(Exception $e){
	    		return ajaxReturn(\UPDATA_ERROR,$e->getMessage());
	    	}
    	}
    	return ajaxReturn(\ARGUMENT_ERROR,'未获取更新数据');
    }
    
    //编辑管理员
    public function edit(){
    	$id = I('id');
    	$admin = D(AdminInfo)->find($id);
//  	cDebug($admin);
    	$this->assign('admin',$admin);
    	$this->display();
    }
    
    //更新数据
    public function save($data){
    	$admin_id=$data['id'];
    	$data[admin_psw] = md5($data[admin_psw]);
    	unset($data['id']);
    	try{
    		$res = D('AdminInfo')->updateAdminById($admin_id,$data);
    	}catch(Exception $e){
    		return ajaxReturn(\UPDATA_ERROR,$e->getMessage());
    	}
    	if($res===false){
    		return ajaxReturn(\DATABASE_ERROR,"数据库查询失败");
    	}
    	return ajaxReturn(\SUCCESS,'菜单新增成功！');
    	
    }
    
    
    
}
?>