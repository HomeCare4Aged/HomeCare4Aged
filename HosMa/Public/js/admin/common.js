$(document).ready(function(){
	
	//为模块首页的录入按钮添加事件
	$('#xx-btn-add').click(function(){
		location.href = SCOPE.add_url;
	});
	
	//为提交新增数据按钮添加事件
	$('#xx-btn-add-submit').click(function(){
		var formData = $('#xx-form-add').serializeArray();
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
//	
//	//点击编辑按钮的事件
//	$('#xx-table-list #xx-span-edit').click(function(){
//		var id = $(this).attr('attr-id');
//		location.href = SCOPE.edit_url+'?id='+id;
//	});
//	
//	//点击删除按钮事件
//	$('#xx-table-list #xx-span-delete').click(function(){
//		var id = $(this).attr('attr-id');
//		var url = SCOPE.set_status_url;
//		var postData = {};
//		postData['id'] = id;
//		postData['status'] = -1;
//		Dialog.confirm('是否确认删除数据？',function(){
//			$.ajax({
//				type:"post",
//				url:url,
//				async:true,
//				data:postData,
//				dataType:'json',
//				success:function(result){
//					if(result.status == SUCESS){
//						return Dialog.success(result.msg,'');
//					}
//					return Dialog.error(result.msg);
//				}
//			});
//		});
//	});
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
//	//点击分配权限事件
//	$('#xx-btn-assign-auth').click(function(){
//		var formData = $('#xx-form-assign-auth').serializeArray();
//		var postData = {};
//		$(formData).each(function(i){
//			postData[this.name] = this.value;
//		});
//		$.ajax({
//			type:'post',
//			url:SCOPE.assign_auth_url,
//			data:postData,
//			dataType:'json',
//			success:function(result){
//				if(result.status == SUCESS){
//					//成功
//					return Dialog.success(result.msg,SCOPE.success_jump_url);
//				}
// 					return Dialog.error(result.msg);
//			},
//		});
//	});
	//上传封面图
	$('#xx-input-uploader').uploadify({
		'swf':SCOPE.ajax_upload_swf,
		'uploader':SCOPE.ajax_upload_url,
		'buttonText':'上传图片',
		'fileTypeExts':'*.gif;*.png;*.jpg',
		'fileTypeDecs':'Image File',
		'fileObjNmae':'file',
		'onUploadSuccess':function(file,data,response){
			if(response){
				var res = JSON.parse(data);
				$('#xx-img-show-thumb').attr('src',res.data.thumb_path).show();
				$('#xx-input-image-path').attr('value',res.data.image_path);
				$('#xx-input-thumb-path').attr('value',res.data.thumb_path);
			}
		},
	});
});
