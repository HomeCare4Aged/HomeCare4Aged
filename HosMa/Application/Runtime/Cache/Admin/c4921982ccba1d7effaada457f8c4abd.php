<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>社区医院管理系统</title>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/vendor/metisMenu/metisMenu.min.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/sb-admin-2.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/vendor/font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="/HosMa9/Public/css/admin/common.css" />
		<link rel="stylesheet" href="/HosMa9/Public/css/vendor/uploadify/uploadify.css" />
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/daterangepicker-bs3.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/dataTable/jquery.dataTables.min.css" />
		<!--挂号-->
		<link rel="stylesheet" href="/HosMa9/Public/css/admin/hang.css" />
		<!--输液-->
		<link rel="stylesheet" href="/HosMa9/Public/css/admin/infusion.css" />
		<script type="text/javascript" src="/HosMa9/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/bootstrap.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/vendor/uploadify/jquery.uploadify.js" ></script>
		<script type="text/javascript" src="/HosMa9/Public/js/vendor/kindeditor/kindeditor-all.js" ></script>		
		<!--挂号-->
		<script type="text/javascript" src="/HosMa9/Public/js/admin/hang.js" ></script>
		<!--输液-->
		<script type="text/javascript" src="/HosMa9/Public/js/admin/infusion.js" ></script>
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
						<a href="/HosMa9/admin.php/Login/loginOut"><i class="fa fa-fw fa-power-off"></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a href="/HosMa9/admin.php/Index/index.html"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>信息录入<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa9/admin.php/Hospital/index.html">医院信息</a>
		                </li>
		                <li>
		                    <a href="/HosMa9/admin.php/Department/index.html">科室信息</a>
		                </li>
		                <li>
		                	<a href="/HosMa9/admin.php/Doctor/index.html">医生信息</a>
		                </li>
		                <li>
		                	<a href="/HosMa9/admin.php/User/index.html">员工信息</a>
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
		                    <a href="/HosMa9/admin.php/Schedule/index.html">排班信息录入</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>挂号单<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa9/admin.php/Register/hang.html">挂号信息显示</a>
		                </li>
		                <li>
		                    <a href="/HosMa9/admin.php/Register/infusion.html">输液信息显示</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>公告栏<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa9/admin.php/Noticle/index.html">公告审核</a>
		                </li>
		                <!--<li>-->
		                    <!--<a href="/HosMa9/admin.php/Noticle/add.html">公告发布</a>-->
		                <!--</li>-->
		                <li>
		                    <a href="/HosMa9/admin.php/Noticle/review.html">公告管理</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="/HosMa9/admin.php/Account/index.html">
						<i class="fa fa-fw fa-cogs"></i>账户信息<span class="fa arrow"></span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<i class="fa fa-fw fa-table"></i>
						<a href="/HosMa9/admin.php/Account/index" class="active">个人中心</a>
					</ol>
				</div>
			</div>
			<div class="row jumbotron" style="width: 1000px;height: 350px;margin-left: 15px;">
				<div class="col-md-4 col-md-offset-1">
					<div style="width:320px;margin-top: 10px;">
						<span  >
							<h3>详细信息</h3>
						</span>
						<ul class="list-group">
							  <li class="list-group-item" style="height: 60px;"><b><h4>员工姓名 :<?php echo ($admin["hospital_user_name"]); ?></h4></b></li>
							  <li class="list-group-item" style="height: 60px;"><b><h4>员工工号 :<?php echo ($admin["hospital_user_no"]); ?></h4></b></li>
							  <li class="list-group-item" style="height: 60px;"><b><h4>所在单位 :<?php echo ($community_hospitals_name); ?></h4></b></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-md-offset-1   ">
					<div style="width:450px;margin-left: 40px;">
						<span  >
							<h3>修改密码</h3>
						</span>
						<form  class="form-horizontal" id="xx-form-add">
							<div class="form-group">
								<label for="xx-input-community_name" class="control-label col-md-3">原密码：</label>
								<div class="col-md-6">
									<input id="xx-input-community_name" class="form-control" type="password" name="old_user_psw" placeholder="请输入原密码"/>
								</div>
								<div class="col-md-3">
									<p class="xx-p-validate-result" attr-validate = "old_user_psw"></p>
								</div>
							</div>
							<div class="form-group">
								<label for="xx-input-community_name" class="control-label col-md-3">新密码：</label>
								<div class="col-md-6">
									<input id="xx-input-community_name" class="form-control" type="password" name="hospital_user_psw1" placeholder="请输入新密码"/>
								</div>
								<div class="col-md-3">
									<p class="xx-p-validate-result" attr-validate = "hospital_user_psw1"></p>
								</div>
							</div>
							<div class="form-group">
								<label for="xx-input-community_name" class="control-label col-md-3">确认密码：</label>
								<div class="col-md-6">
									<input id="xx-input-community_name" class="form-control" type="password" name="hospital_user_psw2" placeholder="确认密码"/>
								</div>
								<div class="col-md-3">
									<p class="xx-p-validate-result" attr-validate = "hospital_user_psw2"></p>
								</div>
							</div>
							<div class="col-md-4 col-md-offset-3">
							<button type="button" class="btn btn-group btn-primary" id="xx-btn-add-submit">确认修改</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>		
<script>
	var SCOPE = {
		'add_url':'/HosMa9/admin.php/Account/index',
		'edit_url':'/HosMa9/admin.php/Account/edit',
		'set_status_url':'/HosMa9/admin.php/Account/setStatus',
		'list_order_url':'/HosMa9/admin.php/Account/listOrder',
		'success_jump_url':'/HosMa9/admin.php/Login/loginout',
	};
</script>	
	<script type="text/javascript" src="/HosMa9/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/constants.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/admin/common.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/moment.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/daterangepicker.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/dataTable/jquery.dataTables.min.js"></script>
	</body>
</html>