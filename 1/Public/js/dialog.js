
var Dialog = {
	success:function(message,url){
		layer.open({
			content:message,
			icon:6,
			title:'成功提示',
			yes:function(){
				location.href = url;
			}
		});
	},
	error:function(message){
		layer.open({
			content:message,
			icon:5,
			title:'错误提示',
		});
	},
	//确认提示框
	confirm:function(message,callback){
		layer.open({
			content:message,
			icon:3,
			title:'操作提示',
			btn:['是','否'],
			yes:function(){
				callback();
			},
		})
	}
};
