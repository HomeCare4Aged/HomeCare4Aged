<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>社区医院管理系统</title>
		<link rel="stylesheet" type="text/css" href="/HosMa7/Public/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa7/Public/css/vendor/metisMenu/metisMenu.min.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa7/Public/css/sb-admin-2.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa7/Public/css/vendor/font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="/HosMa7/Public/css/admin/common.css" />
		<link rel="stylesheet" href="/HosMa7/Public/css/vendor/uploadify/uploadify.css" />
		<link rel="stylesheet" type="text/css" href="/HosMa7/Public/css/daterangepicker-bs3.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa7/Public/css/dataTable/jquery.dataTables.min.css" />
		<!--挂号-->
		<link rel="stylesheet" href="/HosMa7/Public/css/admin/hang.css" />
		<!--输液-->
		<link rel="stylesheet" href="/HosMa7/Public/css/admin/infusion.css" />
		<script type="text/javascript" src="/HosMa7/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/HosMa7/Public/js/bootstrap.js"></script>
		<script type="text/javascript" src="/HosMa7/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/HosMa7/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/HosMa7/Public/js/vendor/uploadify/jquery.uploadify.js" ></script>
		<script type="text/javascript" src="/HosMa7/Public/js/vendor/kindeditor/kindeditor-all.js" ></script>		
		<!--挂号-->
		<script type="text/javascript" src="/HosMa7/Public/js/admin/hang.js" ></script>
		<!--输液-->
		<script type="text/javascript" src="/HosMa7/Public/js/admin/infusion.js" ></script>
	</head>
	<body>




<div id="wrapper">
	<?php
 $nav_admin = session(C('ADMIN_SESSION')); $admin = array( 'hospital_user_id' => $nav_admin['hospital_user_id'], ); $nav_user = D('h_user_limit_info')->where($admin)->select(); $nav_user_menu_ids = $nav_user[0]['limit_id']; $nav_hospital = D('h_hospitals_info')->where('community_hospitals_id='.$nav_admin['hospital_user_id'])->select(); $nav_use = D('h_hospitals_info')->where('community_hospitals_id='.$nav_admin['hospital_user_id'])->select(); $index = 'index'; ?>
	
