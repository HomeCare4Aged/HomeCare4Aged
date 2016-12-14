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
				<i class="fa fa-fw fa-user"></i>123<i class="caret"></i>
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
					<a href="/jjyl/admin.php/Index/index"><i class="fa fa-fw fa-dashboard"></i>审核<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						
						<li>
							<a href="/jjyl/admin.php/Index/index"><i class="fa fa-fw fa-home"></i>商户商户</a>
						</li>
						<li>
							<a href="/jjyl/admin.php/Index/index"><i class="fa fa-fw fa-home"></i>视频信息审核</a>
						</li>
						<li>
							<a href="/jjyl/admin.php/Index/index"><i class="fa fa-fw fa-home"></i>通告信息审核</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="/jjyl/admin.php/Announcement/index"><i class="fa fa-fw fa-dashboard"></i>公告管理</a>
				</li>
				<li>
					<a href="/jjyl/admin.php/Menu/index"><i class="fa fa-fw fa-dashboard"></i>社区医院管理</a>
				</li>
				<li>
					<a href="/jjyl/admin.php/Menu/index"><i class="fa fa-fw fa-dashboard"></i>店铺管理</a>
				</li>
				<li>
					<a href="/jjyl/admin.php/Menu/index"><i class="fa fa-fw fa-dashboard"></i>视频管理</a>
				</li>
				<li>
					<a href="/jjyl/admin.php/HospitalRegister/index"><i class="fa fa-fw fa-dashboard"></i>医院后台注册</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

	<div id="page-wrapper">
		<!--面包屑导航.row-->
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-fw fa-table"></i>
							<a href="/jjyl/admin.php/Index/index">医院列表</a>
						</li>
						<li>
							<i class="fa fa-fw fa-table"></i>
							<a href="/jjyl/admin.php/Index/shop">商户列表</a>
						</li>
					</ol>
				</div>
			</div>
		<div class="row">
		    <div class="col-sm-12">
		    	<div class="table-responsive">
					<form id="zh-form-list">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<td>医院名称</td>
									<td>医院地址</td>
									<td>联系方式</td>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($communityhospitalsinfos)): $i = 0; $__LIST__ = $communityhospitalsinfos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									    <td><?php echo ($vo["community_hospitals_name"]); ?></td>
										<td><?php echo ($vo["community_hospitals_address"]); ?></td>
										<td><?php echo ($vo["principal_contact_phone"]); ?></td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
					</form>
					<nav>
						<ul class="pagination">
							<?php echo ($pageRes); ?>
						</ul>
					</nav>
				</div>
		    </div>
		</div>
	</div>
</div>
    <script type="text/javascript" src="/jjyl/public/js/constants.js" ></script>
    <script type="text/javascript" src="/jjyl/public/js/admin/common.js" ></script>
	</body>
</html>