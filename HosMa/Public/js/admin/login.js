$(document).ready(function() {
	//监听键盘的“Enter”，登录
	document.onkeydown = function(){
		if(event.keyCode == 13){
//			alert('enter');
			enterLogin();
		}
	}
	//登录按钮绑定事件
//	$('#xx-btn-login').click(login);
//	function login(){
	$('#zh-btn-login').click(enterLogin);
	function enterLogin(){
				//拿到input标签拼接键和值
		var hospitalNumber = $('input[name="community_hospital_numbers"]').val();
		var employeeNumber= $('input[name="hospital_user_no"]').val();
		var loginPassword = $('input[name="hospital_user_psw"]').val();
//		var verificationCode  = $('input[name="hospital_account_password"]').val();
		//		console.log(userpassword);
		if(hospitalNumber == '') {
			return login.error('医院编号不能为空!');
		}
		if(employeeNumber == '') {
			return login.error('员工工号不能为空!');
		}
		if(loginPassword == '') {
			return login.error('登录密码不能为空!');
		}
//		var verificationCode = $('input[name="admin_verify"]').val();
//		if(verificationCode == '') {
//			return login.error('验证码不能为空！');
//		}
		//表单提交序列化事件
		var formData = $('#zh-form-login').serializeArray();
		console.log(formData);
		//把formData转换为json
		var postData = {};
		$(formData).each(function(i) {
			postData[this.name] = this.value;
		});
//		console.log(postData);
		//通过ajax发送数据
		$.ajax({
			type: "post",
			url: SCOPE.login_url,
			//			url:"__ROOT__/adminDoctor.php/Login/check",
			async: true,
			data: postData,
			dataType: 'json',
			success: function(reslut0) {
//				console.log(reslut2);
				//成功回调,如果传回来的json
				if(reslut0.status == 0) {
					return login.error(reslut0.msg);
				}
//				if(reslut0.status == 1) {
//					//SCOPE=__ROOT__/adminDoctor/Index/index,登录成功后跳转到首页
//					return login.success(reslut0.msg, SCOPE.success_jump_url);
//				}
				if(reslut0.status == 1) {
					if(reslut0.msg == '登录成功啦'){
						location.href = SCOPE.success_jump_url;
					}
				}
			},
		});
	}
});

//$('#xx-div-val-img a').click(function(){
//	$("#xx-div-val-img img").attr('src',SCOPE.verify_url);
//});



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