<?php if (!defined('THINK_PATH')) exit();?>
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