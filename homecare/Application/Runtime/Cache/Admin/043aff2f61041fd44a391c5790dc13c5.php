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
							审核公告
						</li>
					</ol>
				</div>
			</div>
	<!--.row面包屑导航-->
			<div class="row">
            	<div class="col-md-9 col-md-offset-1">
            		<div class="table-responsive">
            			<form id="zyn-form-list">
            				<table class="table table-bordered table-hover zyn-table-list">
            					<thead>
            						<tr class="success">
            							<td>公告标题</td>
            							<td>发布人</td>
            							<td>发布时间</td>
            							<td>操作</td>
            						</tr>
            					</thead>
            					<tbody>
            						<?php if(is_array($ancheckstate)): $i = 0; $__LIST__ = $ancheckstate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	            							<td><?php echo ($vo["announcement_title"]); ?></td>
	            							<td><?php echo ($vo["announcement_sender_id"]); ?></td>
	            							<td><?php echo ($vo["send_datetime"]); ?></td>
	            							<td>
	            								<span class="btn btn-primary" id='zyn-span-edit' attr-id="<?php echo ($vo["announcement_id"]); ?>">查看详情</span>
	            							</td>
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
</div>	

<script>
	var SCOPE = {
		'edit_url':'/homecare/admin.php/Announcement/edit'
//		'add_url':'/homecare/admin.php/Announcement/check',
//		'success_jump_url':'/homecare/admin.php/Announcement/index',
//		'ajax_upload_swf':'/homecare/public/js/vendor/uploadify/uploadify.swf',
//		'ajax_upload_url':'/homecare/admin.php/Announcement/ajaxUploadImage', 
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