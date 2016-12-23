<?php if (!defined('THINK_PATH')) exit();?><!--头尾分离    忽略错误信息 运行可用-->

<!DOCTYPE html>
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
					<a href="/homecare/admin.php/Community/index"><i class="icon-building"></i>社区管理</a>
				</li>
				<li>
					<a href="/homecare/admin.php/HospitalRegister/index"><i class="fa fa-fw fa-edit"></i>账号管理</a>
				</li>
				<li>
					<a href="/homecare/admin.php/Announcement/index"><i class="fa fa-fw fa-newspaper-o"></i>公告管理<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="/homecare/admin.php/Announcement/check"><i class="fa fa-fw fa-university"></i>审核公告</a>
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
			
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li class="active">
							<i class="fa fa-fw fa-edit"></i>
							添加公告
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
							<input id="zyn-input-announcement_title" class="form-control" type="text" name="announcement_title" placeholder="请输入标题"/>
						</div>
						<div class="col-sm-3">
							<p class="zyn-p-validate-result" attr-validate = "announcement_title"></p>
						</div>
					</div>
					<div class="form-group">
						<label for="zyn-input-announcement_type_id" class="control-label col-sm-4">公告类型：</label>
						<div class="col-sm-5">
							<select class="form-control" name="announcement_type_id">
								<option value="0000">全体用户</option>
								<option value="0001">关节炎</option>
								<option value="0002">肺心病</option>
						    </select>
						</div>
					</div>
					<div class="form-group">
						<label for="zyn-input-image" class="control-label col-sm-4">图片：</label>
						<div class="col-sm-6">
								<input id="zyn-input-uploader" type="file" />
								<!--缩略图-->
								<img src="" alt="" id="zyn-image-show-thumb" width="150px" style="display: none;"/>
								<!--封面图-->
								<input type="hidden" name="announcement_picture" id="zyn-input-image-path"/>
								<!--缩略图-->
								<!--<input type="hidden" name="announcement_small_picture" id="zyn-input-thumb-path"/>-->
							</div>
					</div>
					<div class="form-group">					
						<label for="zyn-textarea-content" class="control-label col-sm-4">内容：</label>
						<div class="col-sm-5">
							<textarea class="js-editor" id="zyn-textarea-content" name="announcement_content" rows="10" cols="43"></textarea>
						</div>
						<div class="col-sm-3">
							<p class="zyn-p-validate-result" attr-validate = "announcement_content"></p>
						</div>
					</div>		
					<div class="form-group">
						<label for="zyn-input-announcement_title" class="control-label col-sm-4">到期时间：</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="announcement_end_date" id="J-xl"/>
						</div>
						<div class="col-sm-3">
							<p class="zyn-p-validate-result" attr-validate = "announcement_end_date"></p>
						</div>
					</div>
					
								
					<!--<div class="form-group">
						<label for="" class="col-sm-4 control-label">状态类型：</label>
						<div class="col-sm-5">
							<input type="radio" name="status" value="1" checked/>开启
							<input type="radio" name="status" value="0"/>关闭
						</div>
					</div>-->
					<input type="hidden" name="announcement_company_type" value="1"/>
					<input type="hidden" name="announcement_check_state" value="1"/>
					<div class="row">
						<div class="col=sm-6 col-sm-offset-5">
							<button type="button" id="zyn-btn-add-submit" class="btn btn-primary">确认提交</button>
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
		'add_url':'/homecare/admin.php/Announcement/add',
		'success_jump_url':'/homecare/admin.php/Announcement/index',
		'ajax_upload_swf':'/homecare/public/js/vendor/uploadify/uploadify.swf',
		'ajax_upload_url':'/homecare/admin.php/Announcement/ajaxUploadImage', 
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