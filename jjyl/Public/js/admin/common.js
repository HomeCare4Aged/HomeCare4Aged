$(document).ready(function(){
	
	//为模块首页的新增按钮添加事件
	$('#zyn-btn-add').click(function(){
		location.href = SCOPE.add_url;
	});

	//为提交新增数据按钮添加事件
	$('#zyn-btn-add-submit').click(function(){
		var formData = $('#zyn-form-add').serializeArray();
		var postData = {};
		$(formData).each(function(i){
			postData[this.name] = this.value;
		});
		
		$.ajax({
			type:"post",
			url:SCOPE.add_url,
			data:postData,
			dataType:'json',
			success:function(result){
				//链接服务器其成功
				if(result.status == SUCCESS){
					//成功
					return Dialog.success(result.msg,SCOPE.success_jump_url);
				}else if (result.status == VALIDATE_ERROR){
					//表单验证出错
					var errors = result.msg;
					$('.zyn-p-validate-result').each(function(){
						var errorMsg = errors[$(this).attr('attr-validate')];
						$(this).html(errorMsg != undefined ? '*'+errorMsg : '').css({color:'red'});
					});
				}else{
					return Dialog.error(result.msg);
				}
				
			},
			
		});
	
	});
////	
////	//点击编辑按钮事件
	$('.zyn-table-list #zyn-span-edit').click(function(){
		var id = $(this).attr('attr-id');
		location.href = SCOPE.edit_url+'?id='+id;
	});
	
	//点击删除按钮事件
	$('.zyn-table-list #zyn-span-trash').click(function(){
		var id = $(this).attr('attr-id');
		var url = SCOPE.set_status_url;
		var postData = {};
		postData['id']=id;
		postData['status']= -1;
		Dialog.confirm('是否确定删除数据',function(){
			$.ajax({
				type:"post",
				url:url,
				async:true,
				data:postData,
				dataType:'json',
				success:function(result){
					if(result.status == SUCCESS){
						return Dialog.success(result.msg,'');
					}
					return Dialog.error(result.msg);
				},
			});
		});
	});
////	
////	//排序按钮的事件
	$('#zyn-btn-list_order').click(function(){
		var formData = $('#zyn-form-list').serializeArray();
		var postData = {};
		$(formData).each(function(i){
			postData[this.name] = this.value;
		});
		var url = SCOPE.list_order_url;
		$.ajax({
			type:"post",
			url:url,
			async:true,
			data:postData,
			dataType:'json',
			success:function(result){
				return Dialog.success(s=result.msg,SCOPE.success_refresh_url);
			}
			
		});
	});
	
////	
////	//跳转分配权限按钮事件
	$('.zyn-table-list #zyn-span-assign-auth').click(function(){
		var id = $(this).attr('attr-id');
		location.href = SCOPE.assign_auth_url+'?id='+id;
		
	});
//	
	//点击分配权限事件
	$('#zyn-btn-assign-auth').click(function(){
		var formData = $('#zyn-form-assign-auth').serializeArray();
		var postData = {};
		$(formData).each(function(i){
			postData[this.name] = this.value;
		});
		var url = SCOPE.assign_auth_url;
		$.ajax({
			type:"post",
			url:url,
			async:true,
			data:postData,
			dataType:'json',
			success:function(result){
				//return Dialog.success(s=result.msg,SCOPE.success_refresh_url);
				if(result.status == SUCCESS){
						return Dialog.success(s=result.msg,SCOPE.success_jump_url);
				      }
				return Dialog.error(result.msg);
			}
			
		});
	});
////	
////	//图片上传
	$('#zyn-input-uploader').uploadify({
		
		'swf':SCOPE.ajax_upload_swf,
		'uploader':SCOPE.ajax_upload_url,
		'buttonText':'上传图片',
		'fileTypeExts':'*.gif;*.png;*.jpg',
		'fileTypeDecs':'Image File',
		'fileObjName':'file',
		'onUploadSuccess':function(file,data,response){
			if(response){
				var res = JSON.parse(data);
				$('#zz-image-show-thumb').attr('src',res.data.thumb_path).show();
				$('#zz-input-image-path').attr('value',res.data.image_path);
				$('#zz-input-thumb-path').attr('value',res.data.thumb_path);
			}
		},
	});
});
//
//
