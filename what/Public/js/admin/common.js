//写一个控件绑定事件
$(document).ready(function() {
	//为模块新增按钮添加事件
	$('#zh-button-add').click(function() {
		location.href = SCROP.add_url;
	});
	//未提交新增数据按钮添加事件
	$('#zh-button-add-submit').click(function() {
		var formData = $('#zh-form-add').serializeArray();
		//		console.log(formData);
		//转成json
		var postData = {};
		$(formData).each(function(i) {
			postData[this.name] = this.value;
		});
		//console.log(postData);
		//提交到后台
		$.ajax({
			type: "post",
			url: SCOPE.add_url,
			//			async:true,
			data: postData,
			dataType: 'json',
			success: function(result) {
				//成功回调，连接服务器
				//				console.log(result);
				//使用自定义常量替换1(success),0即(VALIDATE_ERROR)
				if(result.status == SUCCESS) {
					//成功
					return Dialog.success(result.message, SCOPE.success_jump_url);
				} else if(result.status == VALIDATE_ERROR) {

					//				}
					//				if(result.status == DATABASE_ERROR){
					//					//数据库出错
					//					return Dialog.error(result.message);
					//				}
					//				if(result.status==VALIDATE_ERROR){
					//					return Dialog.error(result.message);
					//验证不弹窗
					//					console.log(result.message);
					//					return;
					//判断是否是字符串
					//if(Object.prototype.toString().call(result.message)!== "[object String]"){//使用自定义常量后就不需要这个判断了
					//表单验证出错
					var errors = result.message;
					console.log(errors); //errors是取到键值对
					//把input对应的name下的错误信息取出来，添加到input后面
					//下面是拿到一个数组进行遍历
					$('.zh-p-validate-result').each(function() {
						//							console.log($(this));
						//attr('')是一个jqurey对象对应的标签，attr-validate是属性值
						console.log($(this).attr('attr-validate')); //拿到属性值
						var errorMessage = errors[$(this).attr('attr-validate')];
						//判断errorMessage，当有输入时不显示 不能空的提示，是jqurey的连贯操作
						$(this).html(errorMessage != undefined ? '*' + errorMessage : '').css({
							color: 'red'
						});
					});
					//}
				} else {
					return Dialog.error(result.message);
				}
				//				if(result.status == DATABASE_ERROR){
				//					return Dialog.error(result.message);
				//				}
			},
			//			error: function(result){
			//				//连接服务器失败
			//			},
		});
	});
});

//点击编辑按钮的事件
$('.zh-table-list #zh-span-edit').click(function() {
	//自定义一个属性用来传ＩＤ
	var id = $(this).attr('attr-id');
	//	alert(id);
	location.href = SCROP.edit_url + '?id=' + id;
});

