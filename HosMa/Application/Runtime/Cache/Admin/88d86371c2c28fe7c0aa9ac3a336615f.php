<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>社区医院管理系统</title>
		<link rel="stylesheet" type="text/css" href="/hosma01/Public/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/hosma01/Public/css/vendor/metisMenu/metisMenu.min.css"/>
		<link rel="stylesheet" type="text/css" href="/hosma01/Public/css/sb-admin-2.css"/>
		<link rel="stylesheet" type="text/css" href="/hosma01/Public/css/vendor/font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="/hosma01/Public/css/admin/common.css" />
		<link rel="stylesheet" href="/hosma01/Public/css/vendor/uploadify/uploadify.css" />
		<link rel="stylesheet" type="text/css" href="/hosma01/Public/css/daterangepicker-bs3.css"/>
		<link rel="stylesheet" type="text/css" href="/hosma01/Public/css/dataTable/jquery.dataTables.min.css" />
		
		<script type="text/javascript" src="/hosma01/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/hosma01/Public/js/bootstrap.js"></script>
		<script type="text/javascript" src="/hosma01/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/hosma01/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/hosma01/Public/js/vendor/uploadify/jquery.uploadify.js" ></script>
		<script type="text/javascript" src="/hosma01/Public/js/vendor/kindeditor/kindeditor-all.js" ></script>		
	</head>
	<body>


<div id="wrapper">
	<?php
 $nav_admin = session(C('ADMIN_SESSION')); $admin = array( 'hospital_user_id' => $nav_admin['hospital_user_id'], ); $nav_user = D('h_user_limit_info')->where($admin)->select(); $nav_user_menu_ids = $nav_user[0]['limit_id']; $nav_hospital = D('h_hospitals_info')->where('community_hospitals_id='.$nav_admin['hospital_user_id'])->select(); $nav_use = D('h_hospitals_info')->where('community_hospitals_id='.$nav_admin['hospital_user_id'])->select(); $index = 'index'; ?>
	
<!--后台管理系统的导航栏-->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-header">
		<a href="#" class="navbar-brand">社区医院管理平台</a>
	</div>
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-fw fa-user"></i><?php echo ($nav_admin["hospital_user_name"]); ?><i class="caret"></i>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="#"><i class="fa fa-fw fa-user"></i>个人中心</a>
				</li>
				<li class="divider"></li>
				<li>
						<a href="/hosma01/admin.php/Login/loginOut"><i class="fa fa-fw fa-power-off"></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a href="/hosma01/admin.php/Index/index.html"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>信息录入<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/hosma01/admin.php/Hospital/index.html">医院信息</a>
		                </li>
		                <li>
		                    <a href="/hosma01/admin.php/Department/index.html">科室信息</a>
		                </li>
		                <li>
		                	<a href="/hosma01/admin.php/Doctor/index.html">医生信息</a>
		                </li>
		                <li>
		                	<a href="/hosma01/admin.php/User/index.html">员工信息</a>
		                </li>
		            </ul>
		            <!-- /.nav-second-level二级目录下拉 -->
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>排班<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/hosma01/admin.php/Schedule/index.html">排班信息录入</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>挂号单<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/hosma01/admin.php/Register/index.html">号池信息录入</a>
		                </li>
		                <li>
		                    <a href="/hosma01/admin.php/Register/info.html">挂号信息显示</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>公告栏<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/hosma01/admin.php/Noticle/index.html">公告审核</a>
		                </li>
		                <!--<li>-->
		                    <!--<a href="/hosma01/admin.php/Noticle/add.html">公告发布</a>-->
		                <!--</li>-->
		                <li>
		                    <a href="/hosma01/admin.php/Noticle/review.html">公告管理</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="/hosma01/admin.php/Account/index.html">
						<i class="fa fa-fw fa-cogs"></i>账户信息<span class="fa arrow"></span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

	<div id="page-wrapper">
		<div class="container-fluid">
			<h3>排班信息录入</h3>
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li class="">
							<i class="fa fa-fw fa-edit"></i>
							排班信息录入
						</li>
						
					</ol>
				</div>				
			</div><!--.row面包屑导航   -->
			<div class="row">
				<div class="col-sm-10">
					<form id="xx-form-add" class="form-horizontal">
						<div class="form-group">
							<label for="xx-input-hospital-doctor-name" class="control-label col-sm-3">医生：</label>
							<div class="col-sm-5">
								<select class="form-control" id="xx-input-hospital-doctor-name" name="hospital_doctor_id">
								  	<!--<option>--选择医生--</option>-->
								  	<?php if(is_array($doctor)): $i = 0; $__LIST__ = $doctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["hospital_doctor_id"]); ?>"><?php echo ($vo["hospital_doctor_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
							
						</div>
						<div class="form-group">
							<label for="xx-input-schedule-date" class="control-label col-sm-3">排班日期：</label>
							<div class="col-sm-5">
								<fieldset>
					                <div class="control-group">
					                    <div class="controls">
					                     	<div class="input-prepend input-group">
					                       		<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
					                       		<input type="text" readonly style="width: 295px" name="schedule_date" id="birthday" class="form-control" value="2016-12-22" /> 
					                     	</div>
					                    </div>
					                </div>
		                 		</fieldset>
							</div>
							
						</div>
						<div class="form-group">
							<label for="xx-input-scheduling-time" class="control-label col-sm-3">时间段：</label>
							<div class="col-sm-5">
								<input type="radio" name="schedule_time" value="上午" checked/>上午
								<input type="radio" name="schedule_time" value="下午" />下午
								<input type="radio" name="schedule_time" value="全天" />全天
								
							</div>
							
						</div>
						<div class="form-group">
							<label for="xx-input-open_registration_number" class="control-label col-sm-3">号池数量：</label>
							<div class="col-sm-5">
								<input id="xx-input-open_registration_number" class="form-control" type="text" 
								name="open_registration_number" placeholder="请输入号池数量" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="open_registration_number"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-sm-offset-4">
								<button type="button" id="xx-btn-add-submit" class="btn btn-primary">提交</button>
							</div>
						</div>
					</form>
				</div>
			</div><!--.row表单-->
		</div>
	</div>
</div>
<script>
	var SCOPE = {
		'add_url':'/hosma01/admin.php/Schedule/add',
		'success_jump_url':'/hosma01/admin.php/Schedule/index',
	};
</script>
		
	<script type="text/javascript" src="/hosma01/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/hosma01/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/hosma01/Public/js/constants.js"></script>
	<script type="text/javascript" src="/hosma01/Public/js/admin/common.js"></script>
	<script type="text/javascript" src="/hosma01/Public/js/moment.js"></script>
	<script type="text/javascript" src="/hosma01/Public/js/daterangepicker.js"></script>
	<script type="text/javascript" src="/hosma01/Public/js/dataTable/jquery.dataTables.min.js"></script>
	</body>
</html>