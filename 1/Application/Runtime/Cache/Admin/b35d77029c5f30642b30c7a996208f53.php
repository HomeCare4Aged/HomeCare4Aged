<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>居家养老服务平台管理系统</title>
	
	<link rel="stylesheet" href="/1/public/css/bootstrap.css" />
	<link rel="stylesheet" href="/1/public/css/sb-admin-2.css" />
	<link rel="stylesheet" href="/1/public/css/metisMenu.css" />
	<link rel="stylesheet" href="/1/public/css/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="/1/public/css/admin/common.css" />
	<link rel="stylesheet" href="/1/public/css/vendor/uploadify/uploadify.css" />
	
	
	<script type="text/javascript" src="/1/public/js/jquery.1.11.1.js" ></script>
    <script type="text/javascript" src="/1/public/js/bootstrap.js" ></script>
    <script type="text/javascript" src="/1/public/js/sb-admin-2.js" ></script>
    <script type="text/javascript" src="/1/public/js/metisMenu.js" ></script>
    <script type="text/javascript" src="/1/public/js/dialog/layer.js" ></script>
	<script type="text/javascript" src="/1/public/js/dialog.js" ></script>
	<script type="text/javascript" src="/1/public/js/vendor/uploadify/jquery.uploadify.js" ></script>
	<script type="text/javascript" src="/1/public/js/vendor/kindeditor/kindeditor-all.js"></script>
		
	</head>
	<body>
	

<div id="wrapper">
	
