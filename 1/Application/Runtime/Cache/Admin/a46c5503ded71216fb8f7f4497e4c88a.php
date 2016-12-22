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
							<a href="/1/admin.php/Video/index">视频管理</a>
						</li>
						<li class="active">
							<i class="fa fa-fw fa-edit"></i>
							编辑视频
						</li>
					</ol>
				</div>
			</div>
			<!--表单.row-->
			<div class="col-sm-10">
				<form id="zyn-form-add" class="form-horizontal">
					<div class="form-group">
						<label for="zh-input-video_title" class="control-label col-sm-3">视频标题:</label>
						<div class="col-sm-4">
							<input id="zh-input-video_title" class="form-control" type="text" 
							    name="video_title" placeholder="请输入视频标题" value="<?php echo ($menu["video_title"]); ?>"/>
						</div>
						<div class="col-sm-5">
							<p class="zyn-p-validate-result" attr-validate="video_title"></p>
						</div>
					</div>
					<div class="form-group">
						<label for="zh-textarea-video_introduction" class="control-label col-sm-3">视频简介:</label>
						<div class="col-sm-4">
							<textarea class="js-editor" id="zh-textarea-video_introduction" name="video_introduction" rows="8"><?php echo ($menu["video_introduction"]); ?></textarea>
						</div>
						<div class="col-sm-5">
							<p class="zyn-p-validate-result" attr-validate="video_introduction"></p>
						</div>
					</div>
					
					<div class="form-group">
						<label for="zh-input-video_length" class="control-label col-sm-3">视频时长:</label>
						<div class="col-sm-4">
							<input id="zh-input-video_length" class="form-control" type="text" 
							    name="video_length" placeholder="请输入视频时长" value="<?php echo ($menu["video_length"]); ?>"/>
						</div>
						<div class="col-sm-5">
							<p class="zyn-p-validate-result" attr-validate="video_length"></p>
						</div>
					</div>
					
					<div class="form-group">
						<label for="zh-input-send_datetime" class="control-label col-sm-3">发布时间:</label>
						<div class="col-sm-4">
							<input id="zh-input-send_datetime" class="form-control" type="text" 
							    name="send_datetime" placeholder="请输入发布时间" value="<?php echo ($menu["send_datetime"]); ?>"/>
						</div>
						<div class="col-sm-5">
							<p class="zyn-p-validate-result" attr-validate="send_datetime"></p>
						</div>
					</div>
					
					<div class="form-group">
						<label for="zh-input-sender_id" class="control-label col-sm-3">发布人:</label>
						<div class="col-sm-4">
							<input id="zh-input-sender_id" class="form-control" type="text" 
							    name="sender_id" placeholder="请输入发布人" value="<?php echo ($menu["sender_id"]); ?>"/>
						</div>
						<div class="col-sm-5">
							<p class="zyn-p-validate-result" attr-validate="sender_id"></p>
						</div>
					</div>
					
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">视频类别:</label>
						<div class="col-sm-5">
							<input type="radio" name="video_type_id" value="0000" <?php if($menu["video_type_id"] == 0000): ?>checked<?php endif; ?>/>疾病防治
							<input type="radio" name="video_type_id" value="00000000" <?php if($menu["video_type_id"] == 00000000): ?>checked<?php endif; ?>/>交通安全
							<input type="radio" name="video_type_id" value="00000001" <?php if($menu["video_type_id"] == 00000001): ?>checked<?php endif; ?>/>关节炎
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">状态:</label>
						<div class="col-sm-5">
							<input type="radio" name="state" value="开启" <?php if($menu["state"] == 开启): ?>checked<?php endif; ?>/>开启
							<input type="radio" name="state" value="关闭" <?php if($menu["state"] == 关闭): ?>checked<?php endif; ?>/>关闭
						</div>
					</div>
					<input type="hidden" name="id" id="video_id" value="<?php echo ($menu["video_id"]); ?>" />
						<div class="row">
							<div class="col-sm-6 col-sm-offset-4">
								<button type="button" id="zyn-btn-add-submit" class="btn btn-primary">提交</button>
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
		'add_url':'/1/admin.php/Video/add',
		'success_jump_url':'/1/admin.php/Video/index',
		'ajax_upload_swf':'/1/public/js/vendor/uploadify/uploadify.swf',
		'ajax_upload_url':'/1/admin.php/Video/ajaxUploadImage',
	};
</script>
    <script type="text/javascript" src="/1/public/js/constants.js" ></script>
    <script type="text/javascript" src="/1/public/js/admin/common.js" ></script>
	</body>
</html>