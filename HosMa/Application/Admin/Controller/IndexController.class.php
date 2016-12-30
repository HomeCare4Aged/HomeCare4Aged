<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	
		$start_time_m = mktime(0,0,0,date('m'),date('d'),date('Y'));
    	$start_time_e = mktime(12,0,0,date('m'),date('d'),date('Y'));
    	$end_time_m = mktime(12,0,0,date('m'),date('d'),date('Y'));
    	$end_time_e = mktime(24,0,0,date('m'),date('d'),date('Y'));
    	if(time() > $start_time_m && time() < $end_time_m){
    		$time1 = '下午';
    	};
    	if(time() > $start_time_e && time() < $end_time_e){
    		$time1 = '上午';
    	};
    	$now_time_day = date('Y-m-d',time());
    	$nav_admin = session(C(('ADMIN_SESSION')));
    	$cond = array(
			//筛选掉已经删除的数据
			'state' => array('neq',-1),
			'community_hospitals_id' => $nav_admin['community_hospitals_id'],
			'schedule_date' => $now_time_day,
			'schedule_time' => array('neq',$time1),
		);
		$schedules = D('h_user_scheduling_list')->getDoctors($cond,$page,$pageSize);
		$this->assign('schedules',$schedules);
//		cdebug($now_time_day);	
    	$this->display();
    }
}