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
		                    <a href="../Hospital/index.html">医院信息</a>
		                </li>
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
		<div class="container">
			<h3>医院信息</h3>
			<div class="row">
				<div class="col-sm-10">
					<form id="xx-form-add" class="form-horizontal">
						<div class="form-group">
							<label for="xx-input-community-hospitals-name" class="control-label col-sm-3">医院名称：</label>
							<div class="col-sm-5">
								<input id="xx-input-community-hospitals-name" class="form-control" type="text" 
								name="community_hospitals_name" placeholder="请输入医院名称" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="community_hospitals_name"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-community-hospitals-address" class="control-label col-sm-3">医院地址：</label>
							<div class="col-sm-5">
								<input id="xx-input-community-hospitals-address" class="form-control" type="text" 
								name="community_hospitals_address" placeholder="请输入医院地址" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="community_hospitals_address"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-community-hospitals-principal" class="control-label col-sm-3">医院负责人：</label>
							<div class="col-sm-5">
								<input id="xx-input-community-hospitals-principal" class="form-control" type="text" 
								name="community_hospitals_principal" placeholder="请输入医院负责人" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="community_hospitals_principal"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-principal-contact-phone" class="control-label col-sm-3">医院负责人联系方式：</label>
							<div class="col-sm-5">
								<input id="xx-input-principal-contact-phone" class="form-control" type="text" 
								name="principal_contact_phone" placeholder="请输入医院负责人联系方式" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="principal_contact_phone"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-hospital-bad-number" class="control-label col-sm-3">输液床位（网上开放个数）：</label>
							<div class="col-sm-5">
								<input id="xx-input-hospital-bad-number" class="form-control" type="text" 
								name="hospital_bad_number" placeholder="请输入输液床位" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="hospital_bad_number"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-hospital-seat-number" class="control-label col-sm-3">输液座位（网上开放个数）：</label>
							<div class="col-sm-5">
								<input id="xx-input-hospital-seat-number" class="form-control" type="text" 
								name="hospital_seat_number" placeholder="请输入输液座位" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="hospital_seat_number"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-hospital-business-time" class="control-label col-sm-3">营业时间：</label>
							<div class="col-sm-5">
								<input id="xx-input-hospital-business-time" class="form-control" type="text" 
								name="hospital_business_time" placeholder="请输入营业时间" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="hospital_business_time"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-sm-offset-4">
								<button type="button" id="xx-btn-add-submit" class="btn btn-primary">提交</button>
							</div>
						</div>
					</form>
				</div>
			</div><!--.row表单-->
		</div>
	</div>
</div>
<script>
	var SCOPE = {
		'add_url':'/HosMa/admin.php/Hospital/index',
		'success_jump_url':'/HosMa/admin.php/Hospital/index',
		'ajax_upload_swf':'/HosMa/Public/js/vendor/uploadify/uploadify.swf',
		'ajax_upload_url':'/HosMa/admin.php/Hospital/ajaxUploadImage',
	};
</script>
		
	<script type="text/javascript" src="/HosMa/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/constants.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/admin/common.js"></script>
	</body>
</html>