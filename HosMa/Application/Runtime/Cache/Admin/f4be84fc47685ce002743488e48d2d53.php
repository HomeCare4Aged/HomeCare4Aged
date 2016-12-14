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
			<h3>医生信息</h3>
			<h4>怎么办</h4>
			<div class="row">
				<form class="form-horizontal" id="">
				<div class="form-group">
					<label id="" class="control-label col-sm-3">在班医生信息：</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="" placeholder="请录入"/>
					</div>
					<div class="col-sm-2">
						<button  type="button" class="btn btn-primary" id="xx-btn-add">新增</button>
					</div>
				</div>
				</form>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<form id="xx-form-list" class="">
							<table class="table table-bordered table-hover" id="xx-table-list">
								<thead>
									<tr>
										<td>医生ID</td>
										<td>所属医院</td>
										<td>所属科室</td>
										<td>医生姓名</td>
										<td>性别</td>
										<td>职称</td>
										<td>简介</td>
										<td>联系方式</td>
										<td>照片</td>
										<td>号池数量</td>
										<td>挂号收费</td>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($doctors)): $i = 0; $__LIST__ = $doctors;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<td><?php echo ($vo["hospital_doctor_id"]); ?></td>
											<td><?php echo ($vo["community_hospitals_id"]); ?></td>
											<td><?php echo ($vo["hospital_office_id"]); ?></td>
											<td><?php echo ($vo["hospital_doctor_name"]); ?></td>
											<td><?php echo ($vo["hospital_doctor_identity"]); ?></td>
											<td><?php echo ($vo["hospital_doctor_introduction"]); ?></td>
											<td><?php echo ($vo["hospital_doctor_phone"]); ?></td>
											<td><?php echo ($vo["hospital_doctor_picture"]); ?></td>
											<td><?php echo ($vo["doctor_registration_number"]); ?></td>
											<td><?php echo ($vo["registration_predict_money"]); ?></td>
											<td><?php echo ($vo["hospital_doctor_sex"]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
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
		var SCOPE = {
			'add_url':'/HosMa/admin.php/Doctor/add'
		};
	</script>
		
	<script type="text/javascript" src="/HosMa/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/constants.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/admin/common.js"></script>
	</body>
</html>