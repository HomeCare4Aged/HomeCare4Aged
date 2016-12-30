<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>社区医院管理系统</title>
		<link rel="stylesheet" type="text/css" href="/hosma/Public/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/hosma/Public/css/vendor/metisMenu/metisMenu.min.css"/>
		<link rel="stylesheet" type="text/css" href="/hosma/Public/css/sb-admin-2.css"/>
		<link rel="stylesheet" type="text/css" href="/hosma/Public/css/vendor/font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="/hosma/Public/css/admin/common.css" />
		<link rel="stylesheet" href="/hosma/Public/css/vendor/uploadify/uploadify.css" />
		<link rel="stylesheet" type="text/css" href="/hosma/Public/css/daterangepicker-bs3.css"/>
		<link rel="stylesheet" type="text/css" href="/hosma/Public/css/dataTable/jquery.dataTables.min.css" />
		
		<script type="text/javascript" src="/hosma/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/hosma/Public/js/bootstrap.js"></script>
		<script type="text/javascript" src="/hosma/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/hosma/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/hosma/Public/js/vendor/uploadify/jquery.uploadify.js" ></script>
		<script type="text/javascript" src="/hosma/Public/js/vendor/kindeditor/kindeditor-all.js" ></script>		
	</head>
	<body>


<!--webChina内容管理平台-->
		<!--< a href=" ">退出登录</ a>-->
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
						<a href="/hosma/admin.php/Login/loginOut"><i class="fa fa-fw fa-power-off"></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a href="/hosma/admin.php/Index/index.html"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>信息录入<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/hosma/admin.php/Hospital/index.html">医院信息</a>
		                </li>
		                <li>
		                    <a href="/hosma/admin.php/Department/index.html">科室信息</a>
		                </li>
		                <li>
		                	<a href="/hosma/admin.php/Doctor/index.html">医生信息</a>
		                </li>
		                <li>
		                	<a href="/hosma/admin.php/User/index.html">员工信息</a>
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
		                    <a href="/hosma/admin.php/Schedule/index.html">排班信息录入</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>挂号单<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/hosma/admin.php/Register/index.html">号池信息录入</a>
		                </li>
		                <li>
		                    <a href="/hosma/admin.php/Register/info.html">挂号信息显示</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>公告栏<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/hosma/admin.php/Noticle/index.html">公告审核</a>
		                </li>
		                <!--<li>-->
		                    <!--<a href="/hosma/admin.php/Noticle/add.html">公告发布</a>-->
		                <!--</li>-->
		                <li>
		                    <a href="/hosma/admin.php/Noticle/review.html">公告管理</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>视频栏<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/hosma/admin.php/Video/index.html">视频信息预览</a>
		                </li>
		                <li>
		                    <a href="/hosma/admin.php/Video/add.html">视频发布</a>
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
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-fw fa-table"></i>
							<a href="/hosma/admin.php/Noticle/review">公告管理</a>	
						</li>
						<li class="active">
							<i class="fa fa-fw fa-television"></i>公告详情						
						</li>
						<li class="active">
							<i class="fa fa-fw fa-edit"></i>公告编辑
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10">
					<form id="xx-form-add" class="form-horizontal">
					<div class="form-group">
					<label for="xx-input-announcement_title" class="control-label col-sm-3">公告标题:</label>	
					<div class="col-sm-5">
						<input id="xx-input-announcement_title" class="form-control" type="text" name="announcement_title" placeholder="请输入公告标题" value="<?php echo ($announcement["announcement_title"]); ?>"/>
					</div>
					<div class="col-sm-4">
						<p class="xx-p-validate-result" attr-validate="announcement_title"></p>
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-announcement_type_id" class="control-label col-sm-3">公告类型:</label>
					<div class="col-sm-5">
						<select class="form-control" name="announcement_type_id" id="xx-input-announcement_type_id">
							<?php if(is_array($announcement_type)): $i = 0; $__LIST__ = $announcement_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo["announcement_type_id"]); ?>" <?php if($vo[announcement_type_name] == $announcement[announcement_type_name]): ?>selected<?php endif; ?>><?php echo ($vo["announcement_type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-announcement_sender_id" class="control-label col-sm-3">发布用户:</label>
				<div class="col-sm-5">
					<p id="xx-input-announcement_sender_id" class="form-control" name="announcement_sender_id"/><?php echo ($nav_admin["hospital_user_name"]); ?></p>
				</div>				
				</div>
				<div class="form-group">
					<label for="xx-input-announcement_hospital_id" class="control-label col-sm-3">所属医院:</label>
					<div class="col-sm-5">
						<p id="xx-input-announcement_hospital_id" class="form-control" name="announcement_hospital_id"/><?php echo ($nav_hospital[0]["community_hospitals_name"]); ?></p>	
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-announcement_content" class="control-label col-sm-3">公告内容:</label>
					<div class="col-sm-5">
						<textarea id="xx-input-announcement_content" class="form-control"  name="announcement_content" placeholder="请输入公告内容" style="height: 200px;"/><?php echo ($announcement["announcement_content"]); ?></textarea>
					</div>
					<div class="col-sm-4">
						<p class="xx-p-validate-result" attr-validate="announcement_content"></p>
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-announcement_picture" class="control-label col-sm-3">公告图片:</label>
					<div class="col-sm-5">
						<input type="file" id="xx-input-img-uploader"/>
						<!--展示缩略图-->
						<img src="<?php echo ($announcement["announcement_picture"]); ?>" alt="" id="xx-img-show-thumb"  width="150px"/>
						<!--封面图字段-->
						<input type="hidden" name="image_path" id="xx-input-image-path"/>
						<!--缩略图字段-->
						<input type="hidden" name="announcement_picture" id="xx-input-thumb-path"/>
					</div>
				</div>
				<div class="form-group">
				<label for="xx-input-announcement_end_date" class="control-label col-sm-3">公告撤销时间:</label>
					<div class="col-sm-5">
						<!--<input id="xx-input-announcement_end_date" class="form-control" type="text" name="announcement_end_date" placeholder="请输入公告撤销时间"/>-->
						<div class="controls">
                     <div class="input-prepend input-group">
                       <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span><input type="text" readonly style="width: 200px" name="announcement_end_date" id="xx-input-announcement_end_date" class="form-control" value="<?php echo ($announcement["announcement_end_date"]); ?>" /> 
                     </div>
                    </div>
					</div>
					<div class="col-sm-4">
						<p class="xx-p-validate-result" attr-validate="announcement_end_date"></p>
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-announcement_check_state" class="control-label col-sm-3">审核状态:</label>
					<div class="col-sm-5">
						<p id="xx-input-announcement_check_state" class="form-control" name="announcement_check_state"/><?php echo ($announcement["announcement_check_state"]); ?></p>	
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-announcement_check_id" class="control-label col-sm-3">审核人:</label>
					<div class="col-sm-5">
						<p id="xx-input-announcement_check_id" class="form-control" name="announcement_check_id"/><?php echo ($announcement["hospital_user_name"]); ?></p>	
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-error_message" class="control-label col-sm-3">反馈信息:</label>
					<div class="col-sm-5">
						<p id="xx-input-error_message" class="form-control" name="error_message"/><?php echo ($announcement["error_message"]); ?></p>
					</div>
				</div>
						<div class="row">
							<div class="col-sm-7 col-lg-offset-5">
								<button type="button"  id="xx-btn-add-submit" class="btn btn-primary">更新</button>						
							</div>							
						</div>
						<input type="hidden" value="<?php echo ($announcement["announcement_id"]); ?>" name="announcement_id" />
						<input type="hidden" value="<?php echo ($announcement["announcement_check_state"]); ?>" name="announcement_check_state" />
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var SCOPE = {
		'add_url':'/hosma/admin.php/Noticle/add',
		'success_jump_url':'/hosma/admin.php/Noticle/review',
		'ajax_upload_swf':'/hosma/Public/js/vendor/uploadify/uploadify.swf',//图片地址
		'ajax_upload_url':'/hosma/admin.php/Noticle/ajaxUploadImage',//图片上传控制器地址
	};
</script>
	<script type="text/javascript" src="/hosma/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/hosma/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/hosma/Public/js/constants.js"></script>
	<script type="text/javascript" src="/hosma/Public/js/admin/common.js"></script>
	<script type="text/javascript" src="/hosma/Public/js/moment.js"></script>
	<script type="text/javascript" src="/hosma/Public/js/daterangepicker.js"></script>
	<script type="text/javascript" src="/hosma/Public/js/dataTable/jquery.dataTables.min.js"></script>
	</body>
</html>