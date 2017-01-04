<?php
namespace Admin\Controller;
use Think\Controller;
import("XXKit.Constants");

class ScheduleController extends Controller {
    public function index(){
    	
    	$date=date('Y-m-d',time()-7*3600*24);
    	$cond['schedule_date'] = array('egt',$date);
		$schedule = M('h_user_scheduling_list')
					->where($cond)
					->join('h_doctor_base_info on h_user_scheduling_list.hospital_doctor_id = h_doctor_base_info.hospital_doctor_id')
					->select();
		$doctor=D('h_doctor_base_info')->select();
//    				cDebug($doctor);
		//分页
//		$page=$_REQUEST['p'] ?$_REQUEST['p']:1;
//  	$pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:5;
//  	$schedule=D('h_user_scheduling_list')->getSchedules($cond,$page,$pageSize);
//  	$scheduletateCount=D('h_user_scheduling_list')->getMenusCount($cond);
//  	//分页控件
//  	$pageObj = new \Think\Page($scheduletateCount,$pageSize);
//  	//获取分页结果
//  	$pageRes = $pageObj->show();
    	
    	foreach($schedule as $key=>$value){
			$schedule[$key]['hospital_doctor_name'] = M('h_doctor_base_info')->where(array('hospital_doctor_id' => $value['hospital_doctor_id']))->getField('hospital_doctor_name');
      		
		}

//  	$this->assign('pageRes',$pageRes);
		$this->assign('doctor',$doctor);
		$this->assign('schedule',$schedule);
    	$this->display();
    }
    
    function add(){
    	$doctor=D('h_doctor_base_info')->select();
//    				cDebug($doctor);
			$this->assign('doctor',$doctor);
    	if($_POST){
    		//表单验证
//		cDebug($_POST);
    		$validData = D('h_user_scheduling_list')->create();
    		if($validData){
    			//执行新增操作
    			$res = D('h_user_scheduling_list')->insert($validData);
//				cDebug($res);
    			if($res === FALSE){
    				return ajaxReturn(\DATABASE_ERROR,'数据库新增失败！');
    			}
    			return ajaxReturn(\SUCCESS,'新增成功！');
    		}
    		else{
    			return ajaxReturn(\VALIDATE_ERROR,D('h_user_scheduling_list')->getError());
    		}
    	}else{
    		$this->display();
    	}
    	
    	
    }    
	
	//更新数据
    public function update(){
    	if($_POST){
    		$validData = D('h_user_scheduling_list')->create();
//  		cDebug($validData);
    		if($validData){
    			$cond['hospital_doctor_name']=$_POST['hospital_doctor_name'];
		    	$schedule=M('h_doctor_base_info')->where($cond)->select();
		    	$id=$schedule[0]['hospital_doctor_id'];
				$contentData = array(
		            'hospital_doctor_id' => $id,
		            'schedule_date' => $_POST['schedule_date'],
		            'schedule_time' => $_POST['schedule_time'],
		            'open_registration_number' =>$_POST['open_registration_number'],
		            );
				$condold['hospital_doctor_name']=$_POST['scholdname'];
		        $oldschedule=M('h_doctor_base_info')->where($condold)->select();
		    	$oldid=$oldschedule[0]['hospital_doctor_id'];	
		        $map['hospital_doctor_id']=$oldid;
				$map['schedule_date']=$_POST['scholddate'];
				$map['schedule_time']=$_POST['scholdtime'];
		    	$res=D('h_user_scheduling_list')->where($map)->save($contentData);
		    	if($res==false){
		    		return ajaxReturn(\DATABASE_ERROR,"数据库更新失败");
		    	}
		    	return ajaxReturn(\SUCCESS,'更新数据成功！');
		    }else{
    			return ajaxReturn(\VALIDATE_ERROR,D('h_user_scheduling_list')->getError());
    		}
    	}
    }
    

		
//  根据名字查找排班信息
    public function getName(){
    	$selectValue = I('selectValue');
//  	cDebug($selectValue);
    	if($selectValue&&$selectValue!=10086){
    		$date=date('Y-m-d',time()-7*3600*24);
    		$cond['schedule_date'] = array('egt',$date);
			$cond['hospital_doctor_id']=$selectValue;
			$schedule=M('h_user_scheduling_list')->where($cond)->select();
			
		}else{
			$date=date('Y-m-d',time()-7*3600*24);
    		$cond['schedule_date'] = array('egt',$date);
			$schedule = M('h_user_scheduling_list')
					->where($cond)
					->join('h_doctor_base_info on h_user_scheduling_list.hospital_doctor_id = h_doctor_base_info.hospital_doctor_id')
					->select();
		}
    	foreach($schedule as $key=>$value){
			$schedule[$key]['hospital_doctor_name'] = M('h_doctor_base_info')->where(array('hospital_doctor_id' => $value['hospital_doctor_id']))->getField('hospital_doctor_name');
			}
		if($schedule === false){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败！');
    	}
//  	$res=array('schedule' => $schedule,'pageRes'=>$pageRes);
    	echo json_encode($schedule);

    }
//  根据时间查找排班信息
    public function getTime(){
    	$timeValue = I('timeValue');
//  	cDebug($timeValue);
		$cond['schedule_date']=$timeValue;
		$schedule=M('h_user_scheduling_list')->where($cond)->select();
		foreach($schedule as $key=>$value){
			$schedule[$key]['hospital_doctor_name'] = M('h_doctor_base_info')->where(array('hospital_doctor_id' => $value['hospital_doctor_id']))->getField('hospital_doctor_name');
		}
    	
		if($schedule === false){
    		return ajaxReturn(\DATABASE_ERROR,'数据库查询失败！');
    	}
    	echo json_encode($schedule);
    }
}