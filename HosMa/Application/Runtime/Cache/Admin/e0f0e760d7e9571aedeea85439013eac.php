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
		                    <a href="/HosMa7/admin.php/Register/infusion.html">号池信息录入</a>
		                </li>
		                <li>
		                    <a href="/HosMa7/admin.php/Register/hang.html">挂号信息显示</a>
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
							<i class="fa fa-fw fa-edit"></i> 医院信息
						</li>

					</ol>
				</div>
			</div>
			<!--.row面包屑导航   -->
			<div class="row">
				<div class="col-sm-10">
					<form id="xx-form-add" class="form-horizontal">
						<div class="form-group">
							<label for="xx-input-community-hospitals-name" class="control-label col-sm-3">医院名称：</label>
							<div class="col-sm-5">
								<input id="xx-input-community-hospitals-name" class="form-control" type="text" name="community_hospitals_name" placeholder="请输入医院名称" value="<?php echo ($hospitals["community_hospitals_name"]); ?>" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="community_hospitals_name"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-community-hospitals-address" class="control-label col-sm-3">医院地址：</label>
							<div class="col-sm-5">
								<input id="xx-input-community-hospitals-address" class="form-control" type="text" name="community_hospitals_address" placeholder="请输入医院地址" value="<?php echo ($hospitals["community_hospitals_address"]); ?>" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="community_hospitals_address"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-hospital-introduction" class="control-label col-sm-3">医院简介：</label>
							<div class="col-sm-5">
								<textarea class="js-editor" id="xx-textarea-hospital-introduction" name="hospital_introduction" cols="42" rows="5" placeholder="请输入内容" ><?php echo ($hospitals["hospital_introduction"]); ?></textarea>
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="hospital_introduction"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-community-hospitals-principal" class="control-label col-sm-3">医院负责人：</label>
							<div class="col-sm-5">
								<input id="xx-input-community-hospitals-principal" class="form-control" type="text" name="community_hospitals_principal" placeholder="请输入医院负责人" value="<?php echo ($hospitals["community_hospitals_principal"]); ?>" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="community_hospitals_principal"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-principal-contact-phone" class="control-label col-sm-3">医院负责人联系方式：</label>
							<div class="col-sm-5">
								<input id="xx-input-principal-contact-phone" class="form-control" type="text" name="principal_contact_phone" placeholder="请输入医院负责人联系方式" value="<?php echo ($hospitals["principal_contact_phone"]); ?>" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="principal_contact_phone"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-hospital-business-begintime" class="control-label col-sm-3">营业开始时间：</label>
							<div class="col-sm-5">
								<input id="xx-input-hospital-business-begintime" class="form-control" type="text" name="hospital_business_begintime" placeholder="请输入营业开始时间" value="<?php echo ($hospitals["hospital_business_begintime"]); ?>" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="hospital_business_begintime"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-hospital-business-endtime" class="control-label col-sm-3">营业结束时间：</label>
							<div class="col-sm-5">
								<input id="xx-input-hospital-business-endtime" class="form-control" type="text" name="hospital_business_endtime" placeholder="请输入营业结束时间" value="<?php echo ($hospitals["hospital_business_endtime"]); ?>" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="hospital_business_endtime"></p>
							</div>
						</div>
						<!--<div class="form-group">
							<label for="xx-input-hospital-business-endtime" class="control-label col-sm-3">营业结束时间：</label>
							<div class="col-sm-5">
								 <input class="form-control" placeholder="hh:mm:ss" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="hospital_business_endtime"></p>
							</div>
						</div>-->
						<div class="form-group">
						<div class="row">
							<div class="col-sm-6 col-sm-offset-4">
								<button type="button" id="xx-btn-add-submit" class="btn btn-primary">提交</button>
							</div>
						</div>
						<input type="hidden" value="<?php echo ($hospitals["community_hospitals_id"]); ?>" name="id" />
					</form>
				</div>
			</div>
			<!--.row表单-->
		</div>
	</div>
</div>
<script>
	var SCOPE = {
		'add_url': '/HosMa7/admin.php/Hospital/index',
		'success_jump_url': '/HosMa7/admin.php/Hospital/index',
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