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
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">   <!--面包屑导航-->
						<li class="">
							<i class="fa fa-fw fa-edit"></i>上传视频
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<form class="form-horizontal" id="xx-form-add">
				<div class="form-group">
					<label for="xx-input-community_hospitals_id" class="control-label col-sm-3">发布单位:</label>
					<div class="col-sm-5">
						<input id="xx-input-community_hospitals_id" class="form-control" type="text" name="community_hospitals_id" placeholder="请输入发布单位"/>
					</div>
					<div class="col-sm-4">
						<p class="xx-p-validate-result" attr-validate="community_hospitals_id"></p>
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-video_title" class="control-label col-sm-3">视频标题:</label>
					<div class="col-sm-5">
						<input id="xx-input-video_title" class="form-control" type="text" name="video_title" placeholder="请输入视频标题"/>
					</div>
					<div class="col-sm-4">
						<p class="xx-p-validate-result" attr-validate="video_title"></p>
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-video_introduction" class="control-label col-sm-3">视频简介:</label>
					<div class="col-sm-5">
						<input id="xx-input-video_introduction" class="form-control" type="text" name="video_introduction" placeholder="请输入视频简介"/>
					</div>
					<div class="col-sm-4">
						<p class="xx-p-validate-result" attr-validate="video_introduction"></p>
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-image" class="control-label col-sm-3">选择视频:</label>
					<div class="col-sm-5">
						<input type="file" id="xx-input-image"/>
						<!--展示缩略图-->
						<video src="" alt="" id="xx-img-show-thumb"  width="150px" style="display: none;"/>
						<!--封面图字段-->
						<input type="hidden" name="image_path" id="xx-input-image-path"/>
						<!--缩略图字段-->
						<input type="hidden" name="thumb_path" id="xx-input-thumb-path"/>
					</div>
				</div>
				<div class="form-group">
					<label for=""class="control-label col-sm-3">视频类型:</label>
					<div class="col-sm-5">
						<input type="radio" name="video_type_name" value="1" checked=""/>内科
						<input type="radio" name="video_type_name" value="0" />外科
					</div>
				</div>
				<div class="form-group">
					<label for="video_type_id<br />"class="control-label col-sm-3">状态:</label>
					<div class="col-sm-5">
						<input type="radio" name="status" value="1" checked=""/>开启
						<input type="radio" name="status" value="0"/>关闭
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
						<button type="button"  id="xx-btn-add-submit" class="btn btn-primary">提交</button>						
					</div>							
				</div>
				
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	var SCOPE = {
		'add_url':'/HosMa/admin.php/Video/add',
		'success_jump_url':'/HosMa/admin.php/Video/index',
		'ajax_upload_swf':'/HosMa/Public/js/vendor/uploadify/uploadify.swf',//图片地址
		'ajax_upload_url':'/HosMa/admin.php/Video/ajaxUploadImage',//图片上传控制器地址
	}
</script>
		
	<script type="text/javascript" src="/HosMa/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/constants.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/admin/common.js"></script>
	</body>
</html>