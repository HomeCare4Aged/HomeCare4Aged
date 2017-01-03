<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>社区医院后台管理系统</title>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/admin/login.css" />
	</head>

	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4" id="xx-div-login-panel">
					<h3>登录</h3>
					<!--社区医院信息登录页面-->
					<form id="xx-form-login" name="form">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon ">医院编号</span>
								</div>
								<input type="text" class="form-control" name="community_hospital_numbers" placeholder="请输入医院编号" />
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon ">员工工号</span>
								</div>
								<input type="text" class="form-control" name="hospital_user_no" placeholder="请输入员工工号" />
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon ">登录密码</span>
								</div>
								<input type="password" class="form-control" name="hospital_user_psw" placeholder="请输入登录密码" />
							</div>
						</div>
						<!--验证码-->
						<!--<div class="form-group">-->
							<!--<div class="col-sm-7" id="xx-div-val-input">-->
								<!--<input class="form-control" type="text" name="admin_verify" placeholder="请输入验证码" />-->
							<!--</div>-->
							<!--<div class="col-sm-5" id="xx-div-val-img">-->
								<!--<img src="/HosMa9/admin.php/Login/veriyfyImg" />-->
								<!--javascript:void(0)只有超链接样式，没有跳转-->
								<!--<a href="javascript:void(0)">点击刷新</a>-->
							<!--</div>-->
						<!--</div>-->
						<div class="form-group ">
							<div class="col-sm-4 col-sm-offset-4">
								<br>
								<button type="button" class="btn btn-primary" id="xx-btn-login">登录</button>
							</div>
							<!--onclick="window.location.href='../Index/index.html'"直接跳转-->
						</div>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="/HosMa9/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/admin/login.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/loginDialog.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/admin/login.js" ></script>
		<!--写地址用于json路径跳转-->
		<script>
			var SCOPE = {
				'login_url': '/HosMa9/admin.php/Login/check',
				'success_jump_url': '/HosMa9/admin.php/Index/index',
				'verify_url': '/HosMa9/admin.php/Login/veriyfyImg',
			};
		</script>
	</body>

</html>