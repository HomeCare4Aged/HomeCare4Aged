<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>社区医院管理系统</title>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/vendor/metisMenu/metisMenu.min.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/sb-admin-2.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/vendor/font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="/HosMa9/Public/css/admin/common.css" />
		<link rel="stylesheet" href="/HosMa9/Public/css/vendor/uploadify/uploadify.css" />
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/daterangepicker-bs3.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/dataTable/jquery.dataTables.min.css" />
		<!--挂号-->
		<link rel="stylesheet" href="/HosMa9/Public/css/admin/hang.css" />
		<!--输液-->
		<link rel="stylesheet" href="/HosMa9/Public/css/admin/infusion.css" />
		<script type="text/javascript" src="/HosMa9/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/bootstrap.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/vendor/uploadify/jquery.uploadify.js" ></script>
		<script type="text/javascript" src="/HosMa9/Public/js/vendor/kindeditor/kindeditor-all.js" ></script>		
		<!--挂号-->
		<script type="text/javascript" src="/HosMa9/Public/js/admin/hang.js" ></script>
		<!--输液-->
		<script type="text/javascript" src="/HosMa9/Public/js/admin/infusion.js" ></script>
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
						<a href="/HosMa9/admin.php/Login/loginOut"><i class="fa fa-fw fa-power-off"></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a href="/HosMa9/admin.php/Index/index.html"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>信息录入<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa9/admin.php/Hospital/index.html">医院信息</a>
		                </li>
		                <li>
		                    <a href="/HosMa9/admin.php/Department/index.html">科室信息</a>
		                </li>
		                <li>
		                	<a href="/HosMa9/admin.php/Doctor/index.html">医生信息</a>
		                </li>
		                <li>
		                	<a href="/HosMa9/admin.php/User/index.html">员工信息</a>
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
		                    <a href="/HosMa9/admin.php/Schedule/index.html">排班信息录入</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>挂号单<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa9/admin.php/Register/hang.html">挂号信息显示</a>
		                </li>
		                <li>
		                    <a href="/HosMa9/admin.php/Register/infusion.html">输液信息显示</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>公告栏<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa9/admin.php/Noticle/index.html">公告审核</a>
		                </li>
		                <!--<li>-->
		                    <!--<a href="/HosMa9/admin.php/Noticle/add.html">公告发布</a>-->
		                <!--</li>-->
		                <li>
		                    <a href="/HosMa9/admin.php/Noticle/review.html">公告管理</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="/HosMa9/admin.php/Account/index.html">
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
							<i class="fa fa-fw fa-edit"></i> 科室信息
						</li>

					</ol>
				</div>
			</div>
			<!--.row面包屑导航   -->
			<div class="row xx-div-search">
				<div class="col-md-6">
					<form action="/HosMa9/admin.php/Department/index" method="get" class="form-horizontal" id="xx-form-add-keshi">
						<div class="input-group">
							<span class="input-group-addon">科室编号</span>
							<select class="form-control" name="hospital_office_name">
								<?php if(is_array($offices)): $i = 0; $__LIST__ = $offices;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><option name="hospital_office_name"><div type="hidden" name="id" value="<?php echo ($voo["hospital_office_id"]); ?>" ></div><?php echo ($voo["hospital_office_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
							<span class="input-group-btn">
								<button type="button" class="btn btn-primary" id="xx-btn-add-keshi">
									<span class="">添加</span>
								</button>
							</span>
						</div>
					</form>
				</div>
				<!--<div class="col-sm-2">
					<button type="button" class="btn btn-primary" id="xx-btn-add">新增</button>
				</div>-->
				<!-- 按钮触发模态框 -->
				<div class="col-sm-2">
					<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
						 新增科室
					</button>
				</div>
			</div>
			<!--row.结束-->
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<form id="xx-form-list" class="">
							<table class="table table-bordered table-hover" id="xx-table-list">
								<thead>
									<tr>
										<td>科室内码</td>
										<td>科室名称</td>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($useroffices)): $i = 0; $__LIST__ = $useroffices;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<td><?php echo ($vo["hospital_office_id"]); ?></td>
											<td><?php echo ($vo["hospital_office_name"]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
			<!--row-->
		</div>
	</div>
</div>
<!--弹出框-->
<div class="col-sm-10">
	<!-- 模态框（Modal） -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;
									</button>
					<h4 class="modal-title" id="myModalLabel">
										新增科室信息
									</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1d">
							<form id="xx-form-add" class="form-horizontal">
								<div class="form-group">
									<label for="xx-input-hospital-office-name" class="control-label col-sm-3">科室名称：</label>
									<div class="col-sm-5">
										<input id="xx-input-hospital-office-name" class="form-control" type="text" name="hospital_office_name" placeholder="请输入科室名称" />
									</div>
									<div class="col-sm-4">
										<p class="xx-p-validate-result" attr-validate="hospital_office_name"></p>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!--.row表单-->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						关闭
					</button>
					<button type="button" class="btn btn-primary" id="xx-btn-add-submit">
						提交更改
					</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal -->
	</div>
</div>
<script>
	var SCOPE = {
		'add_url': '/HosMa9/admin.php/Department/add',
		'save_url':'/HosMa9/admin.php/Department/save',
		'success_jump_url':'/HosMa9/admin.php/Department/index',
	};
	$('#xx-btn-add-keshi').click(function(){
		var formData = $('#xx-form-add-keshi').serializeArray();
		var postData = {};
		$(formData).each(function(i){
			postData[this.name] = this.value;
		});
		console.log(postData);
		$.ajax({
			type:"post",
			url:SCOPE.save_url,
			data: postData,
		    dataType: 'json',
		    success: function(result) {
		    	if(result = SUCCESS){
		    		return Dialog.success(result.msg,'');
		    	}
		    	return Dialog.error(result.msg);
		    }
		});
	});
</script>
	<script type="text/javascript" src="/HosMa9/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/constants.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/admin/common.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/moment.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/daterangepicker.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/dataTable/jquery.dataTables.min.js"></script>
	</body>
</html>