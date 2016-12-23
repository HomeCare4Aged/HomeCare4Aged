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
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-fw fa-table"></i>
							<a href="/1/admin.php/Examine/announcement">公告信息审核</a>
						</li>
						<li class="active">
							<i class="fa fa-fw fa-edit"></i>
							公告审核
						</li>
					</ol>
				</div>
			</div><!--.row面包屑导航-->
			<div class="col-sm-12">
				<form id="zyn-form-add" class="form-horizontal">
					<div class="form-group">
						<label for="zyn-input-menu-name" class="control-label col-sm-3">公告标题:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($menu["announcement_title"]); ?></label>
					</div>
					<div class="form-group">
						<label for="zyn-input-menu-module" class="control-label col-sm-3">发布用户:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($menu["announcement_sender_id"]); ?></label>
					</div>
					<div class="form-group">
						<label for="zyn-input-menu-controller" class="control-label col-sm-3">所属单位:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($menu["announcement_hospital_id"]); ?></label>
					</div>
					<div class="form-group">
						<label for="zyn-input-menu-action" class="control-label col-sm-3">发布时间:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($menu["send_datetime"]); ?></label>
					</div>
					<div class="form-group">
						<label for="zyn-input-menu-action" class="control-label col-sm-3">公告类型:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($menu["announcement_type_id"]); ?></label>
					</div>
					<div class="form-group">
						<label for="zyn-input-menu-action" class="control-label col-sm-3">公告图片:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($menu["announcement_picture"]); ?></label>
					</div>
					<div class="form-group">
						<label for="zyn-input-menu-action" class="control-label col-sm-6">公告内容:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($menu["announcement_content"]); ?></label>
					</div>
					<div class="form-group">
						<label for="zyn-input-menu-action" class="control-label col-sm-4">撤销日期:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($menu["announcement_end_date"]); ?></label>
					</div>
					<div class="form-group">
						<label for="zyn-input-announcement_checker_id" class="control-label col-sm-3">审核人:</label>
						<div class="col-sm-4">
							<input id="zyn-input-announcement_checker_id" class="form-control" type="text" 
							    name="announcement_checker_id" placeholder="请输入审核人姓名" value="{menu.announcement_checker_id}"/>
						</div>
						<div class="col-sm-5">
							<p class="zyn-p-validate-result" attr-validate="announcement_checker_id"></p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-4">
							<button type="button" id="zyn-btn-add-submit" class="btn btn-primary">通过</button>
							<input type="button" id="zyn-btn-add-submit2" class="btn btn-primary" value="未通过">
						</div>
					</div>	
					<input type="hidden" value="<?php echo ($menu["menu_id"]); ?>" name="id" />
				</form>
			</div><!--.row表单-->
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