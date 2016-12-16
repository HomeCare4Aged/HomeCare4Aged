<?php if (!defined('THINK_PATH')) exit();?><!--头尾分离    忽略错误信息 运行可用-->
<!DOCTYPE html>
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
					<a href="/jjyl/admin.php/Hospital/index"><i class="fa fa-fw fa-stethoscope"></i>社区医院管理</a>
				</li>
				<li>
					<a href="/jjyl/admin.php/Shop/index"><i class="fa fa-fw fa-university"></i>店铺管理</a>
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
			
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-fw fa-table"></i>
							<a href="/jjyl/admin.php/Announcement/index">公告管理</a>
						</li>
						<li class="active">
							<i class="fa fa-fw fa-edit"></i>
							修改
						</li>
					</ol>
				</div>
			</div>
	<!--.row面包屑导航-->
	
		<div class="row">
			<div class="col-sm-10">
				<form id="zyn-form-add" class="form-horizontal">
					<div class="form-group">
						<label for="zyn-input-announcement_title" class="control-label col-sm-4">公告标题：</label>
						<div class="col-sm-5">
							<input id="zyn-input-announcement_title" class="form-control" type="text" name="announcement_title" value="<?php echo ($announcement["announcement_title"]); ?>"/>
						</div>
						<div class="col-sm-3">
							<p class="zyn-p-validate-result" attr-validate = "announcement_title"></p>
						</div>
					</div>
					
					<div class="form-group">
						<label for="zyn-input-image" class="control-label col-sm-4">图片：</label>
						<div class="col-sm-6">
							<img src="<?php echo ($announcement["announcement_small_picture"]); ?>" alt="" id="zyn-image-show-thumb" width="150px"/>
						</div>
					</div>
					<div class="form-group">					
						<label for="zyn-textarea-content" class="control-label col-sm-4">内容：</label>
						<div class="col-sm-5">
							<textarea class="js-editor" id="zyn-textarea-content" name="announcement_content" rows="20" cols="40"><?php echo ($announcement["announcement_content"]); ?></textarea>
						</div>
						<div class="col-sm-3">
							<p class="zyn-p-validate-result" attr-validate = "announcement_content"></p>
						</div>
					</div>					
					
								
					<div class="form-group">
						<label for="" class="col-sm-4 control-label">状态类型：</label>
						<div class="col-sm-5">
							<input type="radio" name="announcement_check_state" value="1" <?php if($announcement['announcement_check_state'] == 1): ?>checked<?php endif; ?> />开启
							<input type="radio" name="announcement_check_state" value="0" <?php if($announcement['announcement_check_state'] == 0): ?>checked<?php endif; ?>/>关闭
							<input type="radio" name="announcement_check_state" value="-1" <?php if($announcement['announcement_check_state'] == -1): ?>checked<?php endif; ?>/>删除
						</div>
					</div>
					<input type="hidden" name="id" value="<?php echo ($announcement["announcement_id"]); ?>" />
					<div class="row">
						<div class="col=sm-6 col-sm-offset-5">
							<button type="button" id="zyn-btn-add-submit" class="btn btn-primary">提交</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--。row表单-->
		</div>
	</div>
</div>	

<script>
	var SCOPE = {
		'add_url':'/jjyl/admin.php/Announcement/add',
		'success_jump_url':'/jjyl/admin.php/Announcement/index',
		'ajax_upload_swf':'/jjyl/public/js/vendor/uploadify/uploadify.swf',
		'ajax_upload_url':'/jjyl/admin.php/Announcement/ajaxUploadImage', 
	};
</script>
		
    <script type="text/javascript" src="/jjyl/public/js/constants.js" ></script>
    <script type="text/javascript" src="/jjyl/public/js/admin/common.js" ></script>
	</body>
</html>