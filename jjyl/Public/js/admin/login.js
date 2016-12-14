
$(document).ready(function(){
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
    		return Dialog.error('账号不能为空！');
    	};
    	
    	var adminPsw = $('input[name="admin_psw"]').val();
    	if (adminPsw == ''){
    		return Dialog.error('密码不能为空！');
    	};
    	
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
   







