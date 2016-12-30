<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>社区医院管理系统</title>
		<link rel="stylesheet" type="text/css" href="/HosMa/Public/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa/Public/css/vendor/metisMenu/metisMenu.min.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa/Public/css/sb-admin-2.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa/Public/css/vendor/font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="/HosMa/Public/css/admin/common.css" />
		<link rel="stylesheet" href="/HosMa/Public/css/vendor/uploadify/uploadify.css" />
		<link rel="stylesheet" type="text/css" href="/HosMa/Public/css/daterangepicker-bs3.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa/Public/css/dataTable/jquery.dataTables.min.css" />
		
		<script type="text/javascript" src="/HosMa/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/HosMa/Public/js/bootstrap.js"></script>
		<script type="text/javascript" src="/HosMa/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/HosMa/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/HosMa/Public/js/vendor/uploadify/jquery.uploadify.js" ></script>
		<script type="text/javascript" src="/HosMa/Public/js/vendor/kindeditor/kindeditor-all.js" ></script>		
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
						<a href="/HosMa/admin.php/Login/loginOut"><i class="fa fa-fw fa-power-off"></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a href="/HosMa/admin.php/Index/index.html"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>信息录入<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa/admin.php/Hospital/index.html">医院信息</a>
		                </li>
		                <li>
		                    <a href="/HosMa/admin.php/Department/index.html">科室信息</a>
		                </li>
		                <li>
		                	<a href="/HosMa/admin.php/Doctor/index.html">医生信息</a>
		                </li>
		                <li>
		                	<a href="/HosMa/admin.php/User/index.html">员工信息</a>
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
		                    <a href="/HosMa/admin.php/Schedule/index.html">排班信息录入</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>挂号单<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa/admin.php/Register/index.html">号池信息录入</a>
		                </li>
		                <li>
		                    <a href="/HosMa/admin.php/Register/info.html">挂号信息显示</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>公告栏<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa/admin.php/Noticle/index.html">公告审核</a>
		                </li>
		                <!--<li>-->
		                    <!--<a href="/HosMa/admin.php/Noticle/add.html">公告发布</a>-->
		                <!--</li>-->
		                <li>
		                    <a href="/HosMa/admin.php/Noticle/review.html">公告管理</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
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
							<i class="fa fa-fw fa-edit"></i> 员工信息
						</li>

					</ol>
				</div>
			</div>
			<!--.row面包屑导航   -->
			<div class="row xx-div-search">
				<!--<div class="col-sm-2">
					<button  type="button" class="btn btn-primary" id="xx-btn-add">新增</button>
				</div>-->
				<!-- 按钮触发模态框 -->
				<div class="col-sm-2">
					<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					 新增员工
				</button>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<form id="xx-form-list" class="">
							<table class="table table-bordered table-hover" id="xx-table-list">
								<thead>
									<tr>
										<td style="display: none;"></td>
										<td>员工姓名</td>
										<td>员工工号</td>
										<td colspan="3">操作</td>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<td style="display: none;"><?php echo ($vo["hospital_user_id"]); ?></td>
											<td><?php echo ($vo["hospital_user_name"]); ?></td>
											<td><?php echo ($vo["hospital_user_no"]); ?></td>
											<td>
												<span class="glyphicon glyphicon-gift" data-toggle="modal" data-target="#xx-modal-assign"  attr-id="<?php echo ($vo["hospital_user_id"]); ?>" onclick="assign11(this)">分配权限</span>
											</td>
											<!--<td>
												<span class="glyphicon glyphicon-edit" id="xx-span-edit" attr-id="<?php echo ($vo["hospital_office_id"]); ?>">编辑</span>
											</td>-->
											<td>
												<span class="glyphicon glyphicon-trash" id="xx-span-delete" attr-id="<?php echo ($vo["hospital_office_id"]); ?>">删除</span>
											</td><?php endforeach; endif; else: echo "" ;endif; ?>
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
										新增员工信息
									</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<form id="xx-form-add" class="form-horizontal">
								<div class="form-group">
									<label for="xx-input-hospital-user-name" class="control-label col-sm-3">员工姓名：</label>
									<div class="col-sm-5">
										<input id="xx-input-hospital-user-name" class="form-control" type="text" name="hospital_user_name" placeholder="请输入员工姓名" />
									</div>
									<div class="col-sm-4">
										<p class="xx-p-validate-result" attr-validate="hospital_user_name"></p>
									</div>
								</div>
								<div class="form-group">
									<label for="xx-input-hospital-user-no" class="control-label col-sm-3">员工工号：</label>
									<div class="col-sm-5">
										<input id="xx-input-hospital-user-no" class="form-control" type="text" name="hospital_user_no" placeholder="请输入员工工号" />
									</div>
									<div class="col-sm-4">
										<p class="xx-p-validate-result" attr-validate="hospital_user_no"></p>
									</div>
								</div>
								<div class="form-group">
									<label for="xx-input-hospital-user-phone" class="control-label col-sm-3">联系方式：</label>
									<div class="col-sm-5">
										<input id="xx-input-hospital-user-phone" class="form-control" type="text" name="hospital_user_phone" placeholder="请输入联系方式" />
									</div>
									<div class="col-sm-4">
										<p class="xx-p-validate-result" attr-validate="hospital_user_phone"></p>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="control-label col-sm-3">性别：</label>
									<div class="col-sm-5">
										<input type="radio" name="hospital_doctor_sex" value="1" checked="" />男
										<input type="radio" name="hospital_doctor_sex" value="0" />女
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
<div class="col-sm-10">
	<!-- 模态框（Modal） -->
	<div class="modal fade" id="xx-modal-assign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;
									</button>
					<h4 class="modal-title" id="myModalLabel">
										分配权限
									</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<form id="xx-form-assign-auth" class="form-inline">
								<?php if(is_array($menus)): $k = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="checkbox-inline">
										<label>
											<input type="checkbox"  value="<?php echo ($vo["menu_id"]); ?>" name="menu_id[<?php echo ($k); ?>]" <?php if(in_array($vo['menu_id'],$role_menu_ids) == 1): ?>checked<?php endif; ?>/>
											<?php echo ($vo["hospital_menu_name"]); ?>
										</label>
									</div><?php endforeach; endif; else: echo "" ;endif; ?>
								<input name="hospital_user_id" type="text" value="" id="user-id-quanxian"/>
							</form>
						</div>
					</div><!--.row表单-->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
										关闭
									</button>
					<button type="button" class="btn btn-primary" id="xx-btn-assign-auth1">
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
		'add_url': '/HosMa/admin.php/User/add',
		'success_jump_url':'/HosMa/admin.php/User/index',
		'assign_auth_url':'/HosMa/admin.php/User/assignAuth',
	};
	function assign11(obj){
		var id = $(obj).attr('attr-id');
		var objpp = obj.parentNode.parentNode;
		var msg = {};
		var postData = {};
		for (var i=0 ; i<objpp.children.length;i++){
//				console.log(objpp.children[i].innerText)
				msg[i] = objpp.children[i].innerText;
			}
		postData['id'] = id;
		$('#user-id-quanxian').val(id);
		console.log($('#user-id-quanxian').val(id));
	}
</script>

	<script type="text/javascript" src="/HosMa/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/constants.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/admin/common.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/moment.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/daterangepicker.js"></script>
	<script type="text/javascript" src="/HosMa/Public/js/dataTable/jquery.dataTables.min.js"></script>
	</body>
</html>