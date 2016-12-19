$(document).ready(function() {
	//登录按钮绑定事件
	$('#xx-btn-login').click(function() {
		//拿到input标签拼接键和值
		var username = $('input[name="hospital_account_num"]').val();
		var userpassword = $('input[name="hospital_account_password"]').val();
		//		console.log(userpassword);
		if(username == '') {
			return login.error('账户名不能为空!');
		}
		if(userpassword == '') {
			return login.error('密码不能空1!');
		}
		var adminVal = $('input[name="admin_verify"]').val();
		if(adminVal == '') {
			return login.error('验证码不能空！');
		}
		//表单提交序列化事件
		var formData = $('#zh-form-login').serializeArray();
		//把formData转换为json
		var postData = {};
		$(formData).each(function(i) {
			postData[this.name] = this.value;
		});
		//		console.log($('input[name="hospital_account_num"]').val());
		//通过ajax发送数据
		$.ajax({
			type: "post",
			url: SCOPE.login_url,
			//			url:"__ROOT__/adminDoctor.php/Login/check",
			async: true,
			data: postData,
			dataType: 'json',
			success: function(reslut2) {
				console.log(reslut2);
				//成功回调
				if(reslut2.status == 0) {
					return login.error(reslut2.message);
				}
				if(reslut2.status == 1) {
					//SCOPE=__ROOT__/adminDoctor/Index/index,登录成功后跳转到首页
					return login.success(reslut2.message, SCOPE.success_jump_url);
				}
			},
		});
	});
});

$('#xx-div-val-img a').click(function(){
	$("#xx-div-val-img img").attr('src',SCOPE.verify_url);
});
//$(document).ready(function(){
//	//监听键盘的“Enter”，登录
//	document.onkeydown = function(){
//		if(event.keyCode == 13){
//			login();
//		}
//	}

//登录按钮响应事件
//	$('#xx-btn-login').click(login);
//	function login(){
//		var	adminName = $('input[name="admin_name"]').val();
//		if (adminName == '') {
//			return Dialog.error('账户名不能为空!');
//		}
//		var adminPsw = $('input[name="admin_psw"]').val();
//		if (adminPsw == "") {
//			return Dialog.error('密码不能为空!');
//		}
//		var adminVal = $('input[name="admin_val"]').val();
//		if (adminVal == "") {
//			return Dialog.error('验证码不能为空!');
//		}
//		var formData = $('#xx-form-login').serializeArray();
//		var postData = {};
//		$(formData).each(function(){
//			postData[this.name] = this.value;
//		});
//		$.ajax({
//			type:"post",
//			url:SCOPE.login_url,
//			async:true,
//			data:postData,
//			dataType:'json',
//			success:function(result){
//				console.log(result);
//				if(result.status == 0){
//					return Dialog.error(result.msg);
//				}
//				if(result.status == 1){
//					return Dialog.success(result.msg,SCOPE.success_jump_url);
//				}
//			},
//		});
//	}
//	

//	//点击刷新验证码
//	$('#xx-div-val-img a').click(function(){
//		$("#xx-div-val-img img").attr('src',SCOPE.verify_url);
//	});
//	
//});