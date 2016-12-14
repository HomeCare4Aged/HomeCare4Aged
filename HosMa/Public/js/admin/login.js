$(document).ready(function(){
	//监听键盘的“Enter”，登录
	document.onkeydown = function(){
		if(event.keyCode == 13){
			login();
		}
	}
	
	
	//登录按钮响应事件
	$('#xx-btn-login').click(login);
	function login(){
		var	adminName = $('input[name="admin_name"]').val();
		if (adminName == '') {
			return Dialog.error('账户名不能为空!');
		}
		var adminPsw = $('input[name="admin_psw"]').val();
		if (adminPsw == "") {
			return Dialog.error('密码不能为空!');
		}
		var adminVal = $('input[name="admin_val"]').val();
		if (adminVal == "") {
			return Dialog.error('验证码不能为空!');
		}
		var formData = $('#xx-form-login').serializeArray();
		var postData = {};
		$(formData).each(function(){
			postData[this.name] = this.value;
		});
		$.ajax({
			type:"post",
			url:SCOPE.login_url,
			async:true,
			data:postData,
			dataType:'json',
			success:function(result){
				console.log(result);
				if(result.status == 0){
					return Dialog.error(result.msg);
				}
				if(result.status == 1){
					return Dialog.success(result.msg,SCOPE.success_jump_url);
				}
			},
		});
	}
	
	
	//点击刷新验证码
	$('#xx-div-val-img a').click(function(){
		$("#xx-div-val-img img").attr('src',SCOPE.verify_url);
	});
	
});
