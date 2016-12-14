<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>社区医院后台管理</title>
		<link rel="stylesheet" type="text/css" href="/HosMa/Public/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa/Public/css/admin/login.css"/>
		<script type="text/javascript" src="/HosMa/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/HosMa/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/HosMa/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/HosMa/Public/js/admin/login.js"></script>
	</head>
	<body>
		<!--<script>
			login.success('登录成功','http://www.baidu.com');
			login.error('登录失败','url');
		</script>-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4" id="xx-div-login-panel" >
					<h3>登录</h3>
					<!--社区医院信息登录页面-->
					<form id="zh-form-login" name="form" >
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</div>
								<input type="text" class="form-control" name="hospital_account_num" placeholder="请输入注册账号" />
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-lock"></span>
								</div>
								<input type="password" class="form-control" name="hospital_account_password" placeholder="请输入密码"/>
							</div>
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-primary" id="xx-btn-login" onclick="window.location.href='../Index/index.html'">登录</button>
							<!--<input type="button" name="login" class="btn btn-primary" value="登录" href="../Index/index.html"/>-->
							<!--<a href="http://127.0.0.1/loginRegister/adminDoctor.php/Login/register">注册</a>-->
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--写地址用于json路径跳转-->
		<script>
			var SCOPE = {
				'login_url' : '/HosMa/adminDoctor.php/Login/check',
			};
		</script>
	</body>
</html>