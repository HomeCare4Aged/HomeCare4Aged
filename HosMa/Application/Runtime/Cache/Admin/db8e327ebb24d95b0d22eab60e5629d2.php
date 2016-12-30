<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>社区医院管理系统</title>
		<link rel="stylesheet" type="text/css" href="/HOSMA/Public/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/HOSMA/Public/css/vendor/metisMenu/metisMenu.min.css"/>
		<link rel="stylesheet" type="text/css" href="/HOSMA/Public/css/sb-admin-2.css"/>
		<link rel="stylesheet" type="text/css" href="/HOSMA/Public/css/vendor/font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="/HOSMA/Public/css/admin/common.css" />
		<link rel="stylesheet" href="/HOSMA/Public/css/vendor/uploadify/uploadify.css" />
		<link rel="stylesheet" type="text/css" href="/HOSMA/Public/css/daterangepicker-bs3.css"/>
		<link rel="stylesheet" type="text/css" href="/HOSMA/Public/css/dataTable/jquery.dataTables.min.css" />
		
		<script type="text/javascript" src="/HOSMA/Public/js/jquery 1.11.1.js"></script>
		<script type="text/javascript" src="/HOSMA/Public/js/bootstrap.js"></script>
		<script type="text/javascript" src="/HOSMA/Public/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/HOSMA/Public/js/dialog.js"></script>
		<script type="text/javascript" src="/HOSMA/Public/js/vendor/uploadify/jquery.uploadify.js" ></script>
		<script type="text/javascript" src="/HOSMA/Public/js/vendor/kindeditor/kindeditor-all.js" ></script>
		<script type="text/javascript" src="/HOSMA/Public/js/dataTable/jquery.dataTables.min.js"></script>
	</head>
	<body>


<div id="wrapper">
	<!--后台管理系统的导航栏-->