<!--后台管理系统的导航栏-->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-header">
		<a href="#" class="navbar-brand">社区医院管理平台</a>
	</div>
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-fw fa-user"></i><?php echo ($nav_admin["hospital_user_name"]); ?><i class="caret"></i>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="#"><i class="fa fa-fw fa-user"></i>个人中心</a>
				</li>
				<li class="divider"></li>
				<li>
						<a href="/HosMa7/admin.php/Login/loginOut"><i class="fa fa-fw fa-power-off"></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a href="/HosMa7/admin.php/Index/index.html"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>信息录入<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa7/admin.php/Hospital/index.html">医院信息</a>
		                </li>
		                <li>
		                    <a href="/HosMa7/admin.php/Department/index.html">科室信息</a>
		                </li>
		                <li>
		                	<a href="/HosMa7/admin.php/Doctor/index.html">医生信息</a>
		                </li>
		                <li>
		                	<a href="/HosMa7/admin.php/User/index.html">员工信息</a>
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
		                    <a href="/HosMa7/admin.php/Schedule/index.html">排班信息录入</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>挂号单<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa7/admin.php/Register/hang.html">挂号信息显示</a>
		                </li>
		                <li>
		                    <a href="/HosMa7/admin.php/Register/infusion.html">输液信息显示</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>公告栏<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa7/admin.php/Noticle/index.html">公告审核</a>
		                </li>
		                <!--<li>-->
		                    <!--<a href="/HosMa7/admin.php/Noticle/add.html">公告发布</a>-->
		                <!--</li>-->
		                <li>
		                    <a href="/HosMa7/admin.php/Noticle/review.html">公告管理</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="/HosMa7/admin.php/Account/index.html">
						<i class="fa fa-fw fa-cogs"></i>账户信息<span class="fa arrow"></span>
					</a>
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
							<i class="fa fa-fw fa-table"></i>
							公告审核
						</li>
						
					</ol>
				</div>				
			</div><!--.row面包屑导航   -->
			<div class="row">
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#movie1" data-toggle="tab">待审核公告</a></li>
						<li><a href="#movie2" data-toggle="tab">已审核公告</a></li>
					</ul>
				</div>
			</div>
			<div class="tab-content">
				<div class="tab-pane active" id="movie1">
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
								<form id="xx-form-list">
									<table class="table table-bordered table-hover xx-table-list" id="tableID">
										<thead>
											<tr>
												<td style="display: none;"></td>
												<td style="display: none;"></td>
												<td>公告标题</td>
												<td>发布时间</td>
												<td>发布人</td>
												<td>查看详情</td>
		
											</tr>
										</thead>
										<tbody>
											<?php if(is_array($announcement)): $i = 0; $__LIST__ = $announcement;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
													<td style="display: none;"><?php echo ($vo["announcement_id"]); ?></td>
													<td style="display: none;"><?php echo ($vo["announcement_version_number"]); ?></td>
													<td><?php echo ($vo["announcement_title"]); ?></td>
													<td><?php echo ($vo["send_datetime"]); ?></td>
													<td><?php echo ($vo["announcement_sender_id"]); ?></td>	
													<td>
														<span class="glyphicon glyphicon-check" id="xx-span-editor3" onclick="clickCheck(this)"   ></span>
													</td>
												</tr><?php endforeach; endif; else: echo "" ;endif; ?>
										</tbody>
									</table>
								</form>
							</div>
						</div>
				
					</div>
				</div>
			
			
				<div class="tab-pane" id="movie2">
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
								<form id="xx-form-list">
									<table class="table table-bordered table-hover xx-table-list" id="tableID">
										<thead>
											<tr>
												<td style="display: none;"></td>
												<td style="display: none;"></td>
												<td>公告标题</td>
												<td>发布时间</td>
												<td>发布人</td>
												<td>查看详情</td>
		
											</tr>
										</thead>
										<tbody>
											<?php if(is_array($announcemence)): $i = 0; $__LIST__ = $announcemence;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
													<td style="display: none;"><?php echo ($vo["announcement_id"]); ?></td>
													<td style="display: none;"><?php echo ($vo["announcement_version_number"]); ?></td>
													<td><?php echo ($vo["announcement_title"]); ?></td>
													<td><?php echo ($vo["send_datetime"]); ?></td>
													<td><?php echo ($vo["announcement_sender_id"]); ?></td>	
													<td>
														<span class="glyphicon glyphicon-check" id="xx-span-editor3" onclick="clickCheck(this)"></span>
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
		
	</div>
</div>	
<script>
	var SCOPE={
		'add_url':'/HosMa7/admin.php/Noticle/add',
		'edit_url':'/HosMa7/admin.php/Noticle/edit',
		'set_status_url':'/HosMa7/admin.php/Noticle/setStatus',
		'list_order_url':'/HosMa7/admin.php/Noticle/listOrder',
		'success_refresh_url':'/HosMa7/admin.php/Noticle/index',
		'review_url':'/HosMa7/admin.php/Noticle/saveAnother',
		'detail_url':'/HosMa7/admin.php/Noticle/detail',
	};
	
	
	function clickCheck(obj){
		var objpp = obj.parentNode.parentNode;
			var msg = [];
//			console.log(objpp.children);
//			console.log(objpp.children.length);
			for (var i=0 ; i<objpp.children.length;i++){
//				console.log(objpp.children[i].innerText)
				msg[i] = objpp.children[i].innerText;
			}
			var id = msg[0];
			var num = msg[1];
			console.log(num);
		location.href = SCOPE.detail_url+'?id='+id+'&num='+num;	
	}
</script>
	
</script>
	
	<script type="text/javascript" src="/HosMa7/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/HosMa7/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/HosMa7/Public/js/constants.js"></script>
	<script type="text/javascript" src="/HosMa7/Public/js/admin/common.js"></script>
	<script type="text/javascript" src="/HosMa7/Public/js/moment.js"></script>
	<script type="text/javascript" src="/HosMa7/Public/js/daterangepicker.js"></script>
	<script type="text/javascript" src="/HosMa7/Public/js/dataTable/jquery.dataTables.min.js"></script>
	</body>
</html>