//域名

const SERVERURL = 'http://10.96.109.175/HomeCare4AgedPHP/index.php/Home/';
const MESSAGEURL = 'http://10.96.109.175/HomeCare4AgedPHP/SendTemplateSMS.php/sendTemplateSMS';

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
//获取当前的日期时间 格式“yyyy-MM-dd HH:MM:SS”
function getNowFormatDate() {
    var date = new Date();
    var seperator1 = "-";
    var seperator2 = ":";
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var strDate = date.getDate();
    var strSeconds = date.getSeconds();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
    }
    var hours = date.getHours();
	var minutes = date.getMinutes();
	var seconds = date.getSeconds();
	if(hours >= 0 && hours <= 9) {
		hours = "0" + hours;
	}
	if(minutes >= 0 && minutes <= 9) {
		minutes = "0" + minutes;
	}
	if(seconds >= 0 && seconds <= 9) {
		seconds = "0" + seconds;
	}

	var currentdate = year + seperator1 + month + seperator1 + strDate +
		" " + hours + seperator2 + minutes +
		seperator2 + seconds;
	return currentdate;
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
	if(str == null) return true;
	if(str == undefined) return true;
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
function checkConfirmPsw($psw, $confirmPsw) {
	if($psw != $confirmPsw) {
		return false;
		console.log('false');
	}
	return true;
}
//密码验证6-16位字符只包含字母数字
function isRegisterPsw(s) {
	var patrn = /^[0-9A-Za-z]{6,16}$/;
	if(!patrn.exec(s)) return false
	return true
}
//判断当前时间是否在某一时间段内 在返回true 不在返回false
function is_now_time_range(beginTime, endTime) {
	var strb = beginTime.split(":");
	if(strb.length != 2) {
		beginTime = strb[0] + ':' + strb[1];
	}

	var stre = endTime.split(":");
	if(stre.length != 2) {
		endTime = stre[0] + ':' + stre[1];
	}

	var b = new Date();
	var e = new Date();
	var n = new Date();

	b.setHours(strb[0]);
	b.setMinutes(strb[1]);
	e.setHours(stre[0]);
	e.setMinutes(stre[1]);

	if(n.getTime() - b.getTime() > 0 && n.getTime() - e.getTime() < 0) {
		return true;
	} else {
		return false;
	}
}
//判断某时间是否在某一时间段内 在返回true 不在返回false
function is_time_range(beginTime, endTime, nowTime) {
	var strb = beginTime.split(":");
	if(strb.length != 2) {
		beginTime = strb[0] + ':' + strb[1];
	}

	var stre = endTime.split(":");
	if(stre.length != 2) {
		endTime = stre[0] + ':' + stre[1];
	}

	var strn = nowTime.split(":");
	if(stre.length != 2) {
		nowTime = strn[0] + ':' + strn[1];
	}
	var b = new Date();
	var e = new Date();
	var n = new Date();
	b.setHours(strb[0]);
	b.setMinutes(strb[1]);
	e.setHours(stre[0]);
	e.setMinutes(stre[1]);
	n.setHours(strn[0]);
	n.setMinutes(strn[1]);

	if(n.getTime() - b.getTime() > 0 && n.getTime() - e.getTime() < 0) {
		return true;
	} else {
		return false;
	}
}

//判断俩时间差 大于返回true 否则返回false
function isTimeDifference(oneTime, anotherTime) {
	var stro = oneTime.split(":");
	if(stro.length != 2) {
		oneTime = stro[0] + ':' + stro[1];
	}

	var stra = anotherTime.split(":");
	if(stre.length != 2) {
		anotherTime = stre[0] + ':' + stre[1];
	}

	var o = new Date();
	var a = new Date();

	o.setHours(stro[0]);
	o.setMinutes(stro[1]);
	a.setHours(stra[0]);
	a.setMinutes(stra[1]);

	if(o.getTime() > a.getTime()) {
		return true;
	} else {
		return false;
	}
}