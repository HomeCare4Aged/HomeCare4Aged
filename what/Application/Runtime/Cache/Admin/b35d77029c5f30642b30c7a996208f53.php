<?php if (!defined('THINK_PATH')) exit();?><!--<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
	</body>
</html>-->
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>WebChina后台管理系统</title>
		<link rel="stylesheet" href="/what/Public/css/bootstrap.css" />
		<link rel="stylesheet" href="/what/Public/css/sb-admin.css" />
		<link rel="stylesheet" href="/what/Public/css/font-awesome/font-awesome-css/css/font-awesome.css" />
		<link rel="stylesheet" href="/what/Public/css/admin/common.css" />
		<link rel="stylesheet" href="/what/Public/css/vendor/uploadify/uploadify.css" />
		<script type="text/javascript" src="/what/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/what/Public/js/bootstrap.js"></script>
		<script type="text/javascript" src="/what/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/what/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/what/Public/js/vendor/uploadify/jquery.uploadify.js"></script>
		<script type="text/javascript" src="/what/Public/js/vendor/kindeditor/kindeditor-all.js"></script>
	</head>

	<body>
		<!--</body>
</html>-->
<div id="wrapper">
	<!--<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
	</body>
</html>-->
<?php
 $nav_admin = session(C('ADMIN_SESSION')); $nav_role = D('Role')->find($nav_admin['admin_role_id']); $nav_role_menu_ids = $nav_role['role_menu_ids']; $nav_menus = D('Menu')->select($nav_role_menu_ids); $index = 'index'; ?>
<!--后台管理系统的导航栏-->
<!--navbar导航栏横过来，navbar-inverse,变黑，navbar-fixed-top固定在顶端-->
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-header">
		<a href="#" class="navbar-brand">WebChina后台管理系统</a>
	</div>
	<ul class="nav navbar-right top-left">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<!--fa快速加载-->
				<i class="fa fa-fw fa-user"></i>zhanyong<i class="caret"></i>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="#"><i class="fa fa-fw fa-user"></i>个人中心</a>
				</li>
				<!--divider叫横线-->
				<li class="divider"></li>
				<li>
					<!--<a href="127.0.0.1/what/admin.php/Login/loginOut">注销</a>-->
					<a href="/what/admin.php/Login/loginOut"><i class="fa fa-fw fa-power-off"></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<!--side-nav出现在左边-->
	<ul class="nav navbar-nav side-nav">
		<!--<li class="active">-->
		<li <?php echo (getMenuActiveStatus($index)); ?>>
			<!--<li>-->
			<a href="/what/admin.php/Index/index"><i class="fa fa-fw fa-home"></i>首页</a>
		</li>
		<!--<li>
			<a href="/what/admin.php/Menu/index"><i class="fa fa-fw fa-table"></i>菜单管理</a>
		</li>-->
		<?php if(is_array($nav_menus)): $i = 0; $__LIST__ = $nav_menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--使用模板显示高亮-->
			<li <?php echo (getMenuActiveStatus($vo["menu_controller"])); ?>>
				<!--<li>-->
				<a href="/what/admin.php/<?php echo ($vo["menu_controller"]); ?>/<?php echo ($vo["menu_action"]); ?>">
					<i class="fa fa-fw fa-cog"></i> <?php echo ($vo["menu_name"]); ?>
				</a>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</nav>
	<!--pagee-wrapper固定在中间-->
	<div id="page-wrapper">
		<div class="container-fluid">
			<!--菜单管理11-->
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-fw fa-table"></i>
							<a href="/what/admin.php/Role/index">角色管理</a>
						</li>
					</ol>
				</div>
			</div>
			<!--面包屑导航-->
			<!--创建角色-->
			<div class="row">
				<div class="col-sm-6">
					<button type="button" class="btn btn-primary" id="zh-button-add">创建角色</button>
				</div>
			</div>
			<!--创建角色end-->
			<!--角色列表-->
			<div class="row">
				<div class="col-md-12">
					<!--table-responsive响应式表格(但不是真正的表格)，当缩小到一定程度时会给出导航条-->
					<div class="table-responsive">
						<!--form表单是功能性标签-->
						<form id="zh-form-list">
							<!--table-bordered带边框 table-hover显示高亮-->
							<table class="table table-bordered table-hover zh-table-list">
								<!--thead表头-->
								<thead>
									<tr>
										<td>角色id</td>
										<td>角色名</td>
										<td>状态</td>
										<td colspan="3">操作</td>
									</tr>
								</thead>
								<!--tbody表身-->
								<tbody>
									<!--使用volist循环输出表单-->
									<!--name=""写输出那个变量-->
									<?php if(is_array($roles)): $i = 0; $__LIST__ = $roles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<td><?php echo ($vo["role_id"]); ?></td>
											<td><?php echo ($vo["role_name"]); ?></td>
											<td><?php echo (getDataStatus($vo["status"])); ?></td>
											<td>
												<!--输出模板变量-->
												<span class="zh-span-operation" id="zh-span-assign-auth" attr-id="<?php echo ($vo["role_id"]); ?>">分配权限</span>
											</td>
											<td>
												<span class="zh-span-operation" id="zh-span-edit" attr-id="<?php echo ($vo["role_id"]); ?>">编辑</span>
											</td>
											<td>
												<span class="zh-span-operation" id="zh-span-delete" attr-id="<?php echo ($vo["role_id"]); ?>">删除</span>
											</td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</form>
						<!--分页控件-->
						<nav>
							<ul class="pagination">
								<!--这是一个空模板-->
								<?php echo ($pageResult); ?>
							</ul>
						</nav>
						<!--排序的按钮-->
						<!--<button type="button" class="btn btn-primary" id="zh-btn-listorder">排序</button>-->
					</div>
				</div>
			</div>
			<!--<div class="row">
						<button id="zh-button-add" type="button" class="btn btn-primary">创建菜单</button>
					</div>-->
		</div>
	</div>
</div>
<script>
	var SCROP = {
		'add_url': '/what/admin.php/Role/add',
		'edit_url': '/what/admin.php/Role/edit',
		'set_status_url': '/what/admin.php/Role/setStatus',
		//				'list_order_url':'/what/admin.php/Role/listOrder',
		'success_refresh_url': '/what/admin.php/Role/index',
		'assign_auth_url': '/what/admin.php/Role/assignAuth',
	};
</script>
<!--<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>-->
<script type="text/javascript" src="/what/Public/js/Constants.js"></script>
<script type="text/javascript" src="/what/Public/js/admin/common.js"></script>
</body>

</html>