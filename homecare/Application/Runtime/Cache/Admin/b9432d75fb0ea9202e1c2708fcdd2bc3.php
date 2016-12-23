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
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<i class="fa fa-fw fa-table"></i>
						<a href="/homecare/admin.php/Community/index" >社区列表</a>
						<i class="fa fa-fw fa-table"></i>
						<a href="/homecare/admin.php/Community/add" class="active">添加社区</a>
					</ol>
				</div>
			</div>
			<div class="row" style="margin-top: 20px;">
            	<div class="col-md-10 col-md-offset-2">
	            	<form  class="form-horizontal" id="zyn-form-add">
	            		<div class="form-group">
							<label for="zyn-input-community_name" class="control-label col-md-2">社区名称：</label>
							<div class="col-md-4">
								<input id="zyn-input-community_name" class="form-control" type="text" name="community_name" placeholder="请输入社区名称"/>
							</div>
							<div class="col-md-3">
								<p class="zyn-p-validate-result" attr-validate = "community_name"></p>
							</div>
						</div>
	            		<div class="form-group">
							<label for="zyn-input-community_name" class="control-label col-md-2">区(县)：</label>
							<div class="col-md-4">
								<select class="form-control" name="area">
								<option value="723">选择所在区域</option>
								<option value="西青区">西青区</option>
								<option value="和平区">和平区</option>
								<option value="河东区">河东区</option>
							</select>
							</div>
						</div>
	            		
	            		<div class="form-group">
							<label for="zyn-input-community_address" class="control-label col-md-2">详细地址：</label>
							<div class="col-md-4">
								<textarea class="js-editor" id="zyn-textarea-content" name="community_address" rows="4" style="width: 280px;"></textarea>
							</div>
							<div class="col-md-2">
								<p class="zyn-p-validate-result" attr-validate = "community_address"></p>
							</div>
						</div>
						
						<div class="form-group">
							<label for="zyn-input-community_name" class="control-label col-md-2">状态：</label>
							<div class="col-md-4">
								<input type="radio" name="state" id="state" value="开启" checked />开启
								<input type="radio" name="state" id="state" value="关闭" />关闭
							</div>
							
						</div>
						<div class="col-md-4 col-md-offset-3">
							<button type="button" class="btn btn-group btn-primary" id="zyn-btn-add-submit">确认提交</button>
						</div>
	            	</form>
	            </div>
	            
            </div>
		</div>
	</div>
</div>		
<script>
	var SCOPE = {
		'add_url':'/homecare/admin.php/Community/add',
		'edit_url':'/homecare/admin.php/Community/edit',
		'set_status_url':'/homecare/admin.php/Community/setStatus',
		'list_order_url':'/homecare/admin.php/Community/listOrder',
		'success_refresh_url':'/homecare/admin.php/Community/add',
		'success_jump_url':'/homecare/admin.php/Community/index',
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