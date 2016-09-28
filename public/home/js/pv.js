function send_jy_pv(log){
var f_url_arr = ['59.151.18.14','59.151.12.228'];
var k = Math.floor(Math.random() * f_url_arr.length);
var f_url = "http://"+f_url_arr[k]+"/any/";
var Arr = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","w","v","x","y","z","0","1","2","3","4","5","6","7","8","9"];
    var n = Math.floor(Math.random() * Arr.length + 1)-1;   
    var url = f_url +Arr[n]+".gif?|"+log+"|"+new Date().getTime()+"|";
	var sender = new Image();
	sender.onload = function(){clear(this);};
	sender.onerror = function(){clear(this);};
	sender.onabort = function(){clear(this);};
	sender.src = url;
	function clear(obj){
		obj.onerror = null;
		obj.onload = null;
		obj.onabort = null;
		obj = null;
	}
}

function send_jy_pv2_bak(log) {
var f_url_arr = ['59.151.18.13','59.151.12.227'];
var k = Math.floor(Math.random() * f_url_arr.length);
var f_url = "http://"+f_url_arr[k]+"/any/";
var Arr = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","w","v","x","y","z","0","1","2","3","4","5","6","7","8","9"];
    var n = Math.floor(Math.random() * Arr.length + 1)-1;   
    var url = f_url +Arr[n]+".gif?|"+log+"|"+new Date().getTime()+"|";
	var sender = new Image();
	sender.onload = function(){clear(this);};
	sender.onerror = function(){clear(this);};
	sender.onabort = function(){clear(this);};
	sender.src = url;
	function clear(obj){
		obj.onerror = null;
		obj.onload = null;
		obj.onabort = null;
		obj = null;
	}
}


function send_jy_pv2(log) {
	try{
		var f_url_arr = ['59.151.18.13','59.151.12.227','59.151.18.13','59.151.12.227','59.151.12.228:81'];
		var k = Math.floor(Math.random() * f_url_arr.length);
		var f_url = "http://"+f_url_arr[k]+"/any/";
		var Arr = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","w","v","x","y","z","0","1","2","3","4","5","6","7","8","9"];
		var n = Math.floor(Math.random() * Arr.length + 1)-1;   
		var im = "i_" + Math.floor(2147483648 * Math.random()).toString(36);
		var url = f_url +Arr[n]+".gif?|"+log+"|&"+im+"="+new Date().getTime()+"|";
		window[im] = new Image(),window[im].T=im,
		window[im].onload = window[im].onerror = window[im].onabort = function(){
					try {
						this.onload = this.onerror = this.onabort = null;
						window[this.T] = null;
					} catch(e) {}			
		}
		window[im].src = url;
	} catch(e){send_jy_pv2_err('pv2',e);}
}

function send_jy_pv2_err(flag,e) {	
	try{
		var w = window,b = [],f=encodeURIComponent;
		b.push("flag=" + f(flag));
		b.push("name=" + f(e.name));
		b.push("msg=" + f(e.message));
		b.push("refer=" + f(document.referrer));
		b.push("page=" + f(w.location.href));
		b.push("agent=" + f(w.navigator.userAgent));
		b.push("rnd=" + Math.floor(2147483648 * Math.random()));
		(new Image).src = "http://www"+"."+"jiayuan"+"."+"com/log.php?" + b.join("&");
	} catch (e){}
}

function send_jy_pv_onload(url) {
	try{
		var pv_s_mark			= 'pv.mark=';
		var pv_s_mark_position	= url.indexOf(pv_s_mark);
		if (pv_s_mark_position == -1) return ;
		var url = url.substring(pv_s_mark_position);
		var pv_e_mark_position	= url.indexOf('&');
		var pv_s_mark_len		= pv_s_mark.length;	
		if (pv_e_mark_position == -1) {
			var pv_mark		= url.substring(pv_s_mark_len);
		} else {
			var pv_mark		= url.substring(pv_s_mark_len,pv_e_mark_position);
		}		
		send_jy_pv2(pv_mark);
	} catch (e){
		send_jy_pv2_err('onload',e);
	}
}
try{
	if (typeof(pv_g_mark) == 'undefined') {
		send_jy_pv_onload(location.href);
		var pv_g_mark = true; 	
	}
} catch(e) {}