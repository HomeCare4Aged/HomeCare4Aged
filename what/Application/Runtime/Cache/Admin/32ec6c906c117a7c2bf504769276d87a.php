<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>WebChina后台管理系统</title>
		<link rel="stylesheet" href="/what/Public/css/bootstrap.css" />
		<link rel="stylesheet" href="/what/Public/css/admin/login.css" />
	</head>

	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4" id="zh-div-login-panel">
					<h3>登录</h3>
					<form id="zh-form-login" class="form-horizontal">
						<!--form-group是列表的一行-->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</div>
								<input class="form-control" type="text" name="admin_name" placeholder="请输入用户名" />
							</div>

						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-lock"></span>
								</div>
								<input class="form-control" type="password" name="admin_pws" placeholder="请输入用户密码" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-7" id="zh-div-val-input">
								<input class="form-control" type="text" name="admin_val" placeholder="验证码" />
							</div>
							<div class="col-sm-5" id="zh-div-val-img">
								<img src="/what/admin.php/Login/veriyfyImg" />
								<!--javascript:void(0)只有超链接样式，没有跳转-->
								<a href="javascript:void(0)">点击刷新</a>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-4">
								<button type="button" class="btn btn-primary" id="zh-button-login">
									登录
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--<?php echo "haha";?>-->
		<!--<div class="container">
			<h3>登录</h3>
			<form id="zh-form-login">
				form-control给一些基本的样式
				<input type="text" class="form-control" name="admin_name" placeholder="请输入账号名"/>
				<input type="password" class="form-control" name="admin_pws" placeholder="请输入密码" />
				<button type="button" class="btn btn-primary" id="zh-button-login">登录</button>
				<a href="/what/admin.php/Login/index">/what/admin.php/Login/index</a>
				<a href="/what/admin.php/Login/index">/what/admin.php/Login/index</a>
			</form>
		</div>-->
		<!--/what可以在入口文件定义，之后就不用重复编写-->
		<!--<script type="text/javascript" src="/what/Public/js/dialog/layer.js" ></script>-->
		<script type="text/javascript" src="/what/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/what/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/what/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/what/Public/js/admin/login.js"></script>
		<!--<script>
			Dialog.success('登录成功','http://www.baidu.com');
			Dialog.error('用户名不能为空');
		</script>-->
		<!--创建一个当前页面可见的全局变量-->
		<script>
			var SCOPE = {
				'login_url': '/what/admin.php/Login/check',
				'success_jump_url': '/what/admin.php/Index/index',
				'verify_url': '/what/admin.php/Login/veriyfyImg',
			};
		</script>
	</body>

</html>