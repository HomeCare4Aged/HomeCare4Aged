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
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-fw fa-table"></i>
							<a href="/hosma/admin.php/Noticle/index">公告审核</a>	
						</li>
						<li class="active">
							<i class="fa fa-fw fa-television"></i>审核详情
						</li>
						
					</ol>
				</div>				
			</div><!--.row面包屑导航   -->
			<div class="row">
				<div class="col-sm-10">
					<form id="xx-form-add" class="form-horizontal">
					<div class="form-group">
					<label for="xx-input-announcement_title" class="control-label col-sm-3">公告标题:</label>	
					<div class="col-sm-5">
						<input id="xx-input-announcement_title" class="form-control" type="text" name="announcement_title" placeholder="请输入公告标题" value="<?php echo ($announcement["announcement_title"]); ?>" disabled=""/>
					</div>
					<div class="col-sm-4">
						<p class="xx-p-validate-result" attr-validate="announcement_title"></p>
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-announcement_title" class="control-label col-sm-3">公告类型:</label>
					<div class="col-sm-5">
						<select class="form-control" name="announcement_type_id" disabled="">
							<?php if(is_array($announcement_type)): $i = 0; $__LIST__ = $announcement_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo["announcement_type_id"]); ?>" <?php if($vo[announcement_type_name] == $announcement[announcement_type_name]): ?>selected<?php endif; ?>><?php echo ($vo["announcement_type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-announcement_sender_id" class="control-label col-sm-3">发布用户:</label>
				<div class="col-sm-5">
					<p id="xx-input-announcement_sender_id" class="form-control" name="announcement_sender_id" disabled=""/><?php echo ($nav_admin["hospital_user_name"]); ?></p>
				</div>				
				</div>
				<div class="form-group">
					<label for="xx-input-announcement_hospital_id" class="control-label col-sm-3">所属医院:</label>
					<div class="col-sm-5">
						<p id="xx-input-announcement_hospital_id" class="form-control" name="announcement_hospital_id" disabled=""/><?php echo ($nav_hospital[0]["community_hospitals_name"]); ?></p>	
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-announcement_content" class="control-label col-sm-3">公告内容:</label>
					<div class="col-sm-5">
						<textarea id="xx-input-announcement_content" class="form-control"  name="announcement_content" placeholder="请输入公告内容" style="height: 200px;" disabled=""/><?php echo ($announcement["announcement_content"]); ?></textarea>
					</div>
					<div class="col-sm-4">
						<p class="xx-p-validate-result" attr-validate="announcement_content"></p>
					</div>
				</div>
				<div class="form-group">
					<label for="xx-input-announcement_picture" class="control-label col-sm-3">公告图片:</label>
					<div class="col-sm-5">
						<!--<input type="file" id="xx-input-img-uploader"/>-->
						<!--展示缩略图-->
						<img src="<?php echo ($announcement["announcement_picture"]); ?>" alt="" id="xx-img-show-thumb"  width="150px"/>
						<!--封面图字段-->
						<input type="hidden" name="image_path" id="xx-input-image-path"/>
						<!--缩略图字段-->
						<input type="hidden" name="announcement_picture" id="xx-input-thumb-path"/>
					</div>
				</div>
				<div class="form-group">
				<label for="xx-input-announcement_end_dat" class="control-label col-sm-3">公告撤销时间:</label>
					<div class="col-sm-5">
						<p id="xx-input-announcement_end_dat" class="form-control" name="announcement_announcement_end_date" disabled=""/><?php echo ($announcement["announcement_end_date"]); ?></p>	
					</div>
					</div>
					<div class="col-sm-4">
						<p class="xx-p-validate-result" attr-validate="announcement_end_date"></p>
					</div>
				</div>
				
						<div class="row">
							<div class="col-sm-2 col-sm-offset-3">
								<button type="button"  id="xx-btn-pass" class="btn btn-primary" <?php if($result == 0): ?>disabled<?php endif; ?>>通过</button>
							</div>	
							<div class="col-sm-2">	
								<button type="button"  id="xx-btn-back" class="btn btn-primary" data-toggle="modal" data-target="#myModal" attr-id="<?php echo ($announcement["announcement_id"]); ?>" <?php if($result == 0): ?>disabled<?php endif; ?>>未通过</button>
							</div>							
						</div>
						<input type="hidden" value="<?php echo ($announcement["announcement_id"]); ?>" name="announcement_id" />
						<input type="hidden" value="<?php echo ($announcement["announcement_version_number"]); ?>" name="announcement_version_number" />
					</form>
				</div>
			</div>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel">请输入未通过原因</h4>
			      </div>
			      <div class="modal-body">
			        <form id="xx-form-model-add">
			        	<textarea name="error_message" rows="2" cols="75"></textarea>
			        	<input type="hidden" name="id" value="<?php echo ($announcement["announcement_id"]); ?>" />
			        	<input type="hidden" name="num" value="<?php echo ($announcement["announcement_version_number"]); ?>" />
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
			        <button type="button" class="btn btn-primary" id="xx-btn-back-add">提交</button>
			      </div>
			    </div>
			  </div>
			</div>
			
		</div>
	</div>
</div>
<script>
	var SCOPE = {
		'add_url':'/hosma/admin.php/Noticle/add',
		'success_jump_url':'/hosma/admin.php/Noticle/index',
		'ajax_upload_swf':'/hosma/Public/js/vendor/uploadify/uploadify.swf',//图片地址
		'ajax_upload_url':'/hosma/admin.php/Noticle/ajaxUploadImage',//图片上传控制器地址
	};
	$('#xx-btn-pass').click(function(){
		var formData = $('#xx-form-add').serializeArray();
		var postData = {};
		$(formData).each(function(i){
			postData[this.name] = this.value;
		});
//		console.log(postData);
		delete postData.image_path;
		delete postData.announcement_picture;
		$.ajax({
			type:"post",
			url:"/hosma/admin.php/Noticle/pass",
			async:true,
			data:postData,
			dataType:'json',
			success:function(result){
				if(result.status == SUCCESS){
					//成功
					return Dialog.success(result.msg,SCOPE.success_jump_url);
				}
				else{
					return Dialog.error(result.msg);
				}
//										
//									
			}
		
		});		
	});
	$('#xx-btn-back').click(function(){
		var id = $(this).attr('attr-id');
		$('#announcment_id').val(id); 
	});
	$('#xx-btn-back-add').click(function(){
		var formData = $('#xx-form-model-add').serializeArray();
		var postData = {};
		$(formData).each(function(i){
			postData[this.name] = this.value;
		});
		console.log(postData);
		$.ajax({
			type:"post",
			url:"/hosma/admin.php/Noticle/back",
			async:true,
			data:postData,
			dataType:'json',
			success:function(result){
				if(result.status == SUCCESS){
					//成功
					return Dialog.success(result.msg,SCOPE.success_jump_url);
				}
				
				else{
					return Dialog.error(result.msg);
				}
//										
//									
			}
		});
	});
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