<nav class="navbar navbar-default navbar-static-top">
	<div class="navbar-header">
		<a href="#" class="navbar-brand">社区医院管理平台</a>
	</div>
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-fw fa-user"></i>wxx<i class="caret"></i>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="#"><i class="fa fa-fw fa-user"></i>个人中心</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="#"><i class="fa fa-fw fa-power-off"></i>注销</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a href="/HOSMA/admin.php/Index/index.html"><i class="fa fa-fw fa-home"></i>首页</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>信息录入<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HOSMA/admin.php/Hospital/index.html">医院信息</a>
		                </li>
		                <li>
		                    <a href="/HOSMA/admin.php/Department/index.html">科室信息</a>
		                </li>
		                <li>
		                	<a href="/HOSMA/admin.php/Doctor/index.html">医生信息</a>
		                </li>
		                <li>
		                	<a href="/HOSMA/admin.php/User/index.html">员工信息</a>
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
		                    <a href="/HOSMA/admin.php/Schedule/index.html">排班信息录入</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>挂号单<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HOSMA/admin.php/Register/index.html">号池信息录入</a>
		                </li>
		                <li>
		                    <a href="/HOSMA/admin.php/Register/info.html">挂号信息显示</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>公告栏<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HOSMA/admin.php/Noticle/index.html">公告信息预览</a>
		                </li>
		                <li>
		                    <a href="/HOSMA/admin.php/Noticle/add.html">公告发布</a>
		                </li>
		                <li>
		                    <a href="/HOSMA/admin.php/Noticle/review.html">公告审核</a>
		                </li>
		            </ul>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-cogs"></i>视频栏<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
		                <li>
		                    <a href="/HOSMA/admin.php/Video/index.html">视频信息预览</a>
		                </li>
		                <li>
		                    <a href="/HOSMA/admin.php/Video/add.html">视频发布</a>
		                </li>
		            </ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

	<div id="page-wrapper">
		<div class="container">
			<table id="table_id_example" class="display">
			    <thead>
			        <tr>
			            <th>Column 1</th>
			            <th>Column 2</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Row 1 Data 1</td>
			            <td>Row 1 Data 2</td>
			        </tr>
			        <tr>
			            <td>Row 2 Data 1</td>
			            <td>Row 2 Data 2</td>
			        </tr>
			         <tr>
			            <th>Column 1</th>
			            <th>Column 2</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Row 1 Data 1</td>
			            <td>Row 1 Data 2</td>
			        </tr>
			        <tr>
			            <td>Row 2 Data 1</td>
			            <td>Row 2 Data 2</td>
			        </tr> <tr>
			            <th>Column 1</th>
			            <th>Column 2</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Row 1 Data 1</td>
			            <td>Row 1 Data 2</td>
			        </tr>
			        <tr>
			            <td>Row 2 Data 1</td>
			            <td>Row 2 Data 2</td>
			        </tr> <tr>
			            <th>Column 1</th>
			            <th>Column 2</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Row 1 Data 1</td>
			            <td>Row 1 Data 2</td>
			        </tr>
			        <tr>
			            <td>Row 2 Data 1</td>
			            <td>Row 2 Data 2</td>
			        </tr> <tr>
			            <th>Column 1</th>
			            <th>Column 2</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Row 1 Data 1</td>
			            <td>Row 1 Data 2</td>
			        </tr>
			        <tr>
			            <td>Row 2 Data 1</td>
			            <td>Row 2 Data 2</td>
			        </tr> <tr>
			            <th>Column 1</th>
			            <th>Column 2</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Row 1 Data 1</td>
			            <td>Row 1 Data 2</td>
			        </tr>
			        <tr>
			            <td>Row 2 Data 1</td>
			            <td>Row 2 Data 2</td>
			        </tr> <tr>
			            <th>Column 1</th>
			            <th>Column 2</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Row 1 Data 1</td>
			            <td>Row 1 Data 2</td>
			        </tr>
			        <tr>
			            <td>Row 2 Data 1</td>
			            <td>Row 2 Data 2</td>
			        </tr> <tr>
			            <th>Column 1</th>
			            <th>Column 2</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Row 1 Data 1</td>
			            <td>Row 1 Data 2</td>
			        </tr>
			        <tr>
			            <td>Row 2 Data 1</td>
			            <td>Row 2 Data 2</td>
			        </tr> <tr>
			            <th>Column 1</th>
			            <th>Column 2</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Row 1 Data 1</td>
			            <td>Row 1 Data 2</td>
			        </tr>
			        <tr>
			            <td>Row 2 Data 1</td>
			            <td>Row 2 Data 2</td>
			        </tr> <tr>
			            <th>Column 1</th>
			            <th>Column 2</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Row 1 Data 1</td>
			            <td>Row 1 Data 2</td>
			        </tr>
			        <tr>
			            <td>Row 2 Data 1</td>
			            <td>Row 2 Data 2</td>
			        </tr>
			    </tbody>
			</table>
		</div>
	</div>
</div>
	<script>
		var SCOPE = {
			'add_url':'/HOSMA/admin.php/Noticle/add',
		};
		$(document).ready( function () {
   			$('#table_id_example').dataTable({
            "sPaginationType" : "full_numbers",
            "oLanguage" : {
                "sLengthMenu": "每页显示 _MENU_ 条记录",
                "sZeroRecords": "抱歉， 没有找到",
                "sInfo": "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
                "sInfoEmpty": "没有数据",
                "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
                "sZeroRecords": "没有检索到数据",
                 "sSearch": "名称:",
                "oPaginate": {
                "sFirst": "首页",
                "sPrevious": "前一页",
                "sNext": "后一页",
                "sLast": "尾页"
                }
                     
            }
        }
   			
        );
        $('#next').on( 'click', function () {
   			 table.page( 'next' ).draw( false );
		} );
 
		$('#previous').on( 'click', function () {
   			 table.page( 'previous' ).draw( false );
		} );
		} );
	</script>
		
	<script type="text/javascript" src="/HOSMA/Public/js/vendor/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="/HOSMA/Public/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/HOSMA/Public/js/constants.js"></script>
	<script type="text/javascript" src="/HOSMA/Public/js/admin/common.js"></script>
	<script type="text/javascript" src="/HOSMA/Public/js/moment.js"></script>
	<script type="text/javascript" src="/HOSMA/Public/js/daterangepicker.js"></script>
	<script type="text/javascript" src="/HOSMA/Public/js/dataTable/jquery.dataTables.min.js"></script>
	</body>
</html>