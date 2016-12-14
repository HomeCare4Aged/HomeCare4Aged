<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>WebChina后台管理系统</title>
		<link rel="stylesheet" href="/what/Public/css/bootstrap.css" />
		<link rel="stylesheet" href="/what/Public/css/sb-admin.css" />
		<link rel="stylesheet" href="/what/Public/css/font-awesome/font-awesome-css/css/font-awesome.css" />
		<link rel="stylesheet" href="/what/Public/css/admin/common.css" />
		<link rel="stylesheet" href="/what/Public/css/vendor/uploadify/uploadify.css" />
		<script type="text/javascript" src="/what/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/what/Public/js/bootstrap.js"></script>
		<script type="text/javascript" src="/what/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/what/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/what/Public/js/vendor/uploadify/jquery.uploadify.js"></script>
		<script type="text/javascript" src="/what/Public/js/vendor/kindeditor/kindeditor-all.js"></script>
	</head>

	<body>
		<!--</body>
</html>-->
<!--wrapper整个大背景色-->
<div id="wrapper">
	<!--<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
	</body>
</html>-->
<?php
 $nav_admin = session(C('ADMIN_SESSION')); $nav_role = D('Role')->find($nav_admin['admin_role_id']); $nav_role_menu_ids = $nav_role['role_menu_ids']; $nav_menus = D('Menu')->select($nav_role_menu_ids); $index = 'index'; ?>
<!--后台管理系统的导航栏-->
<!--navbar导航栏横过来，navbar-inverse,变黑，navbar-fixed-top固定在顶端-->
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-header">
		<a href="#" class="navbar-brand">WebChina后台管理系统</a>
	</div>
	<ul class="nav navbar-right top-left">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<!--fa快速加载-->
				<i class="fa fa-fw fa-user"></i>zhanyong<i class="caret"></i>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="#"><i class="fa fa-fw fa-user"></i>个人中心</a>
				</li>
				<!--divider叫横线-->
				<li class="divider"></li>
				<li>
					<!--<a href="127.0.0.1/what/admin.php/Login/loginOut">注销</a>-->
					<a href="/what/admin.php/Login/loginOut"><i class="fa fa-fw fa-power-off"></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<!--side-nav出现在左边-->
	<ul class="nav navbar-nav side-nav">
		<!--<li class="active">-->
		<li <?php echo (getMenuActiveStatus($index)); ?>>
			<!--<li>-->
			<a href="/what/admin.php/Index/index"><i class="fa fa-fw fa-home"></i>首页</a>
		</li>
		<!--<li>
			<a href="/what/admin.php/Menu/index"><i class="fa fa-fw fa-table"></i>菜单管理</a>
		</li>-->
		<?php if(is_array($nav_menus)): $i = 0; $__LIST__ = $nav_menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--使用模板显示高亮-->
			<li <?php echo (getMenuActiveStatus($vo["menu_controller"])); ?>>
				<!--<li>-->
				<a href="/what/admin.php/<?php echo ($vo["menu_controller"]); ?>/<?php echo ($vo["menu_action"]); ?>">
					<i class="fa fa-fw fa-cog"></i> <?php echo ($vo["menu_name"]); ?>
				</a>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</nav>
	<!--pagee-wrapper固定在中间的区域-->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li>
							<!--小图标-->
							<i class="fa fa-fw fa-table"></i>
							<a href="/what/admin.php/Article/index">文章管理</a>
						</li>
						<li class="active">
							<i class="fa fa-fw fa-edit"></i> 添加文章
						</li>
					</ol>
				</div>
			</div>
			<!--.row面包屑导航-->
			<div class="row">
				<div class="col-sm-10">
					<form id="zh-form-article-add" class="form-horizontal">
						<div class="form-group">
							<!--form-group表单组-->
							<label for="zh-input-title" class="control-label col-sm-3">标题：</label>
							<!--menu-name属性值必须与数据库的字段一致-->
							<div class="col-sm-5">
								<input id="zh-input-title" class="form-control " type="text" name="title" placeholder="请输入标题" />
							</div>
							<div class="col-sm-4">
								<p class="zh-p-validate-result" attr-validate="title"></p>
							</div>
						</div>
						<div class="form-group">
							<!--form-group表单组-->
							<label for="zh-input-small-title" class="control-label col-sm-3">副标题：</label>
							<!--menu-name属性值必须与数据库的字段一致-->
							<div class="col-sm-5">
								<input id="zh-input-small-title" class="form-control " type="text" name="small_title" placeholder="请输入副标题" />
							</div>
							<div class="col-sm-4">
								<p class="zh-p-validate-result" attr-validate="small_title"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="zh-input-image" class="control-label col-sm-3">封面图：</label>
							<div class="col-sm-5">
								<input type="file" id="zh-input-uploader" />
								<!--展示缩略图-->
								<img src="" alt="" id="zh-img-show-thumb" width="150px" style="display: none;" />
								<!--封面图的字段-->
								<input type="hidden" name="image_path" id="zh-input-image-path" />
								<!--缩略图字段-->
								<input type="hidden" name="thumb_path" id="zh-input-thumb-path" />
							</div>
						</div>
						<div class="form-group">
							<label for="zh-textarea-content" class="control-label col-sm-3">内容：</label>
							<div class="col-sm-5">
								<textarea class="js-editor" id="zh-texteare-content" name="content" rows="20"></textarea>
							</div>
							<!--<div class="col-sm-4">
								<p class="zh-p-validate-result" attr-validate="content"></p>
							</div>-->
						</div>

						<div class="form-group">
							<!--form-group表单组-->
							<label for="zh-input-keywords" class="control-label col-sm-3">关键词：</label>
							<!--menu-name属性值必须与数据库的字段一致-->
							<div class="col-sm-5">
								<input id="zh-input-keywords" class="form-control " type="text" name="keywords" placeholder="请输入关键词" />
							</div>
							<div class="col-sm-4">
								<p class="zh-p-validate-result" attr-validate="keywords"></p>
							</div>
						</div>
						<div class="form-group">
							<!--form-group表单组-->
							<label for="zh-input-description" class="control-label col-sm-3">描述：</label>
							<!--menu-name属性值必须与数据库的字段一致-->
							<div class="col-sm-5">
								<input id="zh-input-description" class="form-control " type="text" name="description" placeholder="请输入描述" />
							</div>
							<div class="col-sm-4">
								<p class="zh-p-validate-result" attr-validate="description"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-4 control-label">状态：</label>
							<div class="col-sm-5">
								<!--后端用1前端用0-->
								<input type="radio" name="status" value="1" checked/>开启
								<input type="radio" name="status" value="0" />关闭
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-lg-offset-5">
								<button type="button" id="zh-button-article-add-submit" class="btn btn-primary">提交</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!--.row表单-->
		</div>
	</div>
</div>
<script>
	var SCOPE = {
		'add_url': '/what/admin.php/Article/articleAdd',
		//				'success_jump_url':'/what/admin.php/Index/index',
		//可以简化成下面
		'success_jump_url': '/what/admin.php/Article/index',
		'ajax_upload_swf': '/what/Public/js/vendor/uploadify/uploadify.swf',
		'ajax_upload_url': '/what/admin.php/Article/ajaxUploadImage',
	};
</script>
<!--<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>-->
<script type="text/javascript" src="/what/Public/js/Constants.js"></script>
<script type="text/javascript" src="/what/Public/js/admin/common.js"></script>
</body>

</html>