<!--后台管理系统的导航栏-->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-header">
		<a href="#" class="navbar-brand">居家养老服务平台管理系统</a>
	</div>
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-fw fa-user"></i><?php echo ($admin_name); ?><i class="caret"></i>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="#"><i class="fa fa-fw fa-user"></i>个人中心</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="/1/admin.php/Login/logout"><i class="fa fa-fw fa-power-off "></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav in" id="side-menu">
				<li>
					<a href="/1/admin.php/Index/index"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a href="/1/admin.php/Menu/index"><i class="fa fa-fw fa-home"></i>菜单管理</a>
				</li>
				<li>
					<a href="/1/admin.php/Announcement/index"><i class="fa fa-fw fa-home"></i>添加社区</a>
				</li>
				<li>
					<a href="/1/admin.php/HospitalRegister/index"><i class="fa fa-fw fa-home"></i>添加账号</a>
				</li>
				<li>
					<a href="/1/admin.php/Announcement/index"><i class="fa fa-fw fa-home"></i>发布公告</a>
				</li>
				<li>
					<a href="/1/admin.php/Video/index"><i class="fa fa-fw fa-home"></i>发布视频</a>
				</li>
				<li>
					<a><i class="fa fa-fw fa-server"></i>审核<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="/1/admin.php/Examine/index"><i class="fa fa-fw fa-university"></i>商户审核</a>
						</li>
						<li>
							<a href="/1/admin.php/Examine/announcement"><i class="fa fa-fw fa-newspaper-o"></i>公告信息审核</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-film"></i>视频信息审核</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="/1/admin.php/Role/index"><i class="fa fa-fw fa-newspaper-o"></i>信息管理</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-fw fa-stethoscope"></i>账号信息</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

				
	<div id="page-wrapper">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-info">
			    <div class="panel-heading" role="tab" id="headingOne">
			        <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				                医院列表
				        </a>
				    </h4>
			    </div>
			    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			        <div class="panel-body">
				        <div class="row">
						    <div class="col-sm-12">
						    	<div class="table-responsive">
									<form id="zh-form-list">
										<table class="table table-bordered table-hover zyn-table-list">
											<thead>
												<tr class="success">
													<td>医院编号</td>
													<td>医院名称</td>
													<td>医院地址</td>
													<td>状态</td>
													<td>操作</td>
												</tr>
											</thead>
											<tbody>
												<?php if(is_array($communityhospitalsinfos)): $i = 0; $__LIST__ = $communityhospitalsinfos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
													    <td><?php echo ($vo["community_hospital_numbers"]); ?></td>
														<td><?php echo ($vo["community_hospitals_name"]); ?></td>
														<td><?php echo ($vo["community_hospitals_address"]); ?></td>
														<td><?php echo ($vo["state"]); ?></td>
														<td>
														    <a class="zh-span-operation" id="zyn-span-assign-auth" attr-id="<?php echo ($vo["community_hospitals_id"]); ?>">信息管理</a>
													　　</td>
													</tr><?php endforeach; endif; else: echo "" ;endif; ?>
											</tbody>
										</table>
									</form>
									<nav>
										<ul class="pagination">
											<?php echo ($pageRes); ?>
										</ul>
									</nav>
								</div>
						    </div>
						</div>
			        </div>
			    </div>
			</div>
			<div class="panel panel-info">
			    <div class="panel-heading" role="tab" id="headingTwo">
			        <h4 class="panel-title"> 
			            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			                       社区列表   
			            </a>
			        </h4>
			    </div>
			    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			        <div class="panel-body">
				        <div class="row">
						    <div class="col-sm-12">
						    	<div class="table-responsive">
									<form id="zh-form-list">
										<table class="table table-bordered table-hover">
											<thead>
												<tr class="success">
													<td>社区名称</td>
													<td>社区地址</td>
													<td>状态</td>
													<td>操作</td>
												</tr>
											</thead>
											<tbody>
												<?php if(is_array($acommunityinfos)): $i = 0; $__LIST__ = $acommunityinfos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
													    <td><?php echo ($vo["community_name"]); ?></td>
														<td><?php echo ($vo["community_address"]); ?></td>
														<td><?php echo (getDataStatus($vo["state"])); ?></td>
														<td>
														    <a data-toggle="modal" data-target="#myModal1"><span class="zh-span-operation" id="zh-span-assign-auth" attr-id="<?php echo ($vo["community_id"]); ?>">信息管理</span></a>
													　　</td>
													</tr><?php endforeach; endif; else: echo "" ;endif; ?>
											</tbody>
										</table>
									</form>
									<nav>
										<ul class="pagination">
											<?php echo ($pageRes2); ?>
										</ul>
								   </nav>
							    </div>
					        </div>
					    </div> 
					    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" 
												aria-hidden="true">×
											</button>
											<h4 class="modal-title" id="myModalLabel">
												信息管理
											</h4>
										</div>
										<div class="modal-body">
                                            <div class="row">
												<div class="col-lg-6 col-lg-offset-3">
													<form class="form-horizontal" id="zyn-form-assign-auth" name="announcement">
														<div class="form-group">
															<div class="col-lg-12">
																<label for="" class="col-sm-3 control-label">状态:</label>
																<div class="row">
																    <input type="radio" name="state" value="通过" checked=""/>通过
																	<input type="radio" name="" value="未通过" id="xx-input-uncross"/>未通过
																</div>
															</div>
														</div>
													</form>	
										        </div>
											</div>
										</div>
										<div class="modal-footer">
										    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
											</button>
											<button type="button" class="btn btn-primary" id="zyn-btn-assign-auth">
												确定
											</button>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
			        </div>
			    </div>
			</div> 
			<div class="panel panel-info">
			    <div class="panel-heading" role="tab" id="headingThree">
			        <h4 class="panel-title"> 
			            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
			                        商户列表   
			            </a>
			        </h4>
			    </div>
			    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			        <div class="panel-body">
				        <div class="row">
						    <div class="col-sm-12">
						    	<div class="table-responsive">
									<form id="zh-form-list">
										<table class="table table-bordered table-hover">
											<thead>
												<tr class="success">
													<td>商户名称</td>
													<td>商户地址</td>
													<td>联系方式</td>
												</tr>
											</thead>
											<tbody>
												<?php if(is_array($storeshopinfos)): $i = 0; $__LIST__ = $storeshopinfos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
													    <td><?php echo ($vo["store_shop_name"]); ?></td>
														<td><?php echo ($vo["store_shop_address"]); ?></td>
														<td><?php echo ($vo["store_contact_user_phone"]); ?></td>
													</tr><?php endforeach; endif; else: echo "" ;endif; ?>
											</tbody>
										</table>
									</form>
									<nav>
										<ul class="pagination">
											<?php echo ($pageRes2); ?>
										</ul>
								   </nav>
							    </div>
					        </div>
					    </div> 
			        </div>
			    </div>
			</div> 
			<div class="panel panel-info">
			    <div class="panel-heading" role="tab" id="headingFour">
			        <h4 class="panel-title"> 
			            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
			                        管理员列表   
			            </a>
			        </h4>
			    </div>
			    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
			        <div class="panel-body">
				        <div class="row">
						    <div class="col-sm-12">
						    	<div class="table-responsive">
									<form id="zh-form-list">
										<table class="table table-bordered table-hover">
											<thead>
												<tr class="success">
													<td>商户名称</td>
													<td>商户地址</td>
													<td>联系方式</td>
												</tr>
											</thead>
											<tbody>
												<?php if(is_array($storeshopinfos)): $i = 0; $__LIST__ = $storeshopinfos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
													    <td><?php echo ($vo["store_shop_name"]); ?></td>
														<td><?php echo ($vo["store_shop_address"]); ?></td>
														<td><?php echo ($vo["store_contact_user_phone"]); ?></td>
													</tr><?php endforeach; endif; else: echo "" ;endif; ?>
											</tbody>
										</table>
									</form>
									<nav>
										<ul class="pagination">
											<?php echo ($pageRes2); ?>
										</ul>
								   </nav>
							    </div>
					        </div>
					    </div> 
			        </div>
			    </div>
			</div> 
		</div>
	</div>
</div>
<script>
	var SCOPE = {
		'edit_url':'/1/admin.php/Role/edit',
		'set_status_url':'/1/admin.php/Role/setStatus',
		'success_refresh_url':'/1/admin.php/Role/index',
		'assign_auth_url':'/1/admin.php/Role/assignAuth',
	};
</script>
    <script type="text/javascript" src="/1/public/js/constants.js" ></script>
    <script type="text/javascript" src="/1/public/js/admin/common.js" ></script>
	</body>
</html>