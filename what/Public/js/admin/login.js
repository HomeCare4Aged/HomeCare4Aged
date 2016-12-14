$(document).ready(function() {
	//监听键盘'enter'事件
	document.onkeydown = function() {
		if(event.keyCode == 13) {
			//			alert('enter');
			//调用login()
			login();
		}
	}
});
//登录按钮响应事件
//	$('#zh-button-login').click(function(){
//	});
$('#zh-button-login').click(login);
//把登录按钮响应事件，抽取出来放入login()中，然后把function()方法修改为login()方法
function login() {
	//				alert('haha');//绑定事件成功
	//拿到数据后往后台发送
	//拿到input标签中name属性值为admin_name
	var adminName = $('input[name="admin_name"]').val();
	var adminPws = $('input[name="admin_pws"]').val();
	//		console.log(adminPws);
	if(adminName == '') {
		return Dialog.error('账户名不能为空!');
	}
	if(adminPws == '') {
		return Dialog.error('密码不能空!');
	}
	var adminVal = $('input[name="admin_val"]').val();
	if(adminVal == '') {
		return Dialog.error('验证码不能空！');
	}
	var formData = $('#zh-form-login').serializeArray();

	//都成功就输出success
	//alert('success');
	//把表单转换为json发送给后台
	var postData = {};
	//$(formData).each(function(){
	//		postData[this.name]=this.value;
	//});
	//		console.log(postData);
	$(formData).each(function(i) {
		//			//把表单中的键值转换为json格式的键值
		postData[this.name] = this.value;
		//			console.log(postData);//打印时获得了2个对象，都能够拿到用户名和密码
	});
	//			//提交数据，往后台
	$.ajax({
		type: "post",
		//			 url:'__ROOT__/admin.php/Login/check',
		url: SCOPE.login_url,
		async: true,
		data: postData,
		dataType: 'json', //后台使用json去解析
		success: function(result) {
			////					console.log(result);
			//					//时间 是一个较为抽象的概念，是物质的运动、变化的持续性、顺序性的表现
			//					//不能把时间、空间、物质三者分开解释。时间与空间一起组成四维时空，构成宇宙的基本结构
			//					//而物质与时空并存，只要物质存在，时间便有意义。
			//					//空间使事物具有了变化性，即因为空间的存在，所以事物才可以发生变化。
			////					空间是没有能量的事物，即当事物能产生变化时，变化产生的能量已经和阻碍的能量相互抵消。
			if(result.status == 0) {
				return Dialog.error(result.message);
			}
			if(result.status == 1) {
				return Dialog.success(result.message, SCOPE.success_jump_url);
			}
		},
	});
}
//刷新验证码,绑定事件
$('#zh-div-val-img a').click(function() {

	$('#zh-div-val-img img').attr('src', SCOPE.verify_url);
});