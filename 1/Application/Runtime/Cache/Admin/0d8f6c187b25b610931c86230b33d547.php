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
			<!--面包屑导航.row-->
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-fw fa-table"></i>
							<a href="/1/admin.php/Examine/index">菜单管理</a>
						</li>
						<li class="active">
							<i class="fa fa-fw fa-edit"></i>
							创建菜单
						</li>
					</ol>
				</div>
			</div>
			<!--表单.row-->
			<div class="row">
				<div class="col-sm-10">
					<form id="zh-form-add" class="form-horizontal">
						<div class="form-group">
							<label for="zh-input-menu-name" class="control-label col-sm-3">菜单名：</label>
							<div class="col-sm-4">
							    <input class="form-control" id="zh-input-menu-name" type="text" 
								    name="menu_name"placeholder="请输入菜单名！"/>
							</div>
							<div class="col-sm-5">
								<p class="zh-p-validate-result" attr-validate="menu_name"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="zh-input-menu-module" class="control-label col-sm-3">模块名：</label>
							<div class="col-sm-4">
							    <input class="form-control" id="zh-input-menu-module" type="text" 
								    name="menu_module"placeholder="请输入模块名！"/>
							</div>
							<div class="col-sm-5">
								<p class="zh-p-validate-result" attr-validate="menu_module"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="zh-input-menu-controller" class="control-label col-sm-3">控制器名：</label>
							<div class="col-sm-4">
							    <input class="form-control" id="zh-input-menu-controller" type="text" 
								    name="menu_controller"placeholder="请输入控制器名！"/>
							</div>
							<div class="col-sm-5">
								<p class="zh-p-validate-result" attr-validate="menu_controller"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="zh-input-menu-action" class="control-label col-sm-3">操作名：</label>
							<div class="col-sm-4">
							    <input class="form-control" id="zh-input-menu-action" type="text" 
								    name="menu_action"placeholder="请输入操作名！"/>
							</div>
							<div class="col-sm-5">
								<p class="zh-p-validate-result" attr-validate="menu_action"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">菜单类型：</label>
							<div class="col-sm-4">
								<input type="radio" name="type" value="1" checked/>后台菜单
								<input type="radio" name="type" value="0"/>前端导航
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">状态：</label>
							<div class="col-sm-4">
								<input type="radio" name="status" value="1" checked/>开启
								<input type="radio" name="status" value="0"/>关闭
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-sm-offset-4">
								<button type="button" id="zh-btn-add-submit" class="btn btn-primary">提交</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var SCOPE = {
		'add_url':'/1/admin.php/Examine/add',
		'success_jump_url':'/1/admin.php/Examine/index',
	};
</script>
    <script type="text/javascript" src="/1/public/js/constants.js" ></script>
    <script type="text/javascript" src="/1/public/js/admin/common.js" ></script>
	</body>
</html>