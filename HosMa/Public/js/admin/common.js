
$(document).ready(function(){
//	window.history.back(function(){
//	location.reload(function(){
//	location.href=document.referrer;
//	});
//});
	//为模块首页的录入按钮添加事件
	$('#xx-btn-add').click(function(){
		location.href = SCOPE.add_url;
	});
	
	//为提交新增数据按钮添加事件
	$('#xx-btn-add-submit').click(function(){
		var formData = $('#xx-form-add').serializeArray();
		console.log(formData);
		var postData = {};
		$(formData).each(function(i){
			postData[this.name] = this.value;
		});
//		console.log(postData);
		$.ajax({
			type:'post',
			url:SCOPE.add_url,
			data:postData,
			dataType:'json',
			success:function(result){
				//连接服务器成功
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
//					console.log(result.msg);
					return;
			},
		});
	});
	//返回
	$('#xx-btn-add-return').click(function(){
		location.href = SCOPE.return_url;
	});	
	//点击编辑按钮的事件
	$('.xx-table-list #xx-span-edit').click(function(){
		var id = $(this).attr('attr-id');
		location.href = SCOPE.edit_url+'?id='+id;			
	});
	
	//点击删除按钮事件
	$('.xx-table-list #xx-span-delete').click(function(){
		var id = $(this).attr('attr-id');
		var url = SCOPE.set_status_url;;
		var postData = {};
		postData['id'] = id;
		postData['status'] = -1;
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
	});
	
	//点击播放按钮
	$('.xx-table-list #xx-span-circle').click(function(){
		location.href = SCOPE.circle_url;		
	});
	
//	
//	//点击排序按钮的事件
//	$('#xx-btn-listorder').click(function(){
//		var formData = $('#xx-form-list').serializeArray();
//		var postData = {};
//		$(formData).each(function(){
//			postData[this.name] = this.value;
//		});
//		var url = SCOPE.list_order_url;
//		$.ajax({
//			type:"post",
//				url:url,
//				async:true,
//				data:postData,
//				dataType:'json',
//				success:function(result){
//					if(result.status == SUCESS){
//						return Dialog.success(result.msg,SCOPE.success_refresh_url);
//					}
//				return Dialog.error(result.msg);
//				}
//		});
//	});
//	
//	//跳转分配按钮
//	$('#xx-table-list #xx-span-assign-auth').click(function(){
//		var id = $(this).attr('attr-id');
//		location.href = SCOPE.assign_auth_url+'?id='+id;
//	});
//	
	//点击分配权限事件
	$('#xx-btn-assign-auth').click(function(){
		var formData = $('#xx-form-assign-auth').serializeArray();
		var postData = {};
		$(formData).each(function(i){
			postData[this.name] = this.value;
		});
		$.ajax({
			type:'post',
			url:SCOPE.assign_auth_url,
			data:postData,
			dataType:'json',
			success:function(result){
				if(result.status == SUCESS){
					//成功
					return Dialog.success(result.msg,SCOPE.success_jump_url);
				}
   					return Dialog.error(result.msg);
			},
		});
	});
	
	$('#xx-input-video-uploader').uploadify({
		'fileSize' : '222121212',
		'swf':SCOPE.ajax_upload_swf,
		'uploader':SCOPE.ajax_upload_url,
		'buttonText':'上传视频',
		'fileTypeExts':'*.RWVB;*.AVI;*.MP4;*.MOV',
		'fileObjName':'file',
		'onUploadSuccess':function(file,data,response){
			if(response){
				var res = JSON.parse(data);
				$('#xx-img-show-thumb').attr('src',res.data).show();
				$('#xx-input-video_url').attr('value',res.data);
				// $('#xx-input-thumb-path').attr('value',res.data.thumb_path);
			}
		},
	});
		//上传封面图
	$('#xx-input-img-uploader').uploadify({
		'swf':SCOPE.ajax_upload_swf,
		'uploader':SCOPE.ajax_upload_url,
		'buttonText':'上传图片',
		'fileTypeExts':'*.gif;*.png;*.jpg',
		'fileTypeDecs':'Image File',
		'fileObjName':'file',
		'onUploadSuccess':function(file,data,response){
			if(response){
				var res = JSON.parse(data);
				$('#xx-img-show-thumb').attr('src',res.data.thumb_path).show();
				$('#xx-input-image-path').attr('value',res.data.image_path);
				$('#xx-input-thumb-path').attr('value',res.data.thumb_path);
			}
		},
	});
		//上传封面图
	$('#xx-input-img2-uploader').uploadify({
		'swf':SCOPE.ajax_upload_swf,
		'uploader':SCOPE.ajax_upload_url,
		'buttonText':'上传图片',
		'fileTypeExts':'*.gif;*.png;*.jpg',
		'fileTypeDecs':'Image File',
		'fileObjName':'file',
		'onUploadSuccess':function(file,data,response){
			if(response){
				var res = JSON.parse(data);
				$('#xx-img-show-thumb').attr('src',res.data.thumb_path).show();
				$('#xx-input-image-path').attr('value',res.data.image_path);
				$('#xx-input-thumb-path').attr('value',res.data.thumb_path);
			}
		},
	});
	//模态框编辑事件
	$('.xx-table-list #xx-span-editor').click(function(){
		var id = $(this).attr('attr-id');
		$('#announcment_id').val(id); 	
		
	});
	
	//模态框验证
	$('#xx-btn-add-review').click(function(){
		var formData = $('#xx-form-review').serializeArray();
		var postData = {};
		$(formData).each(function(i){
			postData[this.name] = this.value;
		});
//		console.log(postData);
		$.ajax({
			type:'post',
			url:SCOPE.review_url,
			data:postData,
			dataType:'json',
			success:function(result){
				if(result.status == SUCCESS){
					return Dialog.success(result.msg,SCOPE.success_refresh_url);
				}
				return Dialog.error(result.msg);
			},
		});
	});
	//显示或隐藏textarea
	$('#xx-form-review #xx-check-announcement_check_state').click(function(){
		if($(this).val() == '通过'){
			$('#xx-textarea-error_messages').attr('type','hidden');
			$('#xx-textarea-error_messages').attr('name','');
		}
		else{
			$('#xx-textarea-error_messages').attr('type','textarea');
			$('#xx-textarea-error_messages').attr('name','error.message');
			
		}
	});
	
	//时间选择器点击事件
	$('#xx-input-announcement_end_date').daterangepicker({ singleDatePicker: true, startDate:new Date(), minDate:new Date()}, function(start, end, label) {
	    console.log(start.toISOString(), end.toISOString(), label);
	});
	//显示或隐藏下拉框	
    $('#xx-select-type').click(function(){
    	console.log('123');
    });	
    
    $('#schedule_date').daterangepicker({ 
		singleDatePicker: true,
		startDate: new Date(),
		minDate: new Date(),
	}, 
	function(start, end, label) {

		});
	$('#birthday').daterangepicker({ 
		singleDatePicker: true,
		startDate: new Date(),
		minDate: new Date(),
	},
		function(start, end, label) {
	 	
                    console.log(start.toISOString(), end.toISOString(), label);
                    
                    var timeValue=end.format('YYYY-MM-DD');
                    console.log(timeValue);
                    $.ajax({
						type:"post",
						url:SCOPE.get_time_url,
						async:true,
						data:{'timeValue':timeValue},
						dataType:'json',
						success:function(data){
							console.log(data);
							$('#hy-table-search tbody').remove();
							var sRows = '';
							for( var i in data ){
								console.log(data[i].hospital_doctor_id);
								var sRow = '<tr>' +
									'<td>' + data[i].hospital_doctor_name + '</td>'+
									'<td>' + data[i].schedule_date + '</td>' +
									'<td>' + data[i].schedule_time + '</td>'+
									'<td>' + data[i].open_registration_number + '</td>'+	
									'<td>' +
										'<span class="glyphicon glyphicon-edit" id="xx-span-editor" attr-id="{$vo.hospital_doctor_id}" onclick="clickedit(this)" data-toggle="modal" data-target="#myModal"></span>'+
									'</td>' +
									
								'</tr>';
					
					sRows += sRow;
				}
				$('#hy-table-search').append('<tbody></tbody>');
				$('#hy-table-search tbody').html(sRows);
			}
		});
    });
    
    
    $('#hy-select-name-search').on('change',function(){
    	var selectValue=$(this).val();
		$.ajax({
			type:"post",
			url:SCOPE.get_name_url,
			async:true,
			data:{'selectValue':selectValue},
			dataType:'json',
			success:function(data){
//				console.log(data);
				$('#hy-table-search tbody').remove();
				var sRows = '';
				for( var i in data ){
//					console.log(data[i].hospital_doctor_id);
					var sRow = '<tr>' +
									'<td>' + data[i].hospital_doctor_name + '</td>'+
									'<td>' + data[i].schedule_date + '</td>' +
									'<td>' + data[i].schedule_time + '</td>'+
									'<td>' + data[i].open_registration_number + '</td>'+	
									'<td>' +
										'<span class="glyphicon glyphicon-edit" id="xx-span-editor" attr-id="{$vo.hospital_doctor_id}" onclick="clickedit(this)" data-toggle="modal" data-target="#myModal"></span>'+
									'</td>' +
								'</tr>';
					
					sRows += sRow;
				}
				$('#hy-table-search').append('<tbody></tbody>');
				$('#hy-table-search tbody').html(sRows);
				
//				$('#pageRes').html(res.pageRes);
			}
		});
    });
});
