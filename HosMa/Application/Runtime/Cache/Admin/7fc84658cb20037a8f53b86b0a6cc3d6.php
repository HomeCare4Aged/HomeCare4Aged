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
			<h3>医生信息录入</h3>
			<div class="row">
				<div class="col-sm-10">
					<form id="xx-form-add" class="form-horizontal">
						<div class="form-group">
							<label for="xx-input-hospital-doctor-name" class="control-label col-sm-3">医生姓名：</label>
							<div class="col-sm-5">
								<input id="xx-input-hospital-doctor-name" class="form-control" type="text" 
								name="hospital_doctor_name" placeholder="请输入医生姓名" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="hospital_doctor_name"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-hospital-doctor-identity" class="control-label col-sm-3">医生职称：</label>
							<div class="col-sm-5">
								<input id="xx-input-hospital-doctor-identity" class="form-control" type="text" 
								name="hospital_doctor_identity" placeholder="请输入医生职称" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="hospital_doctor_identity"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-hospital-doctor-introduction" class="control-label col-sm-3">医生简介：</label>
							<div class="col-sm-5">
								<textarea class="js-editor" id="xx-textarea-hospital-doctor-introduction" name="hospital_doctor_introduction" cols="50" rows="5" placeholder="请输入内容"></textarea>
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="hospital_doctor_introduction"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-hospital-doctor-phone" class="control-label col-sm-3">联系方式：</label>
							<div class="col-sm-5">
								<input id="xx-input-hospital-doctor-phone" class="form-control" type="text" 
								name="hospital_doctor_phone" placeholder="请输入联系方式" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="hospital_doctor_phone"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-image" class="control-label col-sm-3">医生照片：</label>
							<div class="col-sm-5">
								<input id="xx-input-uploader" type="file" />
								<!-- 展示缩略图 -->
								<img src="" alt="" id="xx-img-show-thumb" width="150px" style="display: none;"/>
								<!-- 封面图字段 -->
								<input type="hidden" name="image_path" id="xx-input-image-path"/>
								<!-- 缩略图图字段 -->
								<input type="hidden" name="thumb_path" id="xx-input-thumb-path"/>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-doctor-registration-number" class="control-label col-sm-3">号池数量：</label>
							<div class="col-sm-5">
								<input id="xx-input-doctor-registration-number" class="form-control" type="text" 
								name="doctor_registration_number" placeholder="请输入号池数量" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="doctor_registration_number"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="xx-input-registration-predict-money" class="control-label col-sm-3">挂号费用：</label>
							<div class="col-sm-5">
								<input id="xx-input-registration-predict-money" class="form-control" type="text" 
								name="registration_predict_money" placeholder="请输入挂号费用" />
							</div>
							<div class="col-sm-4">
								<p class="xx-p-validate-result" attr-validate="registration_predict_money"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-sm-3">性别：</label>
							<div class="col-sm-5">
								<input type="radio" name="hospital_doctor_sex" value="1" checked="" />男
								<input type="radio" name="hospital_doctor_sex" value="0" />女
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-sm-3">状态：</label>
							<div class="col-sm-5">
								<input type="radio" name="status" value="1" checked="" />开启
								<input type="radio" name="status" value="0" />关闭
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
		'add_url':'/HosMa/admin.php/Doctor/add',
		'success_jump_url':'/HosMa/admin.php/Doctor/index',
		'ajax_upload_swf':'/HosMa/Public/js/vendor/uploadify/uploadify.swf',
		'ajax_upload_url':'/HosMa/admin.php/Doctor/ajaxUploadImage',
	};
</script>
		
	<script type="text/javascript" src="/HosMa/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/constants.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/admin/common.js"></script>
	</body>
</html>