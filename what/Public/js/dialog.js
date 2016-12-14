var Dialog = {
	success: function(message, url) {
		layer.open({
			content: message,
			icon: 1, //小图标，成功是一
			title: '成功提示',
			yes: function() {
					location.href = url; //成功跳转页面
				} //提示按钮
		}); //引用layer这个类中的方法

	},
	error: function(message) {
		layer.open({
			content: message,
			icon: 2,
			title: '错误提示',
		});
	},
	//确认提示框
	confirm: function(message, callback) {
		layer.open({
			content: message,
			icon: 3, //是一个小叹号
			title: '操作提示',
			btn: ['是', '否'],
			yes: function() {
				callback();
			}
		});
	}
};