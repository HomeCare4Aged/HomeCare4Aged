<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>后台管理系统</title>
		<link rel="stylesheet" href="/jjyl/public/css/bootstrap.css" />
		<link rel="stylesheet" href="/jjyl/public/css/admin/login.css" />
	    
	</head>
	<body>
		<div class='container'>
			<h2><b style="color:#2FCA09;">居家养老管理系统</b></h2>
			<div id='zyn-login'>
				<form id="zyn-form-login">
					<div class="form-group">
						<div class="input-group">
							<div class='input-group-addon'>
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input class="form-control" type="text" name="admin_name" placeholder="请输入用户名" />
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class='input-group-addon'>
								<span class="glyphicon glyphicon-lock"></span>
							</div>
							<input class="form-control" type="password" name="admin_psw" placeholder="请输入密码" /><br/>
						</div>
					</div>
					<div class="form-group">
						<div class='col-sm-5' id='zyn-div-val-input'>
							<input class="form-control" type='text' name='admin_val' placeholder="请输入验证码" />
						</div>
						<div class="col-sm-7" id="zyn-div-val-img">
							<img src="/jjyl/admin.php/Login/verifyImg" />
							<a href="javascript:void(0)"><b>点击刷新</b></a>
						</div>
					</div>
				
				<button id="zyn-btn-login" type="button" class="btn btn-primary">登 录</button>
				</form>
			</div>
			
		</div>
		
		
		<script type="text/javascript" src="/jjyl/public/js/jquery.1.11.1.js" ></script>
		<script type="text/javascript" src="/jjyl/public/js/dialog/layer.js" ></script>
		<script type="text/javascript" src="/jjyl/public/js/dialog.js" ></script>
		<script type="text/javascript" src="/jjyl/public/js/admin/login.js" ></script>
		<script>
			var SCOPE = {
				'login_url':'/jjyl/admin.php/Login/check',
				'succes_jump_url':'/jjyl/admin.php/Index/index',
				'verify_url':"/jjyl/admin.php/Login/verifyImg" ,
			};
		</script>
	</body>
</html>