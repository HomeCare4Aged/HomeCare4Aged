<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>居家养老服务平台管理系统</title>
	
	<link rel="stylesheet" href="/homecare/public/css/bootstrap.css" />
	<link rel="stylesheet" href="/homecare/public/css/sb-admin-2.css" />
	<link rel="stylesheet" href="/homecare/public/css/metisMenu.css" />
	<link rel="stylesheet" href="/homecare/public/css/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="/homecare/public/css/admin/common.css" />
	<link rel="stylesheet" href="/homecare/public/css/vendor/uploadify/uploadify.css" />
	<link rel="stylesheet" href="/homecare/public/css/laydate.css" />
	<link rel="stylesheet" href="/homecare/public/css/vendor/default/laydate.css" />
	
	
	<script type="text/javascript" src="/homecare/public/js/jquery.1.11.1.js" ></script>
    <script type="text/javascript" src="/homecare/public/js/bootstrap.js" ></script>
    <script type="text/javascript" src="/homecare/public/js/sb-admin-2.js" ></script>
    <script type="text/javascript" src="/homecare/public/js/metisMenu.js" ></script>
    <script type="text/javascript" src="/homecare/public/js/dialog/layer.js" ></script>
	<script type="text/javascript" src="/homecare/public/js/dialog.js" ></script>
	<script type="text/javascript" src="/homecare/public/js/vendor/uploadify/jquery.uploadify.js" ></script>
	<script type="text/javascript" src="/homecare/public/js/vendor/kindeditor/kindeditor-all.js"></script>
	<script type="text/javascript" src="/homecare/public/js/laydate.dev.js"></script>
	<script type="text/javascript" src="/homecare/public/js/laydate.js" ></script>		
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
					<a href="/homecare/admin.php/Login/logout"><i class="fa fa-fw fa-power-off "></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav in" id="side-menu">
				<li>
					<a href="/homecare/admin.php/Index/index"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a href="/homecare/admin.php/Community/index"><i class="fa fa-fw fa-edit"></i>添加社区</a>
				</li>
				<li>
					<a href="/homecare/admin.php/HospitalRegister/index"><i class="fa fa-fw fa-edit"></i>添加账号</a>
				</li>
				<li>
					<a href="/homecare/admin.php/Announcement/index"><i class="fa fa-fw fa-newspaper-o"></i>公告管理<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="/homecare/admin.php/Examine/index"><i class="fa fa-fw fa-university"></i>审核公告</a>
						</li>
						<li>
							<a href="/homecare/admin.php/Announcement/index"><i class="fa fa-fw fa-newspaper-o"></i>预览公告</a>
						</li>
						<li>
							<a href="/homecare/admin.php/Announcement/add"><i class="fa fa-fw fa-film"></i>发布公告</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="/homecare/admin.php/Video/index"><i class="fa fa-fw fa-film"></i>视频管理<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="/homecare/admin.php/Examine/index"><i class="fa fa-fw fa-university"></i>审核视频</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-newspaper-o"></i>预览视频</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-film"></i>发布视频</a>
						</li>
					</ul>
				</li>
				<!--<li>
					<a><i class="fa fa-fw fa-server"></i>审核<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="/homecare/admin.php/Examine/index"><i class="fa fa-fw fa-university"></i>商户审核</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-newspaper-o"></i>公告信息审核</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-film"></i>视频信息审核</a>
						</li>
					</ul>
				</li>-->
				<li>
					<a href="/homecare/admin.php/Video/index"><i class="fa fa-fw fa-film"></i>权限管理</a>
				</li>
				<li>
					<a href="/homecare/admin.php/Account/index"><i class="fa fa-fw fa-film"></i>账号信息</a>
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
							<a href="/homecare/admin.php/Video/index">视频管理</a>
						</li>
						<li class="active">
							<i class="fa fa-fw fa-edit"></i>
							添加视频
						</li>
					</ol>
				</div>
			</div>
			<!--表单.row-->
			<div class="col-sm-10">
				<form id="zyn-form-add" class="form-horizontal">
					<div class="form-group">
						<label for="zh-input-community_hospitals_id" class="control-label col-sm-3">视频发布单位:</label>
						<div class="col-sm-4">
							<input id="zh-input-community_hospitals_id" class="form-control" type="text" 
							    name="community_hospitals_id" placeholder="请输入视频发布单位"/>
						</div>
						<div class="col-sm-5">
							<p class="zyn-p-validate-result" attr-validate="community_hospitals_id"></p>
						</div>
					</div>
					<div class="form-group">
						<label for="zh-input-video_title" class="control-label col-sm-3">视频标题:</label>
						<div class="col-sm-4">
							<input id="zh-input-video_title" class="form-control" type="text" 
							    name="video_title" placeholder="请输入视频标题"/>
						</div>
						<div class="col-sm-5">
							<p class="zyn-p-validate-result" attr-validate="video_title"></p>
						</div>
					</div>
					<div class="form-group">
						<label for="zh-input-video-content" class="control-label col-sm-3">视频:</label>
						<div class="col-sm-5">
							<input type="file" id="zh-input-video-uploader" />
							<!--展示缩略图-->
							<img src="" alt="" id="zh-img-show-thumb" width="150px" style="display: none;"/>
							<!--封面图字段-->
							<input type="hidden" name="image_path" id="zh-input-image-path" />
							<!--缩略图字段-->
							<input type="hidden" name="thumb_path" id="zh-input-thumb-path" />
						</div>
					</div>
					<div class="form-group">
						<label for="zh-textarea-video_introduction" class="control-label col-sm-3">视频简介:</label>
						<div class="col-sm-4">
							<textarea class="js-editor" id="zh-textarea-video_introduction" name="video_introduction" rows="8"></textarea>
						</div>
						<div class="col-sm-5">
							<p class="zyn-p-validate-result" attr-validate="video_introduction"></p>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">视频类别：</label>
						<div class="col-sm-4">
							<select class="form-control" name="video_type_id">
								<option value="0" <?php if($type == 0): ?>selected<?php endif; ?>>宣传</option>
								<option value="1" <?php if($type == 1): ?>selected<?php endif; ?>>外科</option>
								<option value="2"<?php if($type == 2): ?>selected<?php endif; ?>>内科</option>
							</select>
						</div>
					</div>
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
		'add_url':'/homecare/admin.php/Video/add',
		'success_jump_url':'/homecare/admin.php/Video/index',
		'ajax_upload_swf':'/homecare/public/js/vendor/uploadify/uploadify.swf',
		'ajax_upload_url':'/homecare/admin.php/Video/ajaxUploadImage',
	};
</script>
    <script type="text/javascript" src="/homecare/public/js/constants.js" ></script>
    <script type="text/javascript" src="/homecare/public/js/admin/common.js" ></script>
    
	<script  type="text/javascript">
	laydate({

            elem: '#J-xl'
	});
		</script>
	</body>
</html>