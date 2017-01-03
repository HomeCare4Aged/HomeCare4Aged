<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>社区医院管理系统</title>
		<link rel="stylesheet" type="text/css" href="/HosMa7/Public/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa7/Public/css/vendor/metisMenu/metisMenu.min.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa7/Public/css/sb-admin-2.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa7/Public/css/vendor/font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="/HosMa7/Public/css/admin/common.css" />
		<link rel="stylesheet" href="/HosMa7/Public/css/vendor/uploadify/uploadify.css" />
		<link rel="stylesheet" type="text/css" href="/HosMa7/Public/css/daterangepicker-bs3.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa7/Public/css/dataTable/jquery.dataTables.min.css" />
		<!--挂号-->
		<link rel="stylesheet" href="/HosMa7/Public/css/admin/hang.css" />
		<!--输液-->
		<link rel="stylesheet" href="/HosMa7/Public/css/admin/infusion.css" />
		<script type="text/javascript" src="/HosMa7/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/HosMa7/Public/js/bootstrap.js"></script>
		<script type="text/javascript" src="/HosMa7/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/HosMa7/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/HosMa7/Public/js/vendor/uploadify/jquery.uploadify.js" ></script>
		<script type="text/javascript" src="/HosMa7/Public/js/vendor/kindeditor/kindeditor-all.js" ></script>		
		<!--挂号-->
		<script type="text/javascript" src="/HosMa7/Public/js/admin/hang.js" ></script>
		<!--输液-->
		<script type="text/javascript" src="/HosMa7/Public/js/admin/infusion.js" ></script>
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
						<a href="/HosMa7/admin.php/Login/loginOut"><i class="fa fa-fw fa-power-off"></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a href="/HosMa7/admin.php/Index/index.html"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>信息录入<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa7/admin.php/Hospital/index.html">医院信息</a>
		                </li>
		                <li>
		                    <a href="/HosMa7/admin.php/Department/index.html">科室信息</a>
		                </li>
		                <li>
		                	<a href="/HosMa7/admin.php/Doctor/index.html">医生信息</a>
		                </li>
		                <li>
		                	<a href="/HosMa7/admin.php/User/index.html">员工信息</a>
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
		                    <a href="/HosMa7/admin.php/Schedule/index.html">排班信息录入</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>挂号单<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa7/admin.php/Register/infusion.html">号池信息录入</a>
		                </li>
		                <li>
		                    <a href="/HosMa7/admin.php/Register/hang.html">挂号信息显示</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>公告栏<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa7/admin.php/Noticle/index.html">公告审核</a>
		                </li>
		                <!--<li>-->
		                    <!--<a href="/HosMa7/admin.php/Noticle/add.html">公告发布</a>-->
		                <!--</li>-->
		                <li>
		                    <a href="/HosMa7/admin.php/Noticle/review.html">公告管理</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="/HosMa7/admin.php/Account/index.html">
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
							<i class="fa fa-fw fa-edit"></i>
							医生信息
						</li>
						
					</ol>
				</div>				
			</div><!--.row面包屑导航   -->
			<div class="row xx-div-search">
				<!--<div class="col-md-6">
					<form action="/HosMa7/admin.php/Doctor/index" method="get" class="form-horizontal">
						<div class="input-group">
							<span class="input-group-addon">搜索</span>
								<input type="text" name="keywords" class="form-control" id="xx-input-article-search" placeholder="请输入搜索条件" />
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</span>
						</div>
					</form>
				</div>-->
				<div class="col-sm-2">
					<button class="btn btn-primary " data-toggle="modal" data-target="#myModal">
					 新增医生
				</button>
				</div>
				<!-- 按钮触发模态框 -->
				<!--<button class="btn btn-primary" data-toggle="modal" data-target="#Modal">
					 弹框修改
				</button>-->
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<form id="xx-form-list">
							<table class="table table-bordered table-hover xx-table-list">
								<thead>
									<tr>
										<td style="display: none;"></td>
										<td>医生姓名</td>
										<td>照片</td>
										<td>所属科室</td>
										<td>职称</td>
										<td>简介</td>
										<td>联系方式</td>
										<td style="display: none;"></td>
										<td style="display: none;"></td>
										<td style="display: none;"></td>
										<td colspan="2">操作</td>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($doctors)): $i = 0; $__LIST__ = $doctors;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<td style="display: none;"><?php echo ($vo["hospital_doctor_id"]); ?></td>
											<td><?php echo ($vo["hospital_doctor_name"]); ?></td>
											<td><?php echo ($vo["hospital_doctor_picture"]); ?></td>
											<td><?php echo ($vo["hospital_office_name"]); ?></td>
											<td><?php echo ($vo["identity_name"]); ?></td>
											<td><?php echo ($vo["hospital_doctor_introduction"]); ?></td>
											<td><?php echo ($vo["hospital_doctor_phone"]); ?></td>
											<td style="display: none;"><?php echo ($vo["hospital_office_id"]); ?></td>
											<td style="display: none;"><?php echo ($vo["hospital_doctor_identity"]); ?></td>
											<td style="display: none;"><?php echo ($vo["hospital_doctor_sex"]); ?></td>
											<td>
												<span class="glyphicon glyphicon-edit" id="xx-span-edit1" attr-id="" data-toggle="modal"  onclick="editClick(this)">编辑</span>
											</td>
											<td>
												<span class="glyphicon glyphicon-trash" id="xx-span-delete" attr-id="<?php echo ($vo["hospital_doctor_id"]); ?>">删除</span>
											</td><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</form>
						<nav>
							<ul class="pagination">
								<?php echo ($pageRes); ?>
							</ul>
						</nav><!--分页控件-->
					</div>
				</div>	
			</div><!--row-->
			<div class="col-sm-10">
				<!-- 模态框（Modal） -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="ture">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								&times;
								</button>
								<h4 class="modal-title" id="myModalLabel">
									新增医生信息
								</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-sm-10 col-sm-offset-1">
										<form id="xx-form-add" class="form-horizontal">
											<div class="form-group">
												<label for="xx-input-hospital-doctor-name-add" class="control-label col-sm-3">医生姓名：</label>
												<div class="col-sm-5">
													<input id="xx-input-hospital-doctor-name-add" class="form-control" type="text" 
													name="hospital_doctor_name" placeholder="请输入医生姓名" />
												</div>
												<div class="col-sm-4">
													<p class="xx-p-validate-result" attr-validate="hospital_doctor_name"></p>
												</div>
											</div>
											<div class="form-group">
												<label for="xx-input-hospital-doctor-identity" class="control-label col-sm-3">医生职称：</label>
												<div class="col-sm-5">
													<!--<input id="xx-input-hospital-doctor-identity" class="form-control" type="text" 
													name="identity_name" placeholder="请输入医生职称" />-->
													<select class="form-control" name="identity_name" id="xx-input-hospital-doctor-identity">
														<?php if(is_array($userindentity)): $i = 0; $__LIST__ = $userindentity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value=""><?php echo ($vo["identity_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
													</select>
												</div>
												<div class="col-sm-4">
													<p class="xx-p-validate-result" attr-validate="identity_name"></p>
												</div>
											</div>
											<div class="form-group">
												<label for="xx-input-hospital-office-id" class="control-label col-sm-3">科室名称：</label>
												<div class="col-sm-5">
													<select class="form-control" name="hospital_office_name" id="selectedKESHI">
														<?php if(is_array($useroffices)): $i = 0; $__LIST__ = $useroffices;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value=""><?php echo ($vo["hospital_office_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
													</select>
												</div>
												<div class="col-sm-4">
													<p class="xx-p-validate-result" attr-validate="hospital_office_id"></p>
												</div>
											</div>
											<div class="form-group">
												<label for="xx-input-hospital-doctor-introduction" class="control-label col-sm-3">医生简介：</label>
												<div class="col-sm-5">
													<textarea class="js-editor" id="xx-textarea-hospital-doctor-introduction" name="hospital_doctor_introduction" rows="5" placeholder="请输入内容"></textarea>
												</div>
												<div class="col-sm-4">
													<p class="xx-p-validate-result" attr-validate="hospital_doctor_introduction"></p>
												</div>
											</div>
											<div class="form-group">
												<label for="xx-input-hospital-doctor-phone" class="control-label col-sm-3">联系方式：</label>
												<div class="col-sm-5">
													<input id="xx-input-hospital-doctor-phone" class="form-control" type="text" 
													name="hospital_doctor_phone" placeholder="请输入联系方式" />
												</div>
												<div class="col-sm-4">
													<p class="xx-p-validate-result" attr-validate="hospital_doctor_phone"></p>
												</div>
											</div>
											<div class="form-group">
												<label for="xx-input-image" class="control-label col-sm-3">医生照片：</label>
												<div class="col-sm-5">
													<input id="xx-input-img-uploader" type="file" />
													<!-- 展示缩略图 -->
													<img src="" alt="" id="xx-img-show-thumb" width="150px" style="display: none;"/>
													<!-- 封面图字段 -->
													<input type="hidden" name="image_path" id="xx-input-image-path"/>
													<!-- 缩略图图字段 -->
													<input type="hidden" name="thumb_path" id="xx-input-thumb-path"/>
												</div>
											</div>
											<div class="form-group">
												<label for="" class="control-label col-sm-3">性别：</label>
												<div class="col-sm-5">
													<input type="radio" name="hospital_doctor_sex" value="男" />男
													<input type="radio" name="hospital_doctor_sex" value="女" />女
												</div>
											</div>
											<div class="form-group">
												<label for="" class="control-label col-sm-3">状态：</label>
												<div class="col-sm-5">
													<input type="radio" name="status" value="1" checked="" />开启
													<input type="radio" name="status" value="0" />关闭
												</div>
											</div>
										</form>
									</div>
								</div><!--.row表单-->
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">
									关闭
								</button>
								<button type="button" class="btn btn-primary" id="xx-btn-add-submit">
									提交更改
								</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal -->
				</div>
			</div>	
			<div class="col-sm-10">
				<!-- 模态框（Modal） -->
				<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="ture">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								&times;
								</button>
								<h4 class="modal-title" id="myModalLabel">
									修改医生信息
								</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-sm-10 col-sm-offset-1">
										<form id="xx-form-add" class="form-horizontal">
											<div class="form-group">
												<input id="xx-input-doctorid" class="form-control" type="text"name="hospital_doctor_id" style="display: none;"/>
											</div>
											<div class="form-group">
												<input id="xx-input-hospital-office-id-edit" class="form-control" type="text"name="hospital_office_id" style="display: none;"/>
											</div>
											<div class="form-group">
												<input id="xx-input-hospital-doctor-identity-edit" class="form-control" type="text"name="hospital_doctor_identity" style="display: none;"/>
											</div>
											<div class="form-group">
												<label for="xx-input-hospital-doctor-name-edit" class="control-label col-sm-3">医生姓名：</label>
												<div class="col-sm-5">
													<input id="xx-input-hospital-doctor-name-edit" class="form-control" type="text" 
													name="hospital_doctor_name" placeholder="请输入医生姓名" />
												</div>
												<div class="col-sm-4">
													<p class="xx-p-validate-result" attr-validate="hospital_doctor_name"></p>
												</div>
											</div>
											<div class="form-group">
												<label for="xx-input-identity-name-edit" class="control-label col-sm-3">医生职称：</label>
												<div class="col-sm-5">
													<!--<input id="xx-input-identity-name-edit" class="form-control" type="text" 
													name="identity_name" value="<?php echo ($doctors["hospital_doctor_identity"]); ?>" placeholder="请输入医生职称" />-->
													<select class="form-control" name="identity_name" id="xx-input-identity-name-edit">
														<?php if(is_array($userindentity)): $i = 0; $__LIST__ = $userindentity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["identity_name"]); ?>"><?php echo ($vo["identity_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
													</select>
												</div>
												<div class="col-sm-4">
													<p class="xx-p-validate-result" attr-validate="hospital_doctor_identity"></p>
												</div>
											</div>
											<div class="form-group">
												<label for="xx-input-hospital-office-id" class="control-label col-sm-3">科室名称：</label>
												<div class="col-sm-5">
													<select class="form-control" name="type" id="xx-select-keshi">
														<?php if(is_array($useroffices)): $i = 0; $__LIST__ = $useroffices;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["hospital_office_name"]); ?>"><?php echo ($vo["hospital_office_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
													</select>
												</div>
												<div class="col-sm-4">
													<p class="xx-p-validate-result" attr-validate="hospital_office_id"></p>
												</div>
											</div>
											<div class="form-group">
												<label for="xx-input-hospital-doctor-introduction-edit" class="control-label col-sm-3">医生简介：</label>
												<div class="col-sm-5">
													<textarea class="js-editor" id="xx-textarea-hospital-doctor-introduction-edit" name="hospital_doctor_introduction" rows="5" placeholder="请输入内容"></textarea>
												</div>
												<div class="col-sm-4">
													<p class="xx-p-validate-result" attr-validate="hospital_doctor_introduction"></p>
												</div>
											</div>
											<div class="form-group">
												<label for="xx-input-hospital-doctor-phone-edit" class="control-label col-sm-3">联系方式：</label>
												<div class="col-sm-5">
													<input id="xx-input-hospital-doctor-phone-edit" class="form-control" type="text" 
													name="hospital_doctor_phone" placeholder="请输入联系方式" />
												</div>
												<div class="col-sm-4">
													<p class="xx-p-validate-result" attr-validate="hospital_doctor_phone"></p>
												</div>
											</div>
											<div class="form-group">
												<label for="xx-input-image" class="control-label col-sm-3">医生照片：</label>
												<div class="col-sm-5">
													<input id="xx-input-img2-uploader" type="file" />
													<!-- 展示缩略图 -->
													<img src="" alt="" id="xx-img-show-thumb" width="150px" style="display: none;"/>
													<!-- 封面图字段 -->
													<input type="hidden" name="image_path" id="xx-input-image-path"/>
													<!-- 缩略图图字段 -->
													<input type="hidden" name="thumb_path" id="xx-input-thumb-path"/>
												</div>
											</div>
											<div class="form-group">
												<label for="" class="control-label col-sm-3">性别：</label>
												<div class="col-sm-5">
													<input type="radio" name="hospital_doctor_sex" id="man" value="男" />男
													<input type="radio" name="hospital_doctor_sex" id="woman" value="女" />女
												</div>
											</div>
											<div class="form-group">
												<label for="" class="control-label col-sm-3">状态：</label>
												<div class="col-sm-5">
													<input type="radio" name="status" value="1" checked="" />开启
													<input type="radio" name="status" value="0" />关闭
												</div>
											</div>
										</form>
									</div>
								</div><!--.row表单-->
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">
									关闭
								</button>
								<button type="button" class="btn btn-primary" id="xx-btn-add-submit" onclick="update()">
									提交更改
								</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal -->
				</div>
			</div>
		</div>
	</div>
</div>

	<script>
		var SCOPE = {
			'add_url':'/HosMa7/admin.php/Doctor/add',
			'save_url':'/HosMa7/admin.php/Doctor/save',
			'success_jump_url':'/HosMa7/admin.php/Doctor/index',
			'set_status_url':'/HosMa7/admin.php/Doctor/setStatus',
			'ajax_upload_swf':'/HosMa7/Public/js/vendor/uploadify/uploadify.swf',
			'ajax_upload_url':'/HosMa7/admin.php/Doctor/ajaxUploadImage',
		};
		$('#element1').popover('show')
		//向模态框传值
		function editClick(obj){
//			console.log(obj.parentNode.parentNode);
			var objpp = obj.parentNode.parentNode;
			var msg = [];
//			console.log(objpp.children);
//			console.log(objpp.children.length);
			for (var i=0 ; i<objpp.children.length;i++){
//				console.log(objpp.children[i].innerText)
				msg[i] = objpp.children[i].innerText;
			}
			console.log(msg);
			$('#xx-input-doctorid').val(msg[0]);
			$('#xx-input-hospital-doctor-name-edit').val(msg[1]);
			$('#xx-input-identity-name-edit').val(msg[4]);
			$('#xx-select-keshi').val(msg[3]);
			$('#xx-textarea-hospital-doctor-introduction-edit').val(msg[5]);
			$('#xx-input-hospital-doctor-phone-edit').val(msg[6]);
			$('#xx-img-show-thumb').val(msg[2]);
			$('#xx-input-hospital-office-id-edit').val(msg[7]);
			$('#xx-input-hospital-doctor-identity-edit').val(msg[8]);
			if (msg[7] == '女') {  
       			$('#woman').attr('checked','true');  
   			} else {  
      			$('#man').attr('checked','true');   
 			}  
			$('#Modal').modal();
		}
		//从模态框取值,编辑医生信息
		function update() {  
		    //获取模态框数据 
		    var postData = {};
		    postData['hospital_doctor_id'] = $('#xx-input-doctorid').val();
		    postData['hospital_doctor_name'] = $('#xx-input-hospital-doctor-name-edit').val();
			postData['identity_name'] = $('#xx-input-identity-name-edit').val();
			postData['hospital_office_name'] = $('#xx-select-keshi').val();
			postData['hospital_doctor_introduction'] = $('#xx-textarea-hospital-doctor-introduction-edit').val();
			postData['hospital_doctor_phone'] = $('#xx-input-hospital-doctor-phone-edit').val();
			postData['community_hospitals_id'] = $('#xx-input-hospital-office-id-edit').val();
			postData['hospital_doctor_identity'] = $('#xx-input-hospital-doctor-identity-edit').val();
			postData['hospital_doctor_sex'] = $('input:radio[name="hospital_doctor_sex"]:checked').val();
			console.log(postData);
		    $.ajax({
		        type: 'post',  
		        url: SCOPE.add_url,  
		        data: postData,
		        dataType: 'json',  
		        success: function(result) {  
		            //location.reload();
		            if(result.status == SUCCESS){
						//成功
						return Dialog.success(result.msg,SCOPE.success_jump_url);
					}else if(result.status == VALIDATE_ERROR){
						//表单验证出错
						var errors = result.msg;
						//把input对应name下的错误信息取出来，添加到input后面
						$('.xx-p-validate-result').each(function(){
							var errorMsg = errors[$(this).attr('attr-validate')];
							$(this).html(errorMsg != undefined ? '*'+errorMsg : '').css({color:'red'});
						});
					}else{
	 					return Dialog.error(result.msg);
					}
			    }  
		    });
		}
	</script>
		
	<script type="text/javascript" src="/HosMa7/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/HosMa7/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/HosMa7/Public/js/constants.js"></script>
	<script type="text/javascript" src="/HosMa7/Public/js/admin/common.js"></script>
	<script type="text/javascript" src="/HosMa7/Public/js/moment.js"></script>
	<script type="text/javascript" src="/HosMa7/Public/js/daterangepicker.js"></script>
	<script type="text/javascript" src="/HosMa7/Public/js/dataTable/jquery.dataTables.min.js"></script>
	</body>
</html>