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
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-fw fa-table"></i>
							<a href="/jjyl/admin.php/Announcement/index">公告管理</a>
						</li>					
					</ol>
				</div>
			</div><!--.row面包屑导航-->
			<div class="row zz-div-search" >
				<div class="col-sm-6">
					<form action="/jjyl/admin.php/Announcement/index" method="get" class="form-horizontal">
						<div class="input-group">
							<span class="input-group-addon">查询</span>
							<span class="input-group">
    							<input type="text" class="form-control input-lg" id="zz-input-keywords" placeholder="search">
    							<span class="input-group-addon btn btn-primary" id="zz-span-thesearch">搜索</span>
							</span>
						</div>	
					</form>
				</div>
				<div class="col-sm-2">
					<button id="zz-btn-add" type="button" class="btn btn-primary">添加公告</button>
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-primary" id="zz-btn-listorder">排序</button>
				</div>
			</div><!--搜索-->
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<form id="zz-form-list">
							<table class="table table-bordered table-hover zz-table-list" >
								<thead>
									<tr>
										<td>标题</td>
										<td>发布用户</td>
										<td>所属单位</td>
										<td>审核状态</td>
										<td>审核人员</td>
										<td>排序</td>
										<td colspan="2">操作</td>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<td><?php echo ($vo["article_id"]); ?></td>
											<td><?php echo ($vo["title"]); ?></td>
											<td><?php echo ($vo["small_title"]); ?></td>
											<td>
												<img src="<?php echo ($vo["thumb_path"]); ?>" alt=""/>
											</td>
											<td><?php echo ($vo["keywords"]); ?></td>
											<td><?php echo (getDataStatus($vo["status"])); ?></td>
											<td><?php echo ($vo["create_time"]); ?></td>
											<td><?php echo ($vo["update_time"]); ?></td>
											<td><?php echo ($vo["count"]); ?></td>
											<td><input size="4" type="text" name="list_order[<?php echo ($vo["article_id"]); ?>]" value="<?php echo ($vo["list_order"]); ?>" /></td>
											<td>
												<span class="glyphicon glyphicon-edit" id="zz-span-edit" attr-id="<?php echo ($vo["article_id"]); ?>"></span>
											</td>
											<td>
												<span class="glyphicon glyphicon-trash" id="zz-span-delete" attr-id="<?php echo ($vo["article_id"]); ?>"></span>
											</td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</form>
						<!--分页控件-->
						<nav>
							<ul class="pagination">
								<?php echo ($pageRes); ?>
							</ul>
						</nav>
<!--						<button type="button" class="btn btn-primary" id="zz-btn-listorder">排序</button>
-->					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
	<script>
		var SCOPE = {
		
		'add_url':'/jjyl/admin.php/Announcement/add',
		'edit_url':'/jjyl/admin.php/Announcement/edit',
		'set_status_url':'/jjyl/admin.php/Announcement/setStatus',
		'list_order_url':'/jjyl/admin.php/Announcement/listOrder',
		'success_refresh_url':'/jjyl/admin.php/Announcement/index',
	};
	</script>
	
		
    <script type="text/javascript" src="/jjyl/public/js/constants.js" ></script>
    <script type="text/javascript" src="/jjyl/public/js/admin/common.js" ></script>
	</body>
</html>