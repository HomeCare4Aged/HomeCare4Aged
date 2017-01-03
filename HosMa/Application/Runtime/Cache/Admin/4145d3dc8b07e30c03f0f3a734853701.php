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
		                    <a href="/HosMa7/admin.php/Register/hang.html">挂号信息显示</a>
		                </li>
		                <li>
		                    <a href="/HosMa7/admin.php/Register/infusion.html">输液信息显示</a>
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
				<div class="col-sm-12">
					<ol class="breadcrumb">
						<li class="">
							<i class="fa fa-fw fa-table"></i>
							公告管理
						</li>
						
					</ol>
				</div>				
			</div><!--.row面包屑导航   -->
			<div class="row">
				<div class="col-sm-12">
					<!--<div class="col-lg-6">-->
						<form class="form-horizontal" action="/HosMa7/admin.php/Noticle/review" method="post" id="xx-form-span">
						<div class="form-group">
						<div class="col-sm-2">
						<select name="select-user" id="xx-select-choosse" class="form-control">
							<option value="0" selected="selected">我的公告</option>
							<option value="1">全部</option>
						</select>
						</div>
					<!--</div>-->
					<!--<div class="col-lg-6">-->
						<div class="col-sm-2">
						<select name="select-type" id="xx-select-type" style="display: auto;" class="form-control">
							<option value="0" selected="selected">全部状态</option>
							<option value="1">未审核</option>
							<option value="2">通过</option>
							<option value="3">未通过</option>
						</select>
						</div>
						<div class="col-sm-5">
							<form id="xx-form-search"> 
								<div class="input-group">
									<span class="input-group-addon">搜索</span>
									<input class="form-control" type="text" name="search" value="<?php echo ($search); ?>"/>
										<div class="input-group-btn">
											<button id="xx-span-click" type="button" class="btn btn-primary">
												<span class="glyphicon glyphicon-search" ></span>											
											</button>											
										</div>
								</div>						
							</form>
						</div>
						<div class="col-sm-1">
						<button type="button" class="btn btn-primary" id="xx-btn-refresh">刷新				
							<span class="glyphicon glyphicon-refresh"></span>
						</button>
						</div>
						<div class="col-sm-2">
							<button type="button"  id="xx-btn-add" class="btn btn-primary">添加新公告</button>
						</div>	
						
					</form>
					<!--</div>-->
				</div>
			</div>	
			<!--<div class="row">-->
				<div class="col-md-12">
					<div class="table-responsive">
						<form id="xx-form-list">
							<table class="table table-bordered table-hover xx-table-list" id="tableID" style="table-layout: fixed;">
								<thead>
									<tr>
										<td style="display: none;"></td>
										<td style="overflow:hidden; text-overflow:ellipsis;">公告标题</td>
										<td>版本号</td>
										<td>发布时间</td>										
										<td>审核状态</td>
										<td>驳回意见</td>
										<td>删除</td>																				
										<td>查看详情</td>
										<td>查看历史记录</td>

									</tr>
								</thead>
								<tbody>
									<?php if(is_array($announcement)): $i = 0; $__LIST__ = $announcement;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<td style="display: none;"><?php echo ($vo["announcement_id"]); ?></td>
											<td style="overflow:hidden; text-overflow:ellipsis;"><?php echo ($vo["announcement_title"]); ?></td>
											<td><?php echo ($vo["announcement_version_number"]); ?></td>
											<td><?php echo ($vo["send_datetime"]); ?></td>											
											<td><?php echo ($vo["announcement_check_state"]); ?></td>	
											<td><?php echo ($vo["error_message"]); ?></td>	
											<td>
												<span class="glyphicon glyphicon-trash" id="xx-span-delete1" onclick="clickDelete(this)"></span>
											</td>
											<td>
												<span class="glyphicon glyphicon-check" id="xx-span-editor3" onclick="clickCheck(this)"></span>
											</td>
											<td>
												<span class="glyphicon glyphicon-book" id="xx-span-history" onclick="clickHistory(this)"></span>
											</td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</form>
						<nav>
							<ul class="pagination" id="seq">
								<?php echo ($pageRes); ?>
							</ul>
						</nav>
					</div>
				</div>
				
				</div>	
			<!--</div>-->
		</div>
	</div>
