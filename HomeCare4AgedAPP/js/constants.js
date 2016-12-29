//域名

//const SERVERURL = 'http:/10.96.110.77/HomeCare4AgedPHP/index.php/Home/';

const SERVERURL = 'http://192.168.136.1/HomeCare4AgedPHP/index.php/Home/';

//定义比例
const SCALE = window.screen.width / 320;
//定义首页图片比例
const HOMEIMGSCALE = 620 / 498;
//定义首页顶部图片比例
const HOMETOPIMGSCALE = 620 / 1005;
//定义video
const VIDEOSCALE = 9 / 16;

//获取一段时间天数

function getDays(dayNum) {
	var oDate = new Date(); //获取当前时间
	var dayArr = new Array();

	for(var i = 0; i < dayNum; i++) {
		var str = new Date(oDate.getFullYear(), oDate.getMonth(), oDate.getDate() + i);
		dayArr.push(gmtToDate(str)); //把未来几天的时间放到数组里
	}
	return dayArr; //返回一个数组。
}

function gmtToDate(str) {
	var date = str;
	var seperator1 = "-";
	var year = date.getFullYear();
	var month = date.getMonth() + 1;
	var strDate = date.getDate();
	if(month >= 1 && month <= 9) {
		month = "0" + month;
	}
	if(strDate >= 0 && strDate <= 9) {
		strDate = "0" + strDate;
	}
	var currentdate = year + seperator1 + month + seperator1 + strDate;
	return currentdate;
}
//判断输入字符串是否为空或者全部都是空格
function isNullStr(str) {
	if(str == "") return true;
	var regu = "^[ ]+$";
	var re = new RegExp(regu);
	return re.test(str);
}
//判断是否是手机号
function isPhoneNum(str) {
	var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
	if(reg.test(str)) {
		return true;
	} else {
		return false;
	};
}

//确认密码
function checkConfirmPsw($psw,$confirmPsw){
	if($psw != $confirmPsw){
		return false;
		console.log('false');
	}
	return true;
}