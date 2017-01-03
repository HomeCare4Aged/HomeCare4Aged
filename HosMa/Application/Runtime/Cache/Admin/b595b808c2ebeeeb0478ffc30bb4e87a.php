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
							<i class="fa fa-fw fa-edit"></i>
							在班医生信息
						</li>
						
					</ol>
				</div>				
			</div><!--.row面包屑导航   -->
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<form id="xx-form-list">
							<table class="table table-bordered table-hover xx-table-list">
								<thead>
									<tr>
										<td>状态</td>
										<td>医生姓名</td>
										<td>职称</td>
										<td>科室编号</td>
										<td>剩余挂号数量</td>
										<td>挂号收费</td>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($schedules)): $i = 0; $__LIST__ = $schedules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<td>在班</td>
											<td><?php echo ($vo["hospital_doctor_name"]); ?></td>
											<td><?php echo ($vo["identity_name"]); ?></td>
											<td><?php echo ($vo["hospital_office_name"]); ?></td>
											<td><?php echo ($vo["registration_number_left"]); ?></td>
											<td><?php echo ($vo["registration_money"]); ?></td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</form>
					</div>
				</div>	
			</div><!--row-->
		</div>
	</div>
</div>
	<script>
		var SCOPE = {
			'add_url':'/HosMa7/admin.php/Index/add',
		};
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