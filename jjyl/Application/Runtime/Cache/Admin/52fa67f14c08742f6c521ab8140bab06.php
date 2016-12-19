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
					<a><i class="fa fa-fw fa-server"></i>审核<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="/1/admin.php/Examine/index"><i class="fa fa-fw fa-university"></i>商户审核</a>
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
					<a href="/1/admin.php/Announcement/index"><i class="fa fa-fw fa-newspaper-o"></i>公告管理</a>
				</li>
				<li>
					<a href="/1/admin.php/Hospital/index"><i class="fa fa-fw fa-stethoscope"></i>社区医院管理</a>
				</li>
				<li>
					<a href="/1/admin.php/Shop/index"><i class="fa fa-fw fa-university"></i>店铺管理</a>
				</li>
				<li>
					<a href="/1/admin.php/Video/index"><i class="fa fa-fw fa-film"></i>视频管理</a>
				</li>
				<li>
					<a href="/1/admin.php/HospitalRegister/index"><i class="fa fa-fw fa-edit"></i>医院后台注册</a>
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
							<i class="fa fa-fw fa-money"></i>
							<a href="/1/admin.php/Shop/index">店铺管理</a>
						</li>
						<li class="active">
							<i class="fa fa-fw fa-table"></i>店铺列表
						</li>
					</ol>
				</div>
			</div><!--面包屑导航-->
<!--			<div class="row">
				<form action="/1/admin.php/Shop/index" method="get" class="form-horizontal">
					<div class="input-group">
						<span class="input-group-addon">类型</span>
						<select class="form-control" name="video_type_id">
							<option value="-723">全部列表</option>
							<option value="0" <?php if($type == 0): ?>selected<?php endif; ?>>宣传</option>
							<option value="1"<?php if($type == 1): ?>selected<?php endif; ?>>内科</option>
							<option value="2"<?php if($type == 2): ?>selected<?php endif; ?>>外科</option>
						</select>
						<div class="input-group-btn">
						    <button type="submit" class="btn btn-primary">
							    <span class="glyphicon glyphicon-search"></span>
						    </button>
					    </div>
					</div>
				</form>
            </div>                 -->                       
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<form id="zyn-form-list">
							<table class="table table-bordered table-hover zyn-table-list">
								<thead>
									<tr class="success">
										<td>店铺名称</td>
										<td>店铺类型</td>
										<!--<td>创建人</td>
										<td>店铺简介</td>
										<td>店铺地址</td>-->
										<td>开始营业时间</td>
										<td>结束营业时间</td>
										<!--<td>运费</td>
										<td>运送范围</td>-->
										<td>联系人姓名</td>
										<td>联系人电话</td>
										<td>当前营业状态</td>
										<td>经营范围</td>
										<td>操作</td>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>　　<tr>
										    <td><?php echo ($vo["store_shop_name"]); ?></td>
										    <td><?php echo ($vo["store_type_id"]); ?></td>
										    <!--<td><?php echo ($vo["store_user_id"]); ?></td>
										    <td><?php echo ($vo["store_shop_introduction"]); ?></td>
										    <td><?php echo ($vo["store_shop_address"]); ?></td>-->
										    <td><?php echo ($vo["store_begin_time"]); ?></td>
										    <td><?php echo ($vo["store_end_time"]); ?></td>
										    <!--<td><?php echo ($vo["store_carriage"]); ?></td>
										　　<td><?php echo ($vo["store_send_distance"]); ?></td>-->
										　　<td><?php echo ($vo["store_contact_user_name"]); ?></td>
										　　<td><?php echo ($vo["store_contact_user_phone"]); ?></td>
										　　<td><?php echo ($vo["store_business_state"]); ?></td>
										    　<td><a href="/1/admin.php/Shop/shop">详情</a></td>
										    <td><a href="">下架</a></td>
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var SCOPE = {
		'add_url':'/1/admin.php/Shop/add',
		'edit_url':'/1/admin.php/Shop/edit',
		'set_status_url':'/1/admin.php/Shop/setStatus',
		'list_order_url':'/1/admin.php/Shop/listOrder',
		'success_refresh_url':'/1/admin.php/Shop/index',
	};
</script>
    <script type="text/javascript" src="/1/public/js/constants.js" ></script>
    <script type="text/javascript" src="/1/public/js/admin/common.js" ></script>
	</body>
</html>