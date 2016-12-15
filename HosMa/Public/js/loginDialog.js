var login = {
	success:function(message,url){
		layer.open({
			content:message,
			icon:1,
			title:'提示成功1',
			yes:function(){
				location.href = url;
			},
		});
	},
	
	error:function(message){
		layer.open({
			content:message,
			icon:2,
			title:'错误提示2',
		});
	}
};
//var Dialog = {
//	//成功提示框
//	success:function(message,url){
//		layer.open({
//			content:message,
//			icon:1,
//			title:'成功提示',
//			yes:function(){
//				location.href = url;
//			}
//		});
//		
//	},
//	//失败提示框
//	error:function(message,callback){
//		layer.open({
//			content:message,
//			icon:2,
//			title:'错误提示',
////			yes:
//		});
//	},
//	
//	//确认提示框
//	confirm:function(message,callback){
//		layer.open({
//			content:message,
//			icon:3,
//			title:'操作提示',
//			btn:['是','否'],
//			yes:function(){
//				callback();
//			}
//		});
//	}
//	
//};