</div>	
</div>
<script>
	var SCOPE={
		'add_url':'/HosMa7/admin.php/Noticle/add',
		'edit_url':'/HosMa7/admin.php/Noticle/edit',
		'set_status_url':'/HosMa7/admin.php/Noticle/setStatus',
		'list_order_url':'/HosMa7/admin.php/Noticle/listOrder',
		'success_refresh_url':'/HosMa7/admin.php/Noticle/review',
		'manage_url':'/HosMa7/admin.php/Noticle/manage',
	};
	$("#xx-select-type").on('change',function(){
		var selectedValue = $(this).val();
		$.ajax({
			type:"post",
			url:"/HosMa7/admin.php/Noticle/getData",
			async:true,
			data:{'selectedValue':selectedValue},
			dataType:'json',
			success:function(data){
				console.log(data);
				$('#tableID tbody').remove();
				var sRows = '';
				for( var i in data){
					var sRow = '<tr>'+
									'<td style="display: none;">'+data[i].announcement_id+'</td>'+
									'<td>'+data[i].announcement_title+'</td>'+
									'<td>'+data[i].announcement_version_number+'</td>'+
									'<td>'+data[i].send_datetime+'</td>'+										
									'<td>'+data[i].announcement_check_state+'</td>'+	
									'<td>'+data[i].error_message+'</td>'+
									'<td>'+
										'<span class="glyphicon glyphicon-trash" id="xx-span-delete1" onclick="clickDelete(this)"></span>'+
									'</td>'+
									'<td>'+
										'<span class="glyphicon glyphicon-check" id="xx-span-editor3" onclick="clickCheck(this)"></span>'+
									'</td>'+
									'<td>'+
										'<span class="glyphicon glyphicon-book" id="xx-span-history" onclick="clickHistory(this)"></span>'+
									'</td>'+
								'</tr>';
					
					sRows += sRow;
				}
				$('#tableID').append('<tbody></tbody>');
				$('#tableID tbody').html(sRows);
//				var row = '<ul class="pagination" id="seq">' +
//								<?php echo ($pageRes); ?> +
//						  '</ul>';
//				
//				$('#seq').remove();	
//				$('#seq').html(data.pageRes);	
									
			}
			
		});
		
	});
	$('#xx-select-choosse').click(function(){
        if(($(this).val()) == 0){
        	$('#xx-select-type').attr('style','display:auto');
        	
        }
        if(($(this).val()) == 1){	
        	$('#xx-select-type').attr('style','display:none');
        }
    });
    $('#xx-btn-refresh').click(function(){
    	location.href = '/HosMa7/admin.php/Noticle/review';
    });
    $("#xx-select-choosse").on('change',function(){
		var selectedValue = $(this).val();
		$.ajax({
			type:"post",
			url:"/HosMa7/admin.php/Noticle/getSourse",
			async:true,
			data:{'selectedValue':selectedValue},
			dataType:'json',
			success:function(data){
				console.log(data);
				$('#tableID tbody').remove();
				var sRows = '';
				for( var i in data ){
					var sRow = '<tr>'+
									'<td style="display: none;">'+data[i].announcement_id+'</td>'+
									'<td>'+data[i].announcement_title+'</td>'+
									'<td>'+data[i].announcement_version_number+'</td>'+
									'<td>'+data[i].send_datetime+'</td>'+											
									'<td>'+data[i].announcement_check_state+'</td>'+	
									'<td>'+data[i].error_message+'</td>'+	
									'<td>'+
										'<span class="glyphicon glyphicon-trash" id="xx-span-delete1" onclick="clickDelete(this)"></span>'+
									'</td>'+
									'<td>'+
										'<span class="glyphicon glyphicon-check" id="xx-span-editor3" onclick="clickCheck(this)"></span>'+
									'</td>'+
									'<td>'+
										'<span class="glyphicon glyphicon-book" id="xx-span-history" onclick="clickHistory(this)"></span>'+
									'</td>'+
								'</tr>'
					
					sRows += sRow;
				}
				$('#tableID').append('<tbody></tbody>');
				$('#tableID tbody').html(sRows);
										
									
			}
		});
		
	});
	function clickEdit(obj){
		if($("#xx-select-choosse").find("option:selected").val() == 1){
			Dialog.error('全部公告无法编辑和删除');
				return;
		}
//		console.log(obj.parentNode.parentNode);
		else {
			
		
			var objpp = obj.parentNode.parentNode;
			var msg = [];
//			console.log(objpp.children);
//			console.log(objpp.children.length);
			for (var i=0 ; i<objpp.children.length;i++){
//				console.log(objpp.children[i].innerText)
				msg[i] = objpp.children[i].innerText;
			}
			if(msg[3] == '通过'){
				Dialog.error('通过后的公告无法编辑和删除');
				return;
			}
			var id = msg[0];
//			console.log(id);
		location.href = SCOPE.edit_url+'?id='+id;	
		}
	}
	function clickDelete(obj){
	if($("#xx-select-choosse").find("option:selected").val() == 1){
		Dialog.error('全部公告无法编辑和删除');
			return;
	}
	else {
//			console.log(obj.parentNode.parentNode);
			var objpp = obj.parentNode.parentNode;
			var msg = [];
//			console.log(objpp.children);
//			console.log(objpp.children.length);
			for (var i=0 ; i<objpp.children.length;i++){
//				console.log(objpp.children[i].innerText)
				msg[i] = objpp.children[i].innerText;
			}
			if(msg[4] != '未审核'){
//				console.log(msg[4]);
				Dialog.error('不是未审核的公告无法删除');
				return;
			}
			var id = msg[0];
			var num = msg[2];
		var url = SCOPE.set_status_url;;
		var postData = {};
		postData['id'] = id;
		postData['num'] = num;	
		postData['state'] = '关闭';
//		console.log(postData);
		Dialog.confirm('是否确认删除数据？',function(){
			$.ajax({
				type:"post",
				url:url,
				async:true,
				data:postData,
				dataType:'json',
				success:function(result){
					if(result.status == SUCCESS){
						return Dialog.success(result.msg,SCOPE.success_refresh_url);
					}
					return Dialog.error(result.msg);
				}
			});
		});	
	}
	}
	function clickCheck(obj){
		var objpp = obj.parentNode.parentNode;
		var id = objpp.children[0].innerText;
		var num = objpp.children[2].innerText;
		location.href = '/HosMa7/admin.php/Noticle/manage'+'?id='+id+'&num='+num;
	}
	function clickHistory(obj){
		if($("#xx-select-choosse").find("option:selected").val() == 1){
		Dialog.error('全部公告无法查看历史纪录');
			return;
		}else{
			var objpp = obj.parentNode.parentNode;
			var id = objpp.children[0].innerText;
	//		console.log(id);
			var postData={};
			location.href = '/HosMa7/admin.php/Noticle/history'+'?id='+id;	
		}
		
	}
	$('#xx-span-click').click(function(){
		var formData = $('#xx-form-span').serializeArray();
		var postData = {};
		$(formData).each(function(i){
			postData[this.name] = this.value;
		});
		var temp = postData['search'];
		console.log(1);
		var spanData = {};
		spanData['search'] = temp;
		$.ajax({
			type:"post",
			url:"/HosMa7/admin.php/Noticle/getSearch",
			async:true,
			data:postData,
			dataType:'json',
			success:function(data){
				console.log(data);
				$('#tableID tbody').remove();
				var sRows = '';
				for( var i in data ){
					var sRow = '<tr>'+
									'<td style="display: none;">'+data[i].announcement_id+'</td>'+
									'<td>'+data[i].announcement_title+'</td>'+
									'<td>'+data[i].announcement_version_number+'</td>'+
									'<td>'+data[i].send_datetime+'</td>'+											
									'<td>'+data[i].announcement_check_state+'</td>'+	
									'<td>'+data[i].error_message+'</td>'+	
									'<td>'+
										'<span class="glyphicon glyphicon-trash" id="xx-span-delete1" onclick="clickDelete(this)"></span>'+
									'</td>'+
									'<td>'+
										'<span class="glyphicon glyphicon-check" id="xx-span-editor3" onclick="clickCheck(this)"></span>'+
									'</td>'+
									'<td>'+
										'<span class="glyphicon glyphicon-book" id="xx-span-history" onclick="clickHistory(this)"></span>'+
									'</td>'+
								'</tr>'
					
					sRows += sRow;
				}
				$('#tableID').append('<tbody></tbody>');
				$('#tableID tbody').html(sRows);
//										
//									
			}
		});
	});
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