//点击删除按钮事件
$('.zh-table-list #zh-span-delete').click(function() {
	//	alert('sdf');
	var id = $(this).attr('attr-id');
	var url = SCROP.set_status_url;
	var postData = {};
	postData['id'] = id;
	postData['status'] = -1;
	Dialog.confirm('是否确认删除数据？', function() {
		//ajax调用
		$.ajax({
			type: "post",
			url: url,
			async: true,
			data: postData,
			dataType: 'json',
			success: function(result) {
				//成功回调
				if(result.status == SUCCESS) {
					//					return Dialog.success(s=result.message,'');
					return Dialog.success(result.message, '');
				}
				return Dialog.error(result.message);
			},
		});
	});
});
//排序按钮点击事件
$('#zh-btn-listorder').click(function() {
	var formData = $('#zh-form-list').serializeArray();
	//		console.log(formData);
	var postData = {};
	$(formData).each(function(i) {
		postData[this.name] = this.value;
	});
	var url = SCROP.list_order_url;
	$.ajax({
		type: "post",
		url: url,
		async: true,
		data: postData,
		dataType: 'json',
		success: function(result) {
			//成功调用
			if(result.status == SUCCESS) {
				return Dialog.success(s = result.message, SCROP.success_refresh_url);
			}
			return Dialog.error(result.message);
		},
	});
});
//跳转分配权限按钮
$('.zh-table-list #zh-span-assign-auth').click(function() {
	var id = $(this).attr('attr-id');
	location.href = SCROP.assign_auth_url + '?id=' + id;
});
//点击按钮 分配权限
$('#zh-button-assign-auth').click(function() {
	var formData = $('#zh-form-assign-auth').serializeArray();
	//		console.log(formData);
	//转成json
	var postData = {};
	$(formData).each(function(i) {
		postData[this.name] = this.value;
	});
//	console.log(postData);
	//提交到后台
	$.ajax({
		type: "post",
		url: SCOPE.assign_auth_url,
		//			async:true,
		data: postData,
		dataType: 'json',
		success: function(result) {
			//成功回调
			if(result.status == SUCCESS) {
				return Dialog.success(s = result.message, SCOPE.success_jump_url);
			}
			return Dialog.error(result.message);
		},
	});
});
//上传封面图
$('#zh-input-uploader').uploadify({
	//swf是进度加载条
	'swf': SCOPE.ajax_upload_swf,
	'uploader': SCOPE.ajax_upload_url,
	//buttonText可以控制上传按钮
	'buttonText': '上传图片',
	'fileTypeExts': '*.gif;*.png;*.jpg',
	'fileTypeDecs': 'Image File',
	'fileObjectName': 'file',
	//回调事件
	'onUploadSuccess': function(file, data, response) {
		//		console.log(data);
		if(response) {
			//把data转成json
			var res = JSON.parse(data);
			//			console.log(res);
			//			console.log(res.$data.image_path);//通过拼接拿到路径http://127.0.0.1/what/UploadImages/2016/12/07/5847fad15d442.png
			//展示图片
			$('#zh-img-show-thumb').attr('src', res.$data.thumb_path).show(); //show()方法能把值设置为非空
			//显示图片
			$('#zh-input-image-path').attr('value', res.$data.image_path);
			//显示缩略图
			$('#zh-input-thumb-path').attr('value', res.$data.thumb_path);
		}
	}
});
//绑定文章提交按钮事件
$('#zh-button-article-add-submit').click(function() {
	//为模块添加文章按钮绑定事件，跳转显示的模块路径
//	$('#zh-button-add').click(function() {
//		location.href = SCROP.add_url;
//	});
	//把提交的表单转换成数组,序列化
	var formData = $('#zh-form-article-add').serializeArray();
//	console.log(formData);
	//把formData转成json格式后放入postData中
	var postData = {};//初始化
	$(formData).each(function(i) {
		postData[this.name] = this.value;
	});
//	console.log(postData);
	//通过ajax把postData传递到后台
	$.ajax({
		type:"post",
		url:SCOPE.add_url,
		async:true,
		data:postData,
		dataType:'json',
		success:function(result){
//			console.log(result);
			//成功回调，连接服务器成功
//			if(result.status == 1){
			if(result.status == SUCCESS){
//				成功就跳回前一页，调用封装好的json函数
				return Dialog.success(result.status,SCOPE.success_jump_url);
			}
//			if(result.status == 0){
			//数据库出错
			if(result.status == DATABASE_ERROR){
//				console.log(result.message);
				return Dialog.error(result.message);
			}
			//判断是否没有输入数据提交空表单
			if(result.status == VALIDATE_ERROR) {
					//表单验证出错
					//下面是拿到一个数组进行遍历
					$('.zh-p-validate-result').each(function() {
						console.log($(this).attr('attr-validate')); //拿到属性值
						var errorMessage = errors[$(this).attr('attr-validate')];
						//判断errorMessage，当有输入时不显示 不能空的提示，是jqurey的连贯操作
						$(this).html(errorMessage != undefined ? '*' + errorMessage : '').css({
							color: 'red'
						});
					});
				}
		},
	});
});
