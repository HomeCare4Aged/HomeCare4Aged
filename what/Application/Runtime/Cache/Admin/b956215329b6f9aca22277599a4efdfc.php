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
							<a href="/what/admin.php/Menu/index">菜单管理</a>
						</li>
					</ol>
				</div>
			</div>
			<!--面包屑导航-->
			<div class="row zh-div-serach">
				<div class="col-sm-6">
					<!--使用表单发送数据 horizontal水平-->
					<form action="/what/admin.php/Menu/index" method="get">
						<div class="input-group">
							<span class="input-group-addon">类型</span>
							<select class="form-control" name="type">
								<option value="100">全部</option>
								<!--使用if标签判断select标签-->
								<!--condition="$type eq 1"如果$type=1输出selected-->
								<option value="1" <?php if($type == 1): ?>selected<?php endif; ?>>后台菜单</option>
								<option value="0" <?php if($type == 0): ?>selected<?php endif; ?>>前端导航</option>
							</select>
							<div class="input-group-btn">
								<!--蓝色的btn-primary-->
								<button type="submit" class="btn btn-primary">
											<span class="glyphicon glyphicon-search"></span>
										</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-2">
					<button id="zh-button-add" type="button" class="btn btn-primary">创建菜单</button>
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-primary" id="zh-btn-listorder">排序</button>
				</div>
			</div>
			<!--搜索-->
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
										<td>菜单id</td>
										<td>菜单名</td>
										<td>模块名</td>
										<td>控制器名</td>
										<td>操作名</td>
										<td>类型</td>
										<td>状态</td>
										<td>排序</td>
										<td>操作</td>
									</tr>
								</thead>
								<!--tbody表身-->
								<tbody>
									<!--使用volist循环输出表单-->
									<!--name=""写输出那个变量-->
									<?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<td><?php echo ($vo["menu_id"]); ?></td>
											<td><?php echo ($vo["menu_name"]); ?></td>
											<td><?php echo ($vo["menu_module"]); ?></td>
											<td><?php echo ($vo["menu_controller"]); ?></td>
											<td><?php echo ($vo["menu_action"]); ?></td>
											<!--getType这是写的一个函数为了方便操作类型和 状态-->
											<td><?php echo (getDataType($vo["type"])); ?></td>
											<td><?php echo (getDataStatus($vo["status"])); ?></td>
											<td>
												<input type="text" name="list_oder[<?php echo ($vo["menu_id"]); ?>]" value="<?php echo ($vo["list_oder"]); ?>" size="4" />
											</td>
											<td>
												<!--glyphicon加一个小图标-->
												<span class="glyphicon glyphicon-edit" id="zh-span-edit" attr-id="<?php echo ($vo["menu_id"]); ?>"></span>
												<span class="glyphicon glyphicon-trash" id="zh-span-delete" attr-id="<?php echo ($vo["menu_id"]); ?>"></span>
											</td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</form>
						<!--分页控件-->
						<nav>
							<ul class="pagination">
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
		'add_url': '/what/admin.php/Menu/add',
		'edit_url': '/what/admin.php/Menu/edit',
		'set_status_url': '/what/admin.php/Menu/setStatus',
		'list_order_url': '/what/admin.php/Menu/listOrder',
		'success_refresh_url': '/what/admin.php/Menu/index',
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