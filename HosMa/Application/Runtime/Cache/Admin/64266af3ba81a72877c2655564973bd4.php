<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>社区医院管理系统</title>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/vendor/metisMenu/metisMenu.min.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/sb-admin-2.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/vendor/font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="/HosMa9/Public/css/admin/common.css" />
		<link rel="stylesheet" href="/HosMa9/Public/css/vendor/uploadify/uploadify.css" />
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/daterangepicker-bs3.css"/>
		<link rel="stylesheet" type="text/css" href="/HosMa9/Public/css/dataTable/jquery.dataTables.min.css" />
		<!--挂号-->
		<link rel="stylesheet" href="/HosMa9/Public/css/admin/hang.css" />
		<!--输液-->
		<link rel="stylesheet" href="/HosMa9/Public/css/admin/infusion.css" />
		<script type="text/javascript" src="/HosMa9/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/bootstrap.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/HosMa9/Public/js/vendor/uploadify/jquery.uploadify.js" ></script>
		<script type="text/javascript" src="/HosMa9/Public/js/vendor/kindeditor/kindeditor-all.js" ></script>		
		<!--挂号-->
		<script type="text/javascript" src="/HosMa9/Public/js/admin/hang.js" ></script>
		<!--输液-->
		<script type="text/javascript" src="/HosMa9/Public/js/admin/infusion.js" ></script>
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
						<a href="/HosMa9/admin.php/Login/loginOut"><i class="fa fa-fw fa-power-off"></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a href="/HosMa9/admin.php/Index/index.html"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>信息录入<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa9/admin.php/Hospital/index.html">医院信息</a>
		                </li>
		                <li>
		                    <a href="/HosMa9/admin.php/Department/index.html">科室信息</a>
		                </li>
		                <li>
		                	<a href="/HosMa9/admin.php/Doctor/index.html">医生信息</a>
		                </li>
		                <li>
		                	<a href="/HosMa9/admin.php/User/index.html">员工信息</a>
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
		                    <a href="/HosMa9/admin.php/Schedule/index.html">排班信息录入</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>挂号单<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa9/admin.php/Register/hang.html">挂号信息显示</a>
		                </li>
		                <li>
		                    <a href="/HosMa9/admin.php/Register/infusion.html">输液信息显示</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>公告栏<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HosMa9/admin.php/Noticle/index.html">公告审核</a>
		                </li>
		                <!--<li>-->
		                    <!--<a href="/HosMa9/admin.php/Noticle/add.html">公告发布</a>-->
		                <!--</li>-->
		                <li>
		                    <a href="/HosMa9/admin.php/Noticle/review.html">公告管理</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="/HosMa9/admin.php/Account/index.html">
						<i class="fa fa-fw fa-cogs"></i>账户信息<span class="fa arrow"></span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

	<div id="page-wrapper">
		<br />
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li class="">
							<i class="fa fa-fw fa-edit"></i>
							排班信息
						</li>
						
					</ol>
				</div>				
			</div><!--.row面包屑导航   -->
			<!--时间控件-->
			<div class="row">
				<div class="col-sm-3">
					<select class="form-control" name="hospital_doctor_id" id="hy-select-name-search">
					  <option value="10086">选择医生姓名</option>
					  <?php if(is_array($doctor)): $i = 0; $__LIST__ = $doctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["hospital_doctor_id"]); ?>"><?php echo ($vo["hospital_doctor_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
				<div class="col-sm-4">
					<form class="form-horizontal">
		                 <fieldset>
			                <div class="control-group">
			                    <div class="controls">
			                     	<div class="input-prepend input-group">
			                       		<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
			                       		<input type="text" readonly style="width: 200px" name="schedule_date" id="birthday" class="form-control" value="2016-1-03" /> 
			                     	</div>
			                    </div>
			                </div>
		                 </fieldset>
               		</form>
				</div>
				<div class="col-sm-3">
					<button id="xx-btn-add" type="button" class="btn btn-primary">添加</button>
				</div>
			</div>
              <br />
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<form id="xx-form-list" class="">
							<table class="table table-bordered table-hover xx-table-list" id="hy-table-search">
								<thead>
									<tr id="hy-tr-date">
										<td>医生姓名</td>
										<td>日期</td>
										<td>在班时段</td>
										<td>号池数量</td>
										<td>编辑</td>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($schedule)): $i = 0; $__LIST__ = $schedule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="hy-tr-date">
										<td><?php echo ($vo["hospital_doctor_name"]); ?></td>
										<td><?php echo ($vo["schedule_date"]); ?></td>
										<td><?php echo ($vo["schedule_time"]); ?></td>
										<td><?php echo ($vo["open_registration_number"]); ?></td>
										<td>
											<span class="glyphicon glyphicon-edit" id="xx-span-editor" attr-id="<?php echo ($vo["hospital_doctor_id"]); ?>" onclick="clickedit(this)" data-toggle="modal" data-target="#myModal"></span>
										</td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
									
								</tbody>
							</table>
						</form>
						<nav>
							<ul class="pagination" id="pageRes">
								<?php echo ($pageRes); echo ($res["pageRes"]); ?>
							</ul>
						</nav>
					</div>
				</div>	
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;
								</button>
								<h4 class="modal-title" id="myModalLabel">
									修改排班
								</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-sm-12">
						    		<form id="xx-form-add" class="form-horizontal">
						    			
										<div class="form-group">
											<label for="xx-input-hospital-doctor-name" class="control-label col-sm-3">医生：</label>
											<div class="col-sm-5">
												<select class="form-control" id="xx-input-hospital-doctor-name" name="hospital_doctor_name">
												  	<?php if(is_array($doctor)): $i = 0; $__LIST__ = $doctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["hospital_doctor_name"]); ?>"><?php echo ($vo["hospital_doctor_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
												</select>
											</div>
											
										</div>
										<div class="form-group">
											<label for="xx-input-schedule-date" class="control-label col-sm-3">排班日期：</label>
											<div class="col-sm-5">
												<fieldset>
									                <div class="control-group">
									                    <div class="controls">
									                     	<div class="input-prepend input-group">
									                       		<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
									                       		<input type="text" readonly style="width: 180px" name="schedule_date" id="schedule_date" class="form-control" value="<?php echo ($schedule["schedule_date"]); ?>" /> 
									                     	</div>
									                    </div>
									                </div>
						                 		</fieldset>
						                 		
											</div>
											
										</div>
										<div class="form-group">
											<label for="xx-input-scheduling-time" class="control-label col-sm-3">时间段：</label>
											<div class="col-sm-5">
												<input type="radio" name="schedule_time" id="am" value="上午" />上午
												<input type="radio" name="schedule_time" id="pm" value="下午" />下午
												<input type="radio" name="schedule_time" id="all" value="全天" />全天
											</div>
											
										</div>
										<div class="form-group">
											<label for="xx-input-open-registration-number" class="control-label col-sm-3">号池数量：</label>
											<div class="col-sm-5">
												<input id="xx-input-open-registration-number" class="form-control" type="text" 
												name="open_registration_number" placeholder="请输入号池数量" value="<?php echo ($schedule["open_registration_number"]); ?>"/>
												
											</div>
											<div class="col-sm-4">
												<p class="xx-p-validate-result" attr-validate="open_registration_number"></p>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6 col-sm-offset-4">
												<button type="button" id="hy-btn-add-submit" class="btn btn-primary">修改</button>
											</div>
										</div>
										
									</form>
						    	</div>
						    	</div>
							</div>
							
						</div><!-- /.modal-content -->
					</div><!-- /.modal -->
			</div><!--row-->
			
		</div>
	</div>
