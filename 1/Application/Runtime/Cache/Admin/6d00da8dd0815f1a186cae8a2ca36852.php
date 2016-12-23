<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>居家养老服务平台管理系统</title>
	
	<link rel="stylesheet" href="/1/public/css/bootstrap.css" />
	<link rel="stylesheet" href="/1/public/css/sb-admin-2.css" />
	<link rel="stylesheet" href="/1/public/css/metisMenu.css" />
	<link rel="stylesheet" href="/1/public/css/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="/1/public/css/admin/common.css" />
	<link rel="stylesheet" href="/1/public/css/vendor/uploadify/uploadify.css" />
	
	
	<script type="text/javascript" src="/1/public/js/jquery.1.11.1.js" ></script>
    <script type="text/javascript" src="/1/public/js/bootstrap.js" ></script>
    <script type="text/javascript" src="/1/public/js/sb-admin-2.js" ></script>
    <script type="text/javascript" src="/1/public/js/metisMenu.js" ></script>
    <script type="text/javascript" src="/1/public/js/dialog/layer.js" ></script>
	<script type="text/javascript" src="/1/public/js/dialog.js" ></script>
	<script type="text/javascript" src="/1/public/js/vendor/uploadify/jquery.uploadify.js" ></script>
	<script type="text/javascript" src="/1/public/js/vendor/kindeditor/kindeditor-all.js"></script>
		
	</head>
	<body>
	

		
<div id="wrapper">
	
<!--后台管理系统的导航栏-->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-header">
		<a href="#" class="navbar-brand">居家养老服务平台管理系统</a>
	</div>
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-fw fa-user"></i><?php echo ($admin_name); ?><i class="caret"></i>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="#"><i class="fa fa-fw fa-user"></i>个人中心</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="/1/admin.php/Login/logout"><i class="fa fa-fw fa-power-off "></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav in" id="side-menu">
				<li>
					<a href="/1/admin.php/Index/index"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a href="/1/admin.php/Menu/index"><i class="fa fa-fw fa-home"></i>菜单管理</a>
				</li>
				<li>
					<a href="/1/admin.php/Announcement/index"><i class="fa fa-fw fa-home"></i>添加社区</a>
				</li>
				<li>
					<a href="/1/admin.php/HospitalRegister/index"><i class="fa fa-fw fa-home"></i>添加账号</a>
				</li>
				<li>
					<a href="/1/admin.php/Announcement/index"><i class="fa fa-fw fa-home"></i>发布公告</a>
				</li>
				<li>
					<a href="/1/admin.php/Video/index"><i class="fa fa-fw fa-home"></i>发布视频</a>
				</li>
				<li>
					<a><i class="fa fa-fw fa-server"></i>审核<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="/1/admin.php/Examine/index"><i class="fa fa-fw fa-university"></i>商户审核</a>
						</li>
						<li>
							<a href="/1/admin.php/Examine/announcement"><i class="fa fa-fw fa-newspaper-o"></i>公告信息审核</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-film"></i>视频信息审核</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="/1/admin.php/Role/index"><i class="fa fa-fw fa-newspaper-o"></i>信息管理</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-fw fa-stethoscope"></i>账号信息</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

				
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="container center-block templatemo-form-list-container templatemo-container">
				<div class="col-md-5 col-md-offset-3">		
				<table class="table table-striped table-hover">
			      <thead>
			        <tr>
			          <th>信息管理</th>
			      </thead>
			      <tbody>
			        <tr>
			          <td>医院编号</td>
			          <td class="text-right"><?php echo ($menu["community_hospital_numbers"]); ?></td>
			        </tr>
			        <tr>
			          <td>2</td>
			          <td>Login Form 2</td>
			          <td class="text-right"><a href="login-2.html" class="btn btn-info"><i class="fa fa-arrow-circle-right"></i></a></td>
			        </tr>
			        <tr>
			          <td>3</td>
			          <td>Inline Login</td>
			          <td class="text-right"><a href="inline-login.html" class="btn btn-info"><i class="fa fa-arrow-circle-right"></i></a></td>
			        </tr>
			        <tr>
			          <td>4</td>
			          <td>Forgot Password</td>
			          <td class="text-right"><a href="forgot-password.html" class="btn btn-info"><i class="fa fa-arrow-circle-right"></i></a></td>
			        </tr>
			        <tr>
			          <td>5</td>
			          <td>Create Account</td>
			          <td class="text-right"><a href="create-account.html" class="btn btn-info"><i class="fa fa-arrow-circle-right"></i></a></td>
			        </tr>
			        <tr>
			          <td>6</td>
			          <td>Contact Form 1</td>
			          <td class="text-right"><a href="contact-form-1.html" class="btn btn-info"><i class="fa fa-arrow-circle-right"></i></a></td>
			        </tr>
			        <tr>
			          <td>7</td>
			          <td>Contact Form 2</td>
			          <td class="text-right"><a href="contact-form-2.html" class="btn btn-info"><i class="fa fa-arrow-circle-right"></i></a></td>
			        </tr>
			        <tr>
			          <td>8</td>
			          <td>Payment Form</td>
			          <td class="text-right"><a href="payment-form.html" class="btn btn-info"><i class="fa fa-arrow-circle-right"></i></a></td>
			        </tr>
			      </tbody>
			    </table>
				</div>
	        </div>
		</div>
	</div>
</div>		
<script>
	var SCOPE = {
		'add_url':'/1/admin.php/Role/add',
		'success_jump_url':'/1/admin.php/Role/index',
		'assign_auth_url':'/1/admin.php/Role/assignAuth',
	};
</script>	
    <script type="text/javascript" src="/1/public/js/constants.js" ></script>
    <script type="text/javascript" src="/1/public/js/admin/common.js" ></script>
	</body>
</html>