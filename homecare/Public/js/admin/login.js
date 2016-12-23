
$(document).ready(function(){
		//得到焦点
	$("#password").focus(function(){
		$("#left_hand").animate({
			left: "150",
			top: " -38"
		},{step: function(){
			if(parseInt($("#left_hand").css("left"))>140){
				$("#left_hand").attr("class","left_hand");
			}
		}}, 2000);
		$("#right_hand").animate({
			right: "-64",
			top: "-38px"
		},{step: function(){
			if(parseInt($("#right_hand").css("right"))> -70){
				$("#right_hand").attr("class","right_hand");
			}
		}}, 2000);
	});
	//失去焦点
	$("#password").blur(function(){
		$("#left_hand").attr("class","initial_left_hand");
		$("#left_hand").attr("style","left:100px;top:-12px;");
		$("#right_hand").attr("class","initial_right_hand");
		$("#right_hand").attr("style","right:-112px;top:-12px");
	});


	//响应Enter键
	document.onkeydown = function(){
			if(event.keyCode == 13){
				login();
			}
		}

    //登录按钮响应事件
    $('#zyn-btn-login').click(login);
    //登录按钮函数
   function login(){
		var adminName = $('input[name="admin_name"]').val();
		if (adminName == ''){
			return Dialog.error('账户名不能为空!');
		}
		var adminPsw = $('input[name="admin_psw"]').val();
		if (adminPsw == ''){
			return Dialog.error('密码不能为空!');
		}
		var adminVal = $('input[name="admin_val"]').val();
		if (adminVal == ''){
			return Dialog.error('验证码不能为空!');
		}
    	var formData = $('#zyn-form-login').serializeArray();
    	
    	var postData = {};
    	$(formData).each(function(i){
    		postData[this.name] = this.value;
    	});
    	$.ajax({
    		type:"post",
    		url:SCOPE.login_url,
    		async:true,
    		data:postData,
    		dataType:'json',
    		success:function(result){
    			if (result.status == 0){
    				return Dialog.error(result.msg);
    			}
    			if (result.status == 1){
    				return Dialog.success(result.msg,SCOPE.succes_jump_url);
    			}
    		},
    	});
    	}
    	
  
    	

	$('#zyn-div-val-img a').click(function(){
		$("#zyn-div-val-img img").attr('src',SCOPE.verify_url);
	});

});
   