</div>
	<script>
		var SCOPE = {
			'add_url':'/HosMa9/admin.php/Schedule/add',
			'success_refresh_url':'/HosMa9/admin.php/Schedule/index',
			'edit_url':'/HosMa9/admin.php/Schedule/edit',
			'get_name_url':'/HosMa9/admin.php/Schedule/getName',
			'get_time_url':'/HosMa9/admin.php/Schedule/getTime',
			'update_url':'/HosMa9/admin.php/Schedule/update',
			'success_jump_url':'/HosMa9/admin.php/Schedule/index'
			
		
		};
//		修改按钮点击事件
		$('#hy-btn-add-submit').click(function(){
		var schOldName=schTableContent[0];
		var schOldDate=schTableContent[1];
		var schOldTime=schTableContent[2];
		var docName=$('#xx-input-hospital-doctor-name').val();
		var schDate=$('#schedule_date').val();
		var schTime= $('input:radio[name="schedule_time"]:checked').val();
		var regNUm=$('#xx-input-open-registration-number').val();
		var postData = {};
		postData['hospital_doctor_name'] = docName;
		postData['schedule_date'] = schDate;
		postData['schedule_time'] = schTime;
		postData['open_registration_number'] = regNUm;
		postData['scholdname'] = schOldName;
		postData['scholddate'] = schOldDate;
		postData['scholdtime'] = schOldTime;
		$.ajax({
			type:'post',
			url:SCOPE.update_url,
			data:postData,
			dataType:'json',
//			console.log(data);
			success:function(result){
				console.log(result);
//				连接服务器成功
				if(result.status == SUCCESS){
					return Dialog.success(result.msg,SCOPE.success_jump_url);
				}else if(result.status == VALIDATE_ERROR){
					//表单验证出错
					var errors = result.msg;
					//把input对应name下的错误信息取出来，添加到input后面
					$('.xx-p-validate-result').each(function(){
//						console.log();
						var errorMsg = errors[$(this).attr('attr-validate')];
						$(this).html(errorMsg != undefined ? '*'+errorMsg : '').css({color:'red'});
					});
				}else{
   					return Dialog.error(result.msg);
				}
				return;
			},
		});
	});
		function clickedit(obj){
			var objpp = obj.parentNode.parentNode;
			var msg = [];
			for (var i=0 ; i<objpp.children.length;i++){
//				console.log(objpp.children[i].innerText)
				msg[i] = objpp.children[i].innerText;
			}
			schTableContent=msg;
//			console.log(msg);
			if (msg[2] == "上午") {  
        		$('#am').attr("checked",'true');
    		} 
    		if (msg[2] == "下午"){
        		$('#pm').attr("checked",'true');
    		} 
    		if (msg[2] == "全天"){
        		$('#all').attr("checked",'true');
    		}
    		$('#schedule_date').val(msg[1]);
    		$('#xx-input-hospital-doctor-name').val(msg[0]);
			$('#xx-input-open-registration-number').val(msg[3]);

		}
		
		
		
	</script>
	
	<script type="text/javascript" src="/HosMa9/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/constants.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/admin/common.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/moment.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/daterangepicker.js"></script>
	<script type="text/javascript" src="/HosMa9/Public/js/dataTable/jquery.dataTables.min.js"></script>
	</body>
</html>