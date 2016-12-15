<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>居家养老服务平台管理系统</title>
	
	<link rel="stylesheet" href="/jjyl/public/css/bootstrap.css" />
	<link rel="stylesheet" href="/jjyl/public/css/sb-admin-2.css" />
	<link rel="stylesheet" href="/jjyl/public/css/metisMenu.css" />
	<link rel="stylesheet" href="/jjyl/public/css/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="/jjyl/public/css/admin/common.css" />
	<link rel="stylesheet" href="/jjyl/public/css/vendor/uploadify/uploadify.css" />
	
	
	<script type="text/javascript" src="/jjyl/public/js/jquery.1.11.1.js" ></script>
    <script type="text/javascript" src="/jjyl/public/js/bootstrap.js" ></script>
    <script type="text/javascript" src="/jjyl/public/js/sb-admin-2.js" ></script>
    <script type="text/javascript" src="/jjyl/public/js/metisMenu.js" ></script>
    <script type="text/javascript" src="/jjyl/public/js/dialog/layer.js" ></script>
	<script type="text/javascript" src="/jjyl/public/js/dialog.js" ></script>
	<script type="text/javascript" src="/jjyl/public/js/vendor/uploadify/jquery.uploadify.js" ></script>
	<script type="text/javascript" src="/jjyl/public/js/vendor/kindeditor/kindeditor-all.js"></script>
		
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
					<a href="/jjyl/admin.php/Login/logout"><i class="fa fa-fw fa-power-off "></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav in" id="side-menu">
				<li>
					<a href="/jjyl/admin.php/Index/index"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a><i class="fa fa-fw fa-server"></i>审核<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="/jjyl/admin.php/Examine/index"><i class="fa fa-fw fa-university"></i>商户审核</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-newspaper-o"></i>公告信息审核</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-film"></i>视频信息审核</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="/jjyl/admin.php/Announcement/index"><i class="fa fa-fw fa-newspaper-o"></i>公告管理</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-fw fa-stethoscope"></i>社区医院管理</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-fw fa-university"></i>店铺管理</a>
				</li>
				<li>
					<a href="/jjyl/admin.php/Video/index"><i class="fa fa-fw fa-film"></i>视频管理</a>
				</li>
				<li>
					<a href="/jjyl/admin.php/HospitalRegister/index"><i class="fa fa-fw fa-edit"></i>医院后台注册</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

				
	<div id="page-wrapper">
		<div class="container-fluid">
			<!--面包屑导航.row-->
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-fw fa-university"></i>
							<a href="/jjyl/admin.php/Examine/index">商户审核</a>
						</li>
						<li class="active">
							<i class="fa fa-fw fa-table"></i>
							商户审核列表
						</li>
					</ol>
				</div>
			</div>
			<!--表单.row-->
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<form id="zh-form-list">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<td>店铺名称</td>
										<td>发布人</td>
										<td>审核状态</td>
										<td>审核人</td>
										<td>审核</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>菜单</td>
										<td>admin</td>
										<td>menu</td>
										<td>
										    <span class="glyphicon glyphicon-trash" id="zh-span-delete" attr-id=""></span>审核
										</td>
									</tr>
								</tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var SCOPE = {
		'add_url':'/jjyl/admin.php/Examine/add',
	};
</script>
    <script type="text/javascript" src="/jjyl/public/js/constants.js" ></script>
    <script type="text/javascript" src="/jjyl/public/js/admin/common.js" ></script>
	</body>
</html>