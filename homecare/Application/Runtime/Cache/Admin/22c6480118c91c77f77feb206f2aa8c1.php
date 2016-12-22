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
						<li class="">
							<i class="fa fa-fw fa-edit"></i>
							公告预览
						</li>
						
					</ol>
				</div>				
			</div><!--.row面包屑导航   -->
			<div class="row">
				<div class="col-sm-12">
						<select name="xx-select-user" id="xx-select-choosse">
							<option value="0" selected="selected">我的公告</option>
							<option value="1">全部</option>
						</select>
						<select name="xx-select-type" id="xx-select-type" style="display: auto;">
							<option value="1">未审核</option>
							<option value="2">通过</option>
							<option value="3">未通过</option>
						</select>
				</div>
			</div>	
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<form id="xx-form-list">
							<table class="table table-bordered table-hover xx-table-list" id="tableID">
								<thead>
									<tr>
										<td style="display: none;"></td>
										<td>发布时间</td>
										<td>公告标题</td>
										<td>审核状态</td>
										<td>查看详情</td>
										<td>编辑</td>
										<td>删除</td>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($announcement)): $i = 0; $__LIST__ = $announcement;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<td style="display: none;"><?php echo ($vo["announcement_id"]); ?></td>
											<td><?php echo ($vo["send_datetime"]); ?></td>
											<td><?php echo ($vo["announcement_title"]); ?></td>
											<td><?php echo ($vo["announcement_check_state"]); ?></td>	
											<td>
												<span class="glyphicon glyphicon-check" id="xx-span-editor3"></span>
											</td>
											<td>
												<span class="glyphicon glyphicon-edit" id="xx-span-edit"></span>
											</td>
											<td>
												<span class="glyphicon glyphicon-trash" id="xx-span-delete"></span>
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
		'add_url':'/homecare/admin.php/Announcement/add',
		'edit_url':'/homecare/admin.php/Announcement/edit',
		'set_status_url':'/homecare/admin.php/Announcement/setStatus',
		'list_order_url':'/homecare/admin.php/Announcement/listOrder',
		'success_refresh_url':'/homecare/admin.php/Announcement/index',
	};
	$("#xx-select-type").on('change',function(){
		var selectedValue = $(this).val();
		$.ajax({
			type:"post",
			url:"/homecare/admin.php/Announcement/getData",
			async:true,
			data:{'selectedValue':selectedValue},
			dataType:'json',
			success:function(data){
				console.log(data);
				$('#tableID tbody').remove();
				var sRows = '';
				for( var i in data ){
					var sRow = '<tr>' +
									'<td style="display: none;">' + data[i].announcement_id + '</td>'+
									'<td>' + data[i].send_datetime + '</td>' +
									'<td>' + data[i].announcement_title + '</td>'+
									'<td>' + data[i].announcement_check_state + '</td>'+	
									'<td>' +
										'<span class="glyphicon glyphicon-edit" id="xx-span-edit"></span>'+
									'</td>' +
									'<td>' +
										'<span class="glyphicon glyphicon-trash" id="xx-span-delete"></span>'+
									'</td>' +
									'<td>' +
										'<span class="glyphicon glyphicon-check" id="xx-span-editor3"></span>'+
									'</td>' +
								'</tr>';
					
					sRows += sRow;
				}
				$('#tableID').append('<tbody></tbody>');
				$('#tableID tbody').html(sRows);
										
									
			}
		});
		
	});
	$('#xx-select-choosse').click(function(){
        if(($(this).val()) == 0){
        	$('#xx-select-type').attr('style','display:auto');
        }
        if(($(this).val()) == 1){	
        	$('#xx-select-type').attr('style','display:none');
        }
    });
    $("#xx-select-choosse").on('change',function(){
		var selectedValue = $(this).val();
		$.ajax({
			type:"post",
			url:"/homecare/admin.php/Announcement/getSourse",
			async:true,
			data:{'selectedValue':selectedValue},
			dataType:'json',
			success:function(data){
				console.log(data);
				$('#tableID tbody').remove();
				var sRows = '';
				for( var i in data ){
					var sRow = '<tr>' +
									'<td style="display: none;">' + data[i].announcement_id + '</td>'+
									'<td>' + data[i].send_datetime + '</td>' +
									'<td>' + data[i].announcement_title + '</td>'+
									'<td>' + data[i].announcement_check_state + '</td>'+	
									'<td>' +
										'<span class="glyphicon glyphicon-edit" id="xx-span-edit"></span>'+
									'</td>' +
									'<td>' +
										'<span class="glyphicon glyphicon-trash" id="xx-span-delete"></span>'+
									'</td>' +
									'<td>' +
										'<span class="glyphicon glyphicon-check" id="xx-span-editor3"></span>'+
									'</td>' +
								'</tr>';
					sRows += sRow;
				}
				$('#tableID').append('<tbody></tbody>');
				$('#tableID tbody').html(sRows);
			}
		});
		
	});
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