//加载简装主站通用底
document.write('<script type="text/javascript" src="./w4-simple.js"></script>');
(function(){
	if(typeof HEAD_USER != 'object') jy_top_domain = 'jiayuan.com';
	window.readCookie = function(name){//兼容旧程序，读COOKIE
		var cookieValue = "";
		var search = name + "=";
		if(document.cookie.length > 0){ 
			offset = document.cookie.indexOf(search);
			if (offset != -1){ 
				offset += search.length;
				end = document.cookie.indexOf(";", offset);
				if(end == -1) end = document.cookie.length;
				cookieValue = decodeURIComponent(document.cookie.substring(offset, end));
			}
		}
		return cookieValue;
	}
	window.writeCookie = function(name, value, hours){//兼容旧程序，写COOKIE
		var expire = "";
		if(hours != null){
			expire = new Date((new Date()).getTime() + hours * 3600000);
			expire = "; expires=" + expire.toGMTString();
		}
		document.cookie = name + "=" + escape(value) + expire + ";domain="+jy_top_domain+";path=/";
	}
})();
if(typeof HEAD_USER == 'object' && HEAD_USER.uid > 0){//状态条与右下弹出，皆需要登录后才可以访问
	(function(){
		//使iframe自适应高度，用于底部状态条的正常展示
		var iframeids = ["iframeName1", "iframeName2","iframeName3","iframeName4","iframeName5","iframeName6","iframeName7","iframeName8","iframeName9","iframeName10","iframeName11","iframeName12","iframeName13","iframeName14","iframeName15","iframeName16"];
		function reinitIframe(){//自动调整iframe的高度
			for(i=0; i<iframeids.length; i++){
				var iframe = document.getElementById(iframeids[i]);
				try{
					var bHeight = iframe.contentWindow.document.body.scrollHeight;
					var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
					var height = Math.max(bHeight, dHeight);
					iframe.height = height;
				}catch(ex){}
			}
		}
		window.setInterval(reinitIframe, 200);
	})();
	var is_popup_show = true;//默认所有页面都会出现底部状态条（右下弹出）
	var checkurl_arr = ["/usercp/center","/usercp/service","priority","brightlist","/usercp/charge","/usercp/loveexpress","/usercp/recommend","/usercp/party","/club", "/clubv2"];//不显示状态条的目录与页面配置
	var is_im_show = false;
	for(i=0; i<checkurl_arr.length; i++) {
		if(location.href.indexOf(checkurl_arr[i]) != -1) {
			is_popup_show = false;
			break;
		}
	}
	if(is_popup_show){//加载右下弹出相关代码	
		document.write('<script type="text/javascript" src="http://images1.jyimg.com/w4/global/j/pop.js"></script>');
		//jyim start
		if(!readCookie('webim_disable')){
			var im_switch = true;
			var first_pop_msg = null;
			var old_pop_content = null;
			nojQuery = false;
			//prototype fix
			if(Object.prototype.toJSONString) delete Object.prototype.toJSONString;
			if(typeof(jQuery) == 'undefined' || parseFloat(jQuery.fn.jquery) < 1.4){
				nojQuery = true;
				document.write('<script src="http://images1.jyimg.com/w4/common/j/jquery-1.7.2.min.js"></script>');
			}
			document.write('<script src="http://webim.'+jy_top_domain+'/pop_template.php"></script>');
			document.write('<script src="http://images1.jyimg.com/w4/webim/jyim2.js"></script>');
		}
		//jyim stop
		if(jy_channel == 'party' || jy_channel == 'profile' || jy_channel == 'usercp_o'){//显示活动弹出的栏目
			document.write('<script type="text/javascript" src="http://images1.jyimg.com/w3/global/j/pop_freq.js"></script>');//活动弹出调用
		}
	}
}