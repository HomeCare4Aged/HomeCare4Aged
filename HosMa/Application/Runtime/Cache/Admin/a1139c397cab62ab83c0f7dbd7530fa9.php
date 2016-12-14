<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>WebChina后台管理系统</title>
		<link rel="stylesheet" type="text/css" href="/HosMa/Public/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa/Public/css/vendor/metisMenu/metisMenu.min.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa/Public/css/sb-admin-2.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa/Public/css/vendor/font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="/HosMa/Public/css/admin/common.css" />
		<link rel="stylesheet" href="/HosMa/Public/css/vendor/uploadify/uploadify.css" />
		
		<script type="text/javascript" src="/HosMa/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/HosMa/Public/js/bootstrap.js"></script>
		<script type="text/javascript" src="/HosMa/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/HosMa/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/HosMa/Public/js/vendor/uploadify/jquery.uploadify.js" ></script>
		<script type="text/javascript" src="/HosMa/Public/js/vendor/kindeditor/kindeditor-all.js" ></script>
	</head>
	<body>




<div id="wrapper">
	<!--后台管理系统的导航栏-->
<nav class="navbar navbar-default navbar-static-top">
	<div class="navbar-header">
		<a href="#" class="navbar-brand">社区医院管理平台</a>
	</div>
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-fw fa-user"></i>wxx<i class="caret"></i>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="#"><i class="fa fa-fw fa-user"></i>个人中心</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="#"><i class="fa fa-fw fa-power-off"></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a href="../Index/index.html"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>信息录入<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="../Department/index.html">科室信息</a>
		                </li>
		                <li>
		                	<a href="../Doctor/index.html">医生信息</a>
		                </li>
		            </ul>
		            <!-- /.nav-second-level二级目录下拉 -->
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>排班<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="../Schedule/index.html">排班信息录入</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>挂单号<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="../Register/index.html">号池信息录入</a>
		                </li>
		                <li>
		                    <a href="../Register/info.html">挂号信息显示</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>公告栏<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="../Noticle/index.html">公告信息预览</a>
		                </li>
		                <li>
		                    <a href="../Noticle/add.html">公告发布</a>
		                </li>
		                <li>
		                    <a href="../Noticle/review.html">公告审核</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>视频栏<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="../Video/index.html">视频信息预览</a>
		                </li>
		                <li>
		                    <a href="../Video/add.html">视频发布</a>
		                </li>
		            </ul>
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
						<li class="">
							<i class="fa fa-fw fa-edit"></i>
							视频预览
						</li>
						
					</ol>
				</div>				
			</div><!--.row面包屑导航-->
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<form id="xx-form-list">
							<table class="table table-bordered table-hover xx-table-list">
								<thead>
									<tr>
										<td>视频ID</td>
										<td>发布视频单位</td>
										<td>视频标题</td>
										<td>视频时长</td>
										<td>视频简介</td>
										<td>视频分类</td>
										<td>状态</td>
										<td colspan="2">操作</td>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($video)): $i = 0; $__LIST__ = $video;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<td><?php echo ($vo["video_id"]); ?></td>
											<td><?php echo ($vo["community_hospitals_id"]); ?></td>
											<td><?php echo ($vo["video_title"]); ?></td>
											<td><?php echo ($vo["video_length"]); ?></td>
											<td><?php echo ($vo["video_introduction"]); ?></td>
											<td><?php echo ($vo["video_type_id"]); ?></td>
											<td><?php echo ($vo["video_type_id"]); ?></td>
											<td>
												<span class="glyphicon glyphicon-edit" id="xx-span-edit" attr-id="<?php echo ($vo["video_id"]); ?>"></span>

											</td>
											<td>
												<span class="glyphicon glyphicon-trash" id="xx-span-delete" attr-id="<?php echo ($vo["video_id"]); ?>"></span>
												
											</td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
<script>
	var SCOPE={
		'add_url':'/HosMa/admin.php/Video/add',
		'edit_url':'/HosMa/admin.php/Video/edit',
		'set_status_url':'/HosMa/admin.php/Video/setStatus',
		'list_order_url':'/HosMa/admin.php/Video/listOrder',
		'success_refresh_url':'/HosMa/admin.php/Video/index',
	};
	
</script>
	
	<script type="text/javascript" src="/HosMa/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/constants.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/admin/common.js"></script>
	</body>
